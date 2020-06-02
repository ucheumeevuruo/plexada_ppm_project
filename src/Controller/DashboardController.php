<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use DateTime;

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

    public function view()
    {
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

        foreach ($projectDetails as $key => $projectDetail) {
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

        $project_list2 = $this->ProjectDetails->find('all');

        $project_list = $this->ProjectDetails->find('all');

        // sending projects as array
        $allprojects = $project_list2

            ->select(['name']);
        $allprojects = $allprojects
            ->extract('name')
            ->toArray();

        $allBudgetList = $project_list2
            ->select(['budget']);
        $allBudgetList = $allBudgetList
            ->extract('budget')
            ->toArray();

        $allExpenseList = $project_list2
            ->select(['expenses']);
        $allExpenseList = $allExpenseList
            ->extract('expenses')
            ->toArray();
        // sending projects as array


        // $ganttDetails = $this->ganttChart();

        // $priority = ($priority);
        // $this->set( compact( 'priority', 'priority_total','project_list','milestone_list','allprojects') );

        $array_gantt = array();
        $array_gantt_child = array();
        $conn = ConnectionManager::get('default');
        $qryallprojects = $conn->execute("SELECT * , projects.id as pid  FROM projects inner join project_details on projects.id = project_details.project_id");
        // $qryallprojects = $conn->execute("SELECT * , projects.id as pid  FROM projects inner join project_details on projects.id = project_details.project_id where projects.id=19");
        $mlcount = $qryallprojects->fetch('assoc');
        $num = 1;
        foreach ($qryallprojects as $projects) {
            $projectID = $projects['pid'];
            $object = new \stdClass();
            $object->id = $num;
            $object->name = $projects['name'];
            $object->actualStart = $projects['start_dt'];
            $object->actualEnd = $projects['end_dt'];
            $object->children = $this->milestoneRecords($projectID, $num);
            array_push($array_gantt, $object);
            $num++;
        }
        $ganttDetails = $array_gantt;

        $this->set(compact('project_list', 'milestone_list', 'allprojects', 'ganttDetails', 'allBudgetList', 'allExpenseList'));


        $this->loadModel('ProjectDetails');


        $fundingType = $this->ProjectDetails->find('all');
        $loan = 0;
        $grant = 0;
        $donor = 0;
        $ppp = 0;
        $none = 0;
        $others = 0;
        $total = 0;
        foreach ($fundingType as $fund) {
            if ($fund->funding_type == 'Loan') {
                $loan++;
                $total++;
            } elseif ($fund->funding_type == 'Grant') {
                $grant++;
                $total++;
            } elseif ($fund->funding_type == 'Donor') {
                $donor++;
                $total++;
            } elseif ($fund->funding_type == 'PPP') {
                $ppp++;
                $total++;
            } elseif ($fund->funding_type == 'None') {
                $none++;
                $total++;
            } else {
                $others++;
                $total++;
            }
        }
        $loanPercent = round(($loan / $total * 100), 1);
        $grantPercent = round(($grant / $total * 100), 1);
        $donorPercent = round(($donor / $total * 100), 1);
        $pppPercent = round(($ppp / $total * 100), 1);
        $nonePercent = round(($none / $total * 100), 1);
        $othersPercent = round(($others / $total * 100), 1);


        // $incomes = $this->ProjectDetails->find(
        //     'list',
        //     [
        //         'keyField' => 'month',
        //         'valueField' => 'amount',
        //         'fields' => [
        //             'month' => 'MONTHNAME(created)',
        //             'amount' => 'SUM(budget)'
        //         ],
        //         'group' => ['month'],
        //         'order' => ['MONTH(created)' => 'ASC'],
        //     ]
        // )->toArray();

        // $months = json_encode(array_keys($incomes));
        // $amounts = json_encode(array_values($incomes));
        // $this->set('months', $months);
        // $this->set('amounts', $amounts);

        // debug($incomes);
        // die();
        $this->set(compact('loan', 'grant', 'donor', 'ppp', 'none', 'others', 'total', 'loanPercent'));
        $this->set(compact('loanPercent', 'grantPercent', 'donorPercent', 'pppPercent', 'nonePercent', 'othersPercent', 'total'));
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
        foreach ($priorities as $p) {
            $priority_type = strtolower($p['priority_type']);
            if ($p['name'] == 'total' && $priority_type == 'total_priority') {
                $data = [];
                $data['total_budget'] = $p['budget'];
                $data['total_consumed'] = $p['total_consumed'];
                $data['count'] = $p['count'];
                $priority_total = $data;
            } else if ($p['name'] == 'total' && $priority_type != 'total_priority') {
                $data = [];
                $sub_total = @$priority['priorities'][$priority_type]['sub_total'];
                $data['priorities'] = $p['priority_type'];
                $data['total_budget'] = $p['budget'];
                $data['total_consumed'] = $p['total_consumed'];
                $data['count'] = $p['count'];
                if (is_array($sub_total)) {
                    foreach ($sub_total as $k => $v) {
                        if ($v == $p['priority_type']) {
                            $data['total_budget'] += $sub_total['total_budget'];
                            $data['total_consumed'] += $sub_total['total_budget'];
                            $data['count'] += $sub_total['count'];
                            break;
                        }
                    }
                }

                $priority['priorities'][$priority_type]['sub_total'] = $data;
            } else {
                if (array_key_exists($priority_type, $priority['priorities'])) {
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
        $this->set(compact('priority', 'priority_total'));
    }


    public function milestones($id = null)
    {
        $projectDetail = $this->ProjectDetails->get($id, [
            // 'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'Milestones', 'Milestones.Lov', 'Milestones.Triggers', 'Priorities', 'Prices', 'Prices.Currencies'],
            'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'Milestones', 'Milestones.Lov', 'Milestones.Triggers', 'Priorities', 'Prices'],
        ]);

        $this->set('projectDetail', $projectDetail);
    }

    public function ganttChart($id = null)
    {
        $array_gantt = array();
        $array_gantt_child = array();
        $conn = ConnectionManager::get('default');
        $qryallprojects = $conn->execute("SELECT * , projects.id as pid  FROM projects inner join project_details on projects.id = project_details.project_id where projects.id= $id");
        $mlcount = $qryallprojects->fetch('assoc');
        $num = 1;
        foreach ($qryallprojects as $projects) {
            $projectID = $projects['pid'];
            $object = new \stdClass();
            $object->id = $num;
            $object->name = $projects['name'];
            $object->actualStart = $projects['start_dt'];
            $object->actualEnd = $projects['end_dt'];
            $object->children = $this->milestoneRecords($projectID, $num);
            array_push($array_gantt, $object);
            $num++;
        }
        $ganttDetails = $array_gantt;

        $this->set(compact('ganttDetails'));
    }

    public function milestoneRecords($projectID, $num)
    {
        $conn = ConnectionManager::get('default');
        $array_gantt_child = array();
        $qrymilestone = $conn->execute("SELECT *  FROM milestones where project_id = $projectID");
        $completed = $conn->execute("SELECT count(*) as T FROM milestones where project_id ='" . $projectID . "' and status_id ='3' ");
        $allproject = $conn->execute("SELECT count(*) as S FROM milestones where project_id ='" . $projectID . "' ");
        $complete = $completed->fetch('assoc');
        $totalprojects = $allproject->fetch('assoc');
        $progress = 0;
        if ($totalprojects['S'] == 0) {

            $progress = 0;
        } else {
            $result =  ($complete['T'] / $totalprojects['S']) * 100;
            $progress = round(number_format($result, 2), 2);
        };
        $num_mile = 1;
        foreach ($qrymilestone as $milestone) {
            $milestone_id = $milestone['id'];
            $num_mile2 = $num_mile + 1;
            $mileID = "$num _ $num_mile";
            $mileConnector = "$num _ $num_mile2";
            $object_milestone = new \stdClass();
            $object_milestone->id = $mileID;
            $object_milestone->name = $milestone['description'];
            $object_milestone->actualStart = $milestone['start_date'];
            $object_milestone->actualEnd = $milestone['end_date'];
            $object_milestone->connectTo = $mileConnector;
            $object_milestone->connectorType = "finish-start";
            $object_milestone->progressValue = "$progress%";
            $object_milestone->children = $this->activityRecords($milestone_id, $num);
            array_push($array_gantt_child, $object_milestone);
            $num_mile++;
        }
        return $array_gantt_child;
    }

    public function activityRecords($milestone_id, $num)
    {
        $conn = ConnectionManager::get('default');
        $array_activity_child = array();
        $qryactivity = $conn->execute("SELECT *  FROM activities where milestone_id = $milestone_id");

        $completed = $conn->execute("SELECT count(*) as T FROM activities where milestone_id ='" . $milestone_id . "' and status_id ='3' ");
        $allproject = $conn->execute("SELECT count(*) as S FROM activities where milestone_id ='" . $milestone_id . "' ");
        $complete = $completed->fetch('assoc');
        $totalprojects = $allproject->fetch('assoc');
        $progress = 0;        
        if ($totalprojects['S'] == 0) {

            $progress = 0;
        } else {
            $result =  ($complete['T'] / $totalprojects['S']) * 100;
            $progress = round(number_format($result, 2), 2);
        };
        $num_mile = 1;
        foreach ($qryactivity as $activity) {
            $activityID = $activity['activity_id'];
            $num_mile2 = $num_mile + 1;
            $mileID = "$num _ $num_mile";
            $mileConnector = "$num _ $num_mile2";
            $object_activity = new \stdClass();
            $object_activity->id = $mileID;
            $object_activity->name = $activity['name'];
            $object_activity->actualStart = $activity['start_date'];
            $object_activity->actualEnd = $activity['end_date'];
            $object_activity->connectTo = $mileConnector;
            $object_activity->connectorType = "start-start";
            $object_activity->progressValue = "$progress%";
            $object_activity->children = $this->tasksRecords($activityID, $num);
            array_push($array_activity_child, $object_activity);
            $num_mile++;
        }
        return $array_activity_child;
    }

    public function tasksRecords($activityID, $num)
    {
        $conn = ConnectionManager::get('default');
        $array_task_child = array();
        $qrytasks = $conn->execute("SELECT *  FROM tasks where activity_id = $activityID");
        $num_mile = 1;
        foreach ($qrytasks as $task) {
            $num_mile2 = $num_mile + 1;
            $mileID = "$num _ $num_mile";
            $mileConnector = "$num _ $num_mile2";
            $object_tasks = new \stdClass();
            $object_tasks->id = $mileID;
            $object_tasks->name = $task['Task_name'];
            $object_tasks->actualStart = $task['Start_date'];
            // echo date('Y-m-d', strtotime($date. ' + 5 days'));
            $object_tasks->actualEnd = $task['end_date'];
            $object_tasks->connectTo = $mileConnector;
            $object_tasks->connectorType = "finish-finish";
            // $object_tasks->progressValue = "0%";
            array_push($array_task_child, $object_tasks);
            $num_mile++;
        }
        return $array_task_child;
    }
}