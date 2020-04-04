<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

//use Ghunti\HighchartsPHP\Highchart;
//App::import('Vendor', '\HighchartsPHP\Highchart');
//use HighchartsPHP\Highchart;
//require_once(ROOT .DS. 'vendor' . DS  . 'HighchartsPHP' . DS . 'Highchart' . DS . 'src' . DS . 'Highchart.php');
require_once(ROOT.DS.'plugins'.DS.'GoogleCharts'.DS.'vendor'.DS.'GoogleCharts.php');

class DashboardController extends AppController
{
    public function view(){
        //Get data from model
//Get the last 10 rounds for score graph
        $this->loadModel('ProjectDetails');
        $projectDetails = $this->ProjectDetails->find('all')
              ->contain('Lov')
            ->select(['label' => 'Lov.lov_value', 'count' => 'count(*)'])
//            ->where(['ProjectDetails.Prices.budget' => $this->Auth->user('id')])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
            ->group(['Lov.lov_value'])
//            ->limit(10)
            ->toArray();
//Setup data for chart

        $this->loadModel('Prices');
        $prices = $this->Prices->find('all')
//            ->contain('Lov')
            ->select(['label' => 'DATE_FORMAT(created, \'%b\')', 'amount' => 'sum(budget)'])
//            ->where(['ProjectDetails.Prices.budget' => $this->Auth->user('id')])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
            ->group(['DATE_FORMAT(created, \'%b\')'])
//            ->limit(10)
            ->toArray();
        $pieChart = ['label', 'count'];

        foreach($projectDetails as $key => $projectDetail){
            $pieChart['label'][] = $projectDetail['label'];
            $pieChart['count'][] = $projectDetail['count'];
        }

        $expenses = $this->Prices->find('all')
//            ->contain('Lov')
            ->select(['label' => 'DATE_FORMAT(created, \'%b\')', 'amount' => 'sum(amount_paid)'])
//            ->where(['ProjectDetails.Prices.budget' => $this->Auth->user('id')])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
            ->group(['DATE_FORMAT(created, \'%b\')'])
//            ->limit(10)
            ->toArray();

        $totalProject = $this->ProjectDetails->find('all')
//            ->contain('Lov')
            ->select(['count' => 'count(*)'])
//            ->where(['ProjectDetails.Prices.budget' => $this->Auth->user('id')])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
//            ->group(['ProjectDetails.id'])
            ->toArray();
//            ->limit(10)
        $totalBudget = $this->ProjectDetails->find('all')
            ->contain('Prices')
            ->select(['budget' => 'sum(Prices.budget)'])
            ->toArray();
//            ->where(['ProjectDetails.Prices.budget' => $this->Auth->user('id')])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
//            ->group(['Prices.budget']);

        $this->loadModel('Activities');
        $completed = $this->Activities->find('all')
//            ->contain('Activities')
            ->select(['completed' => 'count(*)'])
            ->where(['Activities.percentage_completion >=' => '100'])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
//            ->group(['Activities.percentage_completion'])
            ->toArray();
//            ->limit(10)
        $this->set(compact('pieChart', 'prices', 'expenses', 'totalBudget', 'totalProject', 'completed'));
    }
//    public function index(){
//        $chart = new Highchart();
//        $chart->chart = array(
//            'renderTo' => 'container', // div ID where to render chart
//            'type' => 'line'
//        );
//
//        $chart->series[0]->name = 'Tokyo';
//        $chart->series[0]->data = array(7.0, 6.9, 9.5);
//        $this->set( compact( 'chart' ) );
//    }

    public function index()
    {


        $this->loadModel('ProjectDetails');
        $priorities = $this->ProjectDetails->find('all')
            ->contain(['Prices', 'Priorities'])
            ->select(['id' => 'ProjectDetails.id', 'name' => 'if((Name) is null, \'total\', name)', 'priority_type' => 'if((Priorities.lov_value) is null, \'total_priority\', Priorities.lov_value)', 'total_consumed' => 'sum(Prices.total_cost)', 'budget' => 'sum(Prices.budget)', 'count' => 'count(*)'])
//            ->where(['Activities.Lov.lov_type' => 'priorities'])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
            ->group(['ProjectDetails.id', 'Name', 'Priorities.lov_value'])
            ->order(['ProjectDetails.priority_id' => 'ASC'])
            //->epilog('WITH ROLLUP')
//            ->order(['Priorities.lov_value' => 'ASC'])
//            ->limit(10)
            ->toArray();

        $priority = [];
        $priority_total = [];
        foreach ($priorities as $p)
        {
            if($p['name'] == 'total' && $p['priority_type'] == 'total_priority')
            {
                $data = [];
                $data['total_budget'] = $p['budget'];
                $data['total_consumed'] = $p['total_consumed'];
                $data['count'] = $p['count'];
                $priority_total = $data;
            }else if($p['name'] == 'total' && $p['priority_type'] != 'total_priority')
            {
                $data = [];
                $data['priorities'] = $p['priority_type'];
                $data['total_budget'] = $p['budget'];
                $data['total_consumed'] = $p['total_consumed'];
                $data['count'] = $p['count'];
                $priority['priorities'][$p['priority_type']]['sub_total'] = $data;
            }else{
                $this->loadModel('RiskIssues');
//                $p['risk_issues'] = $this->RiskIssues->find('all')
//                    ->contain(['Lov', 'ProjectDetails', 'ProjectDetails.Priorities'])
//                    ->select(['status' => 'Lov.lov_value', 'count' => 'count(*)', 'priority' => 'Priorities.lov_value'])
//                    ->where(['project_id' => $p->id, 'Lov.lov_value' => 'Open'])
//                    ->group(['Lov.lov_value', 'Priorities.lov_value'])
//                    ->first();
//                $p['status'] = $this->ProjectDetails->find('all')
//                    ->contain(['Lov', 'SubStatuses'])
//                    ->select(['status' => 'if((Lov.lov_value) <> \'Closed\', \'Active\', \'Completed\')', 'sub_status' => 'SubStatuses.lov_value'])
//                    ->where(['ProjectDetails.id' => $p->id])
//                    ->first();
                $priority['priorities'][$p['priority_type']]['result'][] = $p;
            }
        }
        debug($priority);
        die();
        $priority = ($priority);
        $this->set( compact( 'priority', 'priority_total' ) );
    }

    public function beforeRender(Event $event)
    {
//        $this->loadHelper('GoogleCharts.GoogleCharts');
//        return parent::beforeRender($event); // TODO: Change the autogenerated stub
        parent::beforeRender($event);
        $this->viewBuilder()->setHelpers(['GoogleCharts.GoogleCharts']);
//        $this->viewBuilder()->setHelpers(['NumberFormat']);
    }
}