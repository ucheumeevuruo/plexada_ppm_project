<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;

//use Ghunti\HighchartsPHP\Highchart;
//App::import('Vendor', '\HighchartsPHP\Highchart');
//use HighchartsPHP\Highchart;
//require_once(ROOT .DS. 'vendor' . DS  . 'HighchartsPHP' . DS . 'Highchart' . DS . 'src' . DS . 'Highchart.php');
//require_once(ROOT.DS.'plugins'.DS.'GoogleCharts'.DS.'vendor'.DS.'GoogleCharts.php');

Configure::write('CakePdf', [
    'engine' => [
        'className' => 'CakePdf.WkHtmlToPdf',
        'options' => [
            'print-media-type' => true,
            'outline' => true,
            'dpi' => 96
        ]
    ],
    'orientation' => 'landscape',
    'download' => true
]);

class DashboardController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

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


//        $this->loadModel('ProjectDetails');
//        $priorities = $this->ProjectDetails->find('all')
//            ->contain(['Prices', 'Priorities'])
//            ->select(['id' => 'ProjectDetails.id', 'name' => 'if((Name) is null, \'total\', name)', 'priority_type' => 'if((Priorities.lov_value) is null, \'total_priority\', Priorities.lov_value)', 'total_consumed' => 'sum(Prices.total_cost)', 'budget' => 'sum(Prices.budget)', 'count' => 'count(*)'])
////            ->where(['Activities.Lov.lov_type' => 'priorities'])
////            ->order(['ProjectDetails.crated_date' => 'ASC'])
//            ->group(['ProjectDetails.id', 'Name', 'Priorities.lov_value'])
//            ->order(['ProjectDetails.priority_id' => 'ASC'])
//            ->toArray();
//
//        $priority = ['high' => [], 'medium' => [], 'low' => []];
//        $priority_total = [];
//        $total_consumed = 0;
//        $total_budget = 0;
//        $total_projects = 0;
//        $this->loadModel('RiskIssues');
//        foreach ($priorities as $p)
//        {
//            $data = [];
//            $priority_type = strtolower($p->priority_type);
//            if(array_key_exists($priority_type, $priority))
//            {
//                $data['name'] = $p->name;
//                $data['total_consumed'] = $p->total_consumed;
//                $data['budget'] = $p->budget;
//                $total_consumed = $total_consumed + $p->total_consumed;
//                $total_budget = $total_budget + $p->budget;
//                $total_projects++;
//                $data['risk_issues'] = $this->RiskIssues->find('all')
//                    ->contain(['Lov', 'ProjectDetails', 'ProjectDetails.Priorities'])
//                    ->select(['status' => 'Lov.lov_value', 'count' => 'count(*)', 'priority' => 'Priorities.lov_value'])
//                    ->where(['project_id' => $p->id, 'Lov.lov_value' => 'Open'])
//                    ->group(['Lov.lov_value', 'Priorities.lov_value'])
//                    ->first();
//                $data['status'] = $this->ProjectDetails->find('all')
//                    ->contain(['Lov', 'SubStatuses'])
//                    ->select(['status' => 'if((Lov.lov_value) <> \'Closed\', \'Active\', \'Completed\')', 'sub_status' => 'SubStatuses.lov_value'])
//                    ->where(['ProjectDetails.id' => $p->id])
//                    ->first();
//                $priority[$priority_type][] = $data;
//            }
//        }
//        $priority_total['total_consumed'] = $total_consumed;
//        $priority_total['total_budget'] = $total_budget;
//        $priority_total['total_projects'] = $total_projects;
//        $priority_total['consumed_percentage'] = ($total_consumed / $total_budget) * 100;
////        debug($priority);
////        die();
//        $priority = ($priority);
//        $this->set( compact( 'priority', 'priority_total' ) );


        $this->loadModel('ProjectDetails');
        $this->loadModel('Milestones');
        $this->loadModel('RiskIssues');
        $project_list = $this->ProjectDetails->find('all');
        $milestone_list =  $this->Milestones->find('all')->where('status_id=3');

        // $mymy = $this->Milestones->find('all', array(
        //     'fields' => 'MAX(completed_date)',
        //     'group' => 'completed_date'
        //  ));

        $priorities = $this->ProjectDetails->find('all')
            ->contain(['Prices', 'Priorities'])
            ->select(['id' => 'ProjectDetails.id', 'name' => 'if((Name) is null, \'total\', name)', 'priority_type' => 'if((Priorities.lov_value) is null, \'total_priority\', Priorities.lov_value)', 'total_consumed' => 'sum(Prices.total_cost)', 'budget' => 'sum(Prices.budget)', 'count' => 'count(*)'])
