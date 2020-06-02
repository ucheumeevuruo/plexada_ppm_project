<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use DateTime;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'id' => $q
        ];


        $this->paginate = [
            'contain' => [
                'ProjectDetails', 'ProjectDetails.Statuses', 'ProjectDetails.Currencies', 'Activities', 'Milestones'
            ],
            //            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];
//        $this->loadModel('Projects');
        $projects = $this->paginate($this->Projects);

        // debug($projectDetails);
        // die();

        $this->set(compact('projects'));
    }

    /**
     * View method
     *
     * @param  string|null $id Project id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Pims', 'ProjectFundings', 'ProjectDetails', 'Activities', 'Annotations', 'Milestones', 'Objectives', 'Prices', 'RiskIssues'],
            ]
        );

        $this->set('project', $project);
    }



    public function report($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => [
                    'Pims',
                    'ProjectFundings',
                    'ProjectDetails',
                    'Activities',
                    'Annotations',
                    'Milestones',
                    'Milestones.Statuses',
                    'Objectives',
                    'Prices',
                    'RiskIssues',
                    'ProjectDetails.Donors',
                    'ProjectDetails.Donors.SponsorTypes',
                    'ProjectDetails.Sponsors',
                    'ProjectDetails.Sponsors.SponsorTypes',
                    'Pads',
                    'ProjectDetails.Currencies'
                ],
            ]
        );

//        debug($project->milestones[0]->count());

        $this->loadModel('Milestones');
        $closedCount =  $this->Milestones->find('all', ['conditions' => ['project_id' => $id, 'status_id' => 3]])->count();
        $allCount =  $this->Milestones->find('all', ['conditions' => ['project_id' => $id]])->count();
        if ($allCount === 0) {
            $colorCode = 'primary';
        } else {
            $percent = $closedCount / $allCount;
            if ($percent <= 0.4) {
                $colorCode = 'danger';
            } else if ($percent >= 0.4 && $percent < 0.6) {
                $colorCode = 'warning';
            } else if ($percent >= 0.6 && $percent < 0.8) {
                $colorCode = 'warning';
            } else if ($percent >= 0.8 && $percent < 1) {
                $colorCode = 'success';
            } else if ($percent === 1) {
                $colorCode = 'black';
            }
        }

        $this->set(compact('project', 'colorCode'));
    }

    public function milestones($project_id = null)
    {
        $q = $this->request->getQuery('q');

        $milestones = $this->Projects->Milestones->find()
            ->contain(['Statuses', 'Projects.ProjectDetails.Currencies'])
            ->where(['Milestones.project_id' => $project_id]);

        $milestones = $this->paginate($milestones);
        
        $this->set(compact('milestones', 'project_id'));
    }

    public function indicators($project_id = null)
    {
        $q = $this->request->getQuery('q');

        $milestones = $this->Projects->Milestones->find()
            ->contain(['Statuses', 'Projects.ProjectDetails.Currencies'])
            ->where(['Milestones.project_id' => $project_id]);

        $milestones = $this->paginate($milestones);

        $this->set(compact('milestones', 'project_id'));
    }

    public function activities($project_id = null)
    {

        $q = $this->request->getQuery('q');

        $activities = $this->Projects->Activities->find();

        $activities->contain(['Statuses', 'Priorities', 'Currencies']);

        $activities->where(['Activities.project_id' => $project_id]);

        if (!is_null($q)) {
            $activities->andWhere(
                function ($exp, $query) use ($q) {
                    return $exp->like('Activities.name', "%$q%");
                }
            );
        }

        $this->paginate = [
            'maxLimit' => 8
        ];

        $activities = $this->paginate($activities);

        $project = $this->Projects->get(
            $project_id,
            [
                'contain' => ['ProjectDetails'],
            ]
        );
        $this->loadModel('Milestones');
        $milestones = $this->Milestones->find('all')->where(['project_id' => $project_id]);


        $this->set(compact('activities', 'project_id', 'project', 'milestones'));
    }

    public function partners($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Sponsors', 'ProjectDetails'],
            ]
        );

        $this->set('project', $project);
    }

    public function riskIssues($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['RiskIssues', 'ProjectDetails'],
            ]
        );

        // debug($project);
        // die();
        $this->set('project', $project);
    }

    public function documents($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Pads', 'Pims', 'Documents'],
            ]
        );
        // debug($project);
        // die();

        $this->set('project', $project);
    }


    public function planning()
    {

        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'id' => $q
        ];


        $this->paginate = [
            'contain' => [
                'ProjectDetails', 'ProjectDetails.Statuses', 'ProjectDetails.Currencies'
            ],
            //            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];

        $projects = $this->paginate($this->Projects);
        // debug($projects);
        // die();

        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all');

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->ProjectDetails->find('all');

        $this->set(compact('projects', 'milestones', 'projectDetails'));
    }

    public function plan($id = null)
    {
        $q = $this->request->getQuery('q');
        $this->loadModel('Plans');
        $activities = $this->Plans->find()->where(['activity_id' => $id]);


        $activities = $this->paginate($activities);


        $this->loadModel('Plans');
        $activePlans =  $this->Plans->find('all',['conditions'=>['activity_id'=>$id]]);

        $this->loadModel('Activities');
        $project_details = $this->Activities->find()->where(['activity_id' => $id])->first();

        $project_id_ = $project_details->project_id;
        $milestone_id_ = $project_details->milestone_id;
        $activity_id_ = $project_details->activity_id;
        
        // debug($activity_id_ , $project_id_ , $milestone_id_);
        // die();

        $this->set(compact('activePlans','activity_id_','project_id_','milestone_id_'));
    }

    public function monitoring()
    {

        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'id' => $q
        ];


        $this->paginate = [
            'contain' => [
                'ProjectDetails', 'ProjectDetails.Statuses', 'ProjectDetails.Currencies'
            ],
            //            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];

        $projects = $this->paginate($this->Projects);
        // debug($projects);
        // die();

        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all');

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->ProjectDetails->find('all');

        $this->set(compact('projects', 'milestones', 'projectDetails'));
    }

    public function disbursement()
    {
        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'id' => $q
        ];


        $this->paginate = [
            'contain' => [
                'ProjectDetails', 'ProjectDetails.Statuses', 'ProjectDetails.Currencies'
            ],
            //            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];
        $this->loadModel('Projects');
        $projects = $this->paginate($this->Projects);

        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all');

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->ProjectDetails->find('all');

        // debug($projectDetails);
        // die();

        $this->set(compact('projects', 'milestones', 'projectDetails'));
    }

    
    public function indicator($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['Pims', 'ProjectFundings', 'ProjectDetails', 'Activities', 'Annotations', 'Milestones', 'Objectives', 'Prices', 'RiskIssues', 'Sponsors', 'Pads', 'ProjectDetails.Currencies'],
            ]
        );

        $proDetail = $this->ProjectDetails->find('all')->contain(['Currencies'])->where(['project_id' => $id]);
        $this->set('project', $project, 'proDetail');


        $this->loadModel('ProjectDetails');
        $projectDet = $this->ProjectDetails->find('all')->contain(['Sponsors'])->where(['project_id' => $id]);
        $this->loadModel('Sponsors');
        $spons = $this->Sponsors->find('all')->contain(['ProjectDetails']);

        $this->loadModel('Milestones');
        $milestone_list =  $this->Milestones->find('all');
        $closedCount =  $this->Milestones->find('all', ['conditions' => ['project_id' => $id, 'status_id' => 3]])->count();
        $allCount =  $this->Milestones->find('all', ['conditions' => ['project_id' => $id]])->count();
        if ($allCount === 0) {
            $colorCode = 'primary';
        } else {
            $percent = $closedCount / $allCount;
            if ($percent <= 0.4) {
                $colorCode = 'danger';
            } else if ($percent >= 0.4 && $percent < 0.6) {
                $colorCode = 'warning';
            } else if ($percent >= 0.6 && $percent < 0.8) {
                $colorCode = 'warning';
            } else if ($percent >= 0.8 && $percent < 1) {
                $colorCode = 'success';
            } else if ($percent === 1) {
                $colorCode = 'black';
            }
        }
        // debug($allCount);
        // die();

        $milestones = $this->Projects->Milestones->find()->contain(['Activities']);

        // debug($project);
        // die();
        $this->set(compact('project', 'milestones', 'milestone_list', 'projectDet', 'spons', 'colorCode'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());

            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $pims = $this->Projects->Pims->find('list', ['limit' => 200]);
        $projectDetails = $this->Projects->ProjectDetails->find('list', ['limit' => 200]);
        $projectFundings = $this->Projects->ProjectFundings->find('list', ['limit' => 200]);
        $currencies = $this->Projects->ProjectDetails->Currencies->find('list', ['limit' => 200]);
        $this->set(compact('project', 'pims', 'projectFundings', 'projectDetails', 'currencies'));
    }



    /**
     * Edit method
     *
     * @param  string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get(
            $id,
            [
                'contain' => [],
            ]
        );
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $pims = $this->Projects->Pims->find('list', ['limit' => 200]);
        $statuses = $this->Projects->ProjectDetails->Statuses->find('list', ['limit' => 200]);
        $currencies = $this->Projects->ProjectDetails->Currencies->find('list', ['limit' => 200]);
        $projectFundings = $this->Projects->ProjectFundings->find('list', ['limit' => 200]);
        $this->set(compact('project', 'pims', 'projectFundings', 'currencies', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param  string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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


        $project = $this->Projects->get(
            $id,
            [
                'contain' => ['ProjectDetails'],
            ]
        );

        $this->set(compact('ganttDetails', 'id', 'project'));
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
            $object_milestone->actualStart = $milestone['completed_date'];
            $object_milestone->actualEnd = $milestone['expected_completion_date'];
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
        $num_mile = 1;
        foreach ($qryactivity as $activity) {
            $activityID = $activity['activity_id'];
            $num_mile2 = $num_mile + 1;
            $mileID = "$num _ $num_mile";
            $mileConnector = "$num _ $num_mile2";
            $object_activity = new \stdClass();
            $object_activity->id = $mileID;
            $object_activity->name = $activity['name'];
            $object_activity->actualStart = $activity['created'];
            $object_activity->actualEnd = $activity['last_updated'];
            $object_activity->connectTo = $mileConnector;
            $object_activity->connectorType = "finish-start";
            $object_activity->progressValue = $activity['percentage_completion'] . "%";
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
            $object_tasks->actualEnd = strtotime($task['Start_date'] . ' + 5 days');
            $object_tasks->connectTo = $mileConnector;
            $object_tasks->connectorType = "finish-start";
            $object_tasks->progressValue = "0%";
            array_push($array_task_child, $object_tasks);
            $num_mile++;
        }
        return $array_task_child;
    }
    public function planIndicators($project_id = null)
    {
        $q = $this->request->getQuery('q');

        $milestones = $this->Projects->Milestones->find()
            ->contain(['Lov', 'Projects.ProjectDetails.Currencies'])
            ->where(['Milestones.project_id' => $project_id]);

        $milestones = $this->paginate($milestones);

        $this->set(compact('milestones', 'project_id'));
    }

    public function planActivities($project_id = null)
    {
        $q = $this->request->getQuery('q');

        $activities = $this->Projects->Activities->find()->where(['milestone_id' => $project_id]);;


        $activities = $this->paginate($activities);


        $this->loadModel('Plans');
        $plans =  $this->Plans->find('all');


        $this->set(compact('activities', 'project_id', 'plans'));
    }

    public function monitorIndicators($project_id = null)
    {
        $q = $this->request->getQuery('q');

        $milestones = $this->Projects->Milestones->find()
            ->contain(['Lov', 'Projects.ProjectDetails.Currencies'])
            ->where(['Milestones.project_id' => $project_id]);

        $milestones = $this->paginate($milestones);

        $this->set(compact('milestones', 'project_id'));
    }

    public function monitorActivities($project_id = null)
    {
        $q = $this->request->getQuery('q');

        $activities = $this->Projects->Activities->find()->where(['milestone_id' => $project_id]);

        $activities = $this->paginate($activities);

        
        $this->loadModel('Plans');
        $plans =  $this->Plans->find('all');

        $this->loadModel('Milestones');
        $project_details = $this->Milestones->find()->where(['id' => $project_id])->first();
        $project_id_ = $project_details->project_id;
        // debug($project_id_);
        // die();
        $this->set(compact('activities', 'project_id', 'plans','project_id_'));
    }
}