//            ->where(['Activities.Lov.lov_type' => 'priorities'])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
            ->group(['ProjectDetails.id', 'Priorities.lov_value', 'Name'])
            ->epilog('WITH ROLLUP')
//            ->order(['Lov.lov_value' => 'ASC'])
//            ->limit(10)
            ->toArray();

        // $priority = ['priorities' => ['high' => [], 'medium' => [], 'low' => []]];
        // $priority_total = [];
        // foreach ($priorities as $p)
        // {
        //     $priority_type = strtolower($p['priority_type']);
        //     if($p['name'] == 'total' && $priority_type == 'total_priority')
        //     {
        //         $data = [];
        //         $data['total_budget'] = $p['budget'];
        //         $data['total_consumed'] = $p['total_consumed'];
        //         $data['count'] = $p['count'];
        //         $priority_total = $data;
        //     }else if($p['name'] == 'total' && $priority_type != 'total_priority')
        //     {
        //         $data = [];
        //         $sub_total = @$priority['priorities'][$priority_type]['sub_total'];
        //         $data['priorities'] = $p['priority_type'];
        //         $data['total_budget'] = $p['budget'];
        //         $data['total_consumed'] = $p['total_consumed'];
        //         $data['count'] = $p['count'];
        //         if(is_array($sub_total))
        //         {
        //             foreach($sub_total as $k => $v)
        //             {
        //                 if($v == $p['priority_type'])
        //                 {
        //                     $data['total_budget'] += $sub_total['total_budget'];
        //                     $data['total_consumed'] += $sub_total['total_budget'];
        //                     $data['count'] += $sub_total['count'];
        //                     break;
        //                 }
        //             }
        //         }

        //         $priority['priorities'][$priority_type]['sub_total'] = $data;
        //     }else{
        //         if(array_key_exists($priority_type, $priority['priorities']))
        //         {
        //             $p['milestone'] = $this->Milestones->find('all')
        //                 ->contain(['Lov'])
        //                 ->select(['count' => 'count(Milestones.id)', 'total' => '(select count(*) from milestones where project_id = \'' . $p->id . '\')'])
        //                 ->where(['project_id' => $p->id, 'lower(Lov.lov_value)' => 'closed'])
        //                 ->first();
        //             $p['risk_issues'] = $this->RiskIssues->find('all')
        //                 ->contain(['Lov', 'ProjectDetails', 'ProjectDetails.Priorities'])
        //                 ->select(['status' => 'Lov.lov_value', 'count' => 'count(*)', 'priority' => 'Priorities.lov_value'])
        //                 ->where(['project_id' => $p->id, 'Lov.lov_value' => 'Open'])
        //                 ->group(['Lov.lov_value', 'Priorities.lov_value'])
        //                 ->first();
        //             $p['status'] = $this->ProjectDetails->find('all')
        //                 ->contain(['Lov', 'SubStatuses'])
        //                 ->select(['status' => 'if((Lov.lov_value) <> \'Closed\', \'Active\', \'Completed\')', 'sub_status' => 'SubStatuses.lov_value'])
        //                 ->where(['ProjectDetails.id' => $p->id])
        //                 ->first();
        //             $priority['priorities'][$priority_type]['result'][] = $p;
        //         }
        //     }
        // }

        foreach($project_list as $prj){

		}
        // sending projects as array
        $allprojects = $project_list
        ->select(['name']);
        $allprojects = $allprojects
        ->extract('name')
        ->toArray();
        // sending projects as array

        // $priority = ($priority);
        // $this->set( compact( 'priority', 'priority_total','project_list','milestone_list','allprojects') );
        $this->set( compact('project_list','milestone_list','allprojects') );
    }

    public function beforeRender(Event $event)
    {
//        $this->loadHelper('GoogleCharts.GoogleCharts');
//        return parent::beforeRender($event); // TODO: Change the autogenerated stub
        parent::beforeRender($event);
//        $this->viewBuilder()->setHelpers(['GoogleCharts.GoogleCharts']);
//        $this->viewBuilder()->setHelpers(['Num']);
    }

    public function downloadPdf($id = null)
    {
        $this->loadModel('ProjectDetails');
        $this->loadModel('Milestones');
        $this->loadModel('RiskIssues');
        $priorities = $this->ProjectDetails->find('all')
            ->contain(['Prices', 'Priorities'])
            ->select(['id' => 'ProjectDetails.id', 'name' => 'if((Name) is null, \'total\', name)', 'priority_type' => 'if((Priorities.lov_value) is null, \'total_priority\', Priorities.lov_value)', 'total_consumed' => 'sum(Prices.total_cost)', 'budget' => 'sum(Prices.budget)', 'count' => 'count(*)'])
//            ->where(['Activities.Lov.lov_type' => 'priorities'])
//            ->order(['ProjectDetails.crated_date' => 'ASC'])
            ->group(['ProjectDetails.id', 'Priorities.lov_value', 'Name'])
            ->epilog('WITH ROLLUP')
//            ->order(['Lov.lov_value' => 'ASC'])
//            ->limit(10)
            ->toArray();

        $priority = ['priorities' => ['high' => [], 'medium' => [], 'low' => []]];
        $priority_total = [];
        foreach ($priorities as $p)
        {
            $priority_type = strtolower($p['priority_type']);
            if($p['name'] == 'total' && $priority_type == 'total_priority')
            {
                $data = [];
                $data['total_budget'] = $p['budget'];
                $data['total_consumed'] = $p['total_consumed'];
                $data['count'] = $p['count'];
                $priority_total = $data;
            }else if($p['name'] == 'total' && $priority_type != 'total_priority')
            {
                $data = [];
                $sub_total = @$priority['priorities'][$priority_type]['sub_total'];
                $data['priorities'] = $p['priority_type'];
                $data['total_budget'] = $p['budget'];
                $data['total_consumed'] = $p['total_consumed'];
                $data['count'] = $p['count'];
                if(is_array($sub_total))
                {
                    foreach($sub_total as $k => $v)
                    {
                        if($v == $p['priority_type'])
                        {
                            $data['total_budget'] += $sub_total['total_budget'];
                            $data['total_consumed'] += $sub_total['total_budget'];
                            $data['count'] += $sub_total['count'];
                            break;
                        }
                    }
                }

                $priority['priorities'][$priority_type]['sub_total'] = $data;
            }else{
                if(array_key_exists($priority_type, $priority['priorities']))
                {
                    $p['milestone'] = $this->Milestones->find('all')
                        ->contain(['Lov'])
                        ->select(['count' => 'count(Milestones.id)', 'total' => '(select count(*) from milestones where project_id = \'' . $p->id . '\')'])
                        ->where(['project_id' => $p->id, 'lower(Lov.lov_value)' => 'closed'])
                        ->first();
                    $p['risk_issues'] = $this->RiskIssues->find('all')
                        ->contain(['Lov', 'ProjectDetails', 'ProjectDetails.Priorities'])
                        ->select(['status' => 'Lov.lov_value', 'count' => 'count(*)', 'priority' => 'Priorities.lov_value'])
                        ->where(['project_id' => $p->id, 'Lov.lov_value' => 'Open'])
                        ->group(['Lov.lov_value', 'Priorities.lov_value'])
                        ->first();
                    $p['status'] = $this->ProjectDetails->find('all')
                        ->contain(['Lov', 'SubStatuses'])
                        ->select(['status' => 'if((Lov.lov_value) <> \'Closed\', \'Active\', \'Completed\')', 'sub_status' => 'SubStatuses.lov_value'])
                        ->where(['ProjectDetails.id' => $p->id])
                        ->first();
                    $priority['priorities'][$priority_type]['result'][] = $p;
                }
            }
        }
        $priority = ($priority);
//        $invoice = $this->Dashboard->get($id);
        $this->viewBuilder()->setOptions([
            'pdfConfig' => [
//                'orientation' => 'portrait',
                'filename' => $id . '.pdf'
            ]
        ]);
        $this->set( compact( 'priority', 'priority_total' ) );
    }


    public function milestones($id = null)
{
    $projectDetail = $this->ProjectDetails->get($id, [
        // 'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'Milestones', 'Milestones.Lov', 'Milestones.Triggers', 'Priorities', 'Prices', 'Prices.Currencies'],
        'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'Milestones', 'Milestones.Lov', 'Milestones.Triggers', 'Priorities', 'Prices'],
    ]);

    $this->set('projectDetail', $projectDetail);
}
}

