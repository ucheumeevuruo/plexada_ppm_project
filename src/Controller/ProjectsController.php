<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use DateTime;
use Cake\Mailer\MailerAwareTrait;       //  Built in function use for sending multiple email
use Cake\Mailer\Email;                          // import email library


/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{
    use MailerAwareTrait;

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
                'ProjectDetails',
                'ProjectDetails.Statuses',
                'ProjectDetails.Currencies',
                'Activities'
            ],
            // 'conditions' => ['ProjectDetails.system_user_id' => $this->Auth->user('system_user_id')],// This is supposed to show only projects you created. Not fully implemented
            //            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];
        //        $this->loadModel('Projects');
        $projects = $this->paginate($this->Projects);

        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all');

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->ProjectDetails->find('all');

        $this->loadModel('Activities');
        $activities =  $this->Activities->find('all');

        // debug($projects);
        // die();

        $this->set(compact('projects', 'milestones', 'projectDetails', 'activities'));
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
                'contain' => [
                    'Pims',
                    'ProjectFundings',
                    'ProjectDetails',
                    'Activities',
                    'Annotations',
                    'Milestones',
                    'Objectives',
                    'Prices',
                    'RiskIssues'
                ],
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
                    'ProjectDonors',
                    'ProjectDonors.Sponsors',
                    'ProjectMdas',
                    'ProjectMdas.Sponsors',
                    'ProjectSponsors',
                    'ProjectSponsors.Sponsors',
                    'Pads',
                    'ProjectDetails.Currencies'
                ],
            ]
        );

        //        debug($project);

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

        // debug($milestones);
        // die();

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

        $activities->contain(['Statuses', 'Priorities', 'Currencies', 'Staff', 'Milestones', 'Tasks', 'Projects']);

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
        // debug($activities);
        // die();
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
        $activePlans =  $this->Plans->find('all', ['conditions' => ['activity_id' => $id]]);

        $this->loadModel('Activities');
        $project_details = $this->Activities->find()->where(['activity_id' => $id])->first();

        $project_id_ = $project_details->project_id;
        $milestone_id_ = $project_details->milestone_id;
        $activity_id_ = $project_details->activity_id;

        // debug($activity_id_ , $project_id_ , $milestone_id_);
        // die();

        $this->set(compact('activePlans', 'activity_id_', 'project_id_', 'milestone_id_'));
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

        $this->loadModel('Users');

        $user =  $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();

        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            $user =  $this->Users->find('all')->where(['id' => $project->project_detail->system_user_id])->first();

            $proName = $project->name;
            $message = ' has just been created. The details are : ';
            $brief = $project->introduction;
            $location = $project->location;

            $text = $proName . $message .
                'Project Name: ' . $proName .
                ', Project Introduction: ' . $brief .
                ', Project Location: ' . $location;


            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));
                $email = new Email('default');
                $email->from(['projects@plexada-si-apps.com' => 'Ogun state PPM'])
                    ->to($user->email)
                    ->bcc('kingsconsult001@gmail.com') // blind carbon (optional)
                    ->subject('A project has been created')
                    ->replyTo('kingsconsult001@gmail.com')
                    ->send($text);

                return $this->redirect(['action' => 'preImplementation']);
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

        $this->loadModel('Users');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());

            $proName = $project->name;
            $message = ' has just been edited. The details are : ';
            $brief = $project->introduction;
            $location = $project->location;

            $text = $proName . $message .
                'Project Name: ' . $proName .
                ', Project Introduction: ' . $brief .
                ', Project Location: ' . $location;


            $user =  $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();

            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                $email = new Email('default');
                $email->from(['projects@plexada-si-apps.com' => 'Ogun state PPM'])
                    ->to($user->email)
                    ->bcc('kingsconsult001@gmail.com') // blind carbon (optional)
                    ->subject('A project has been edited')
                    ->replyTo('kingsconsult001@gmail.com')
                    ->send($text);

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
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

        $this->loadModel('Users');

        $user =  $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();

        if ($this->Projects->delete($project)) {
            $email = new Email('default');
            $email->from(['projects@plexada-si-apps.com' => 'Ogun state PPM'])
                ->to($user->email)
                ->bcc('kingsconsult001@gmail.com') // blind carbon (optional)
                ->subject('A project has been deleted')
                ->replyTo('kingsconsult001@gmail.com')
                ->send($project->name);
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
        return $this->redirect($this->referer());
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
        $len = count($qrymilestone);
        $i  = 0;
        // debug($len);
        // die();
        foreach ($qrymilestone as $milestone) {
            if ($i == $len - 1) {
                $milestone_id = $milestone['id'];
                $num_mile2 = $num_mile + 1;
                $mileID = "$num _ $num_mile";
                $mileConnector = "$num _ $num_mile2";
                $object_milestone = new \stdClass();
                $object_milestone->id = $mileID;
                $object_milestone->name = $milestone['description'];
                $object_milestone->actualStart = $milestone['start_date'];
                $object_milestone->actualEnd = $milestone['end_date'];
                $object_milestone->progressValue = "$progress%";
                $object_milestone->children = $this->activityRecords($milestone_id, $num, $num_mile);
                array_push($array_gantt_child, $object_milestone);
                $num_mile++;
            } else {
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
                $object_milestone->children = $this->activityRecords($milestone_id, $num, $num_mile);
                array_push($array_gantt_child, $object_milestone);
                $num_mile++;
            }
            $i++;
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
        $len = count($qryactivity);
        $i  = 0;
        foreach ($qryactivity as $activity) {
            if ($i == $len - 1) {
                $activityID = $activity['activity_id'];
                $num_mile2 = $num_mile + 1;
                $mileID = "$num _ $num _ $num_mile";
                $mileConnector = "$num _ $num _ $num_mile2";
                $object_activity = new \stdClass();
                $object_activity->id = $mileID;
                $object_activity->name = $activity['name'];
                $object_activity->actualStart = $activity['start_date'];
                $object_activity->actualEnd = $activity['end_date'];
                $object_activity->progressValue = "$progress%";
                $object_activity->children = $this->tasksRecords($activityID, $num, $num_mile);
                array_push($array_activity_child, $object_activity);
                $num_mile++;
            } else {
                $activityID = $activity['activity_id'];
                $num_mile2 = $num_mile + 1;
                $mileID = "$num _ $num _ $num_mile";
                $mileConnector = "$num _ $num _ $num_mile2";
                $object_activity = new \stdClass();
                $object_activity->id = $mileID;
                $object_activity->name = $activity['name'];
                $object_activity->actualStart = $activity['start_date'];
                $object_activity->actualEnd = $activity['end_date'];
                $object_activity->connectTo = $mileConnector;
                $object_activity->connectorType = "finish-start";
                $object_activity->progressValue = "$progress%";
                $object_activity->children = $this->tasksRecords($activityID, $num, $num_mile);
                array_push($array_activity_child, $object_activity);
                $num_mile++;
            }


            $i++;
        }
        return $array_activity_child;
    }

    public function tasksRecords($activityID, $num)
    {
        $conn = ConnectionManager::get('default');
        $array_task_child = array();
        $qrytasks = $conn->execute("SELECT *  FROM tasks where activity_id = $activityID");
        $num_mile = 1;
        $len = count($qrytasks);
        $i  = 0;
        foreach ($qrytasks as $task) {
            if ($i == $len - 1) {
                $num_mile2 = $num_mile + 1;
                $mileID = "$num _ $num _ $num _ $num_mile";
                $mileConnector = "$num _ $num _ $num _ $num_mile2";
                $object_tasks = new \stdClass();
                $object_tasks->id = $mileID;
                $object_tasks->name = $task['Task_name'];
                $object_tasks->actualStart = $task['Start_date'];
                $object_tasks->actualEnd = $task['end_date'];
                array_push($array_task_child, $object_tasks);
                $num_mile++;
            } else {
                $num_mile2 = $num_mile + 1;
                $mileID = "$num _ $num _ $num _ $num_mile";
                $mileConnector = "$num _ $num _ $num _ $num_mile2";
                $object_tasks = new \stdClass();
                $object_tasks->id = $mileID;
                $object_tasks->name = $task['Task_name'];
                $object_tasks->actualStart = $task['Start_date'];
                $object_tasks->actualEnd = $task['end_date'];
                $object_tasks->connectTo = $mileConnector;
                $object_tasks->connectorType = "finish-finish";
                array_push($array_task_child, $object_tasks);
                $num_mile++;
            }


            $i++;
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

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->Projects->find('all');


        $this->set(compact('activities', 'project_id', 'plans', 'projectDetails'));
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

        $this->set(compact('activities', 'project_id', 'plans', 'project_id_'));
    }

    public function disburse($id = null)
    {
        $this->loadModel('Disbursements');
        $disbursed =  $this->Disbursements->find('all')->where(['project_id' => $id]);

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->ProjectDetails->find('all')->where(['project_id' => $id])->first();


        $milestones = $this->Projects->Milestones->find()
            ->contain(['Projects.ProjectDetails.Currencies'])
            ->where(['Milestones.project_id' => $id]);

        // if (isset($milestones->cost)){

        foreach ($milestones as $milestone)

            $amount_dis = 0;
        foreach ($disbursed as $disburse) {
            $amount_dis = $amount_dis + $disburse->cost;
        }
        $st_date = ($projectDetails->start_dt)->format("Y");
        $ed_date = ($projectDetails->end_dt)->format("Y");
        $diff = date_diff($projectDetails->start_dt, $projectDetails->end_dt);

        $array_years = array();
        $disburse_amt = array();
        while ($st_date <= $ed_date) {
            $xx = 1;
            $y = "$st_date-01-01";
            $y2 = "$st_date-01-01";
            $z = "$st_date-12-31";
            $start_year_obj = new DateTime($y);
            $start_year = new DateTime($y2);
            while ($xx < 4) {
                $ab = "Q$xx";
                $step_up = (date_add($start_year, date_interval_create_from_date_string('3 months')))->format('Y-m-d');
                // $end_year_obj = $start_year_obj->modify('+3 month');
                $a = $start_year_obj->format('Y-m-d');
                $query = $this->Disbursements->find('all');
                $query = $query->where(['project_id' => $id, 'start_date >=' => $a, 'start_date <=' => $step_up]);
                $query = $query->select(['cost' => $query->func()->SUM('cost')])->first();
                $cummulative = $query['cost'] ? $query['cost'] : 0;
                // echo $a;
                // debug($projectDetails);
                // die();
                array_push($array_years, $st_date . "-" . $ab);
                array_push($disburse_amt, $cummulative);
                $start_year_obj->modify('+3 month');
                $xx++;
            }

            $st_date++;
        }

        $this->set(compact('id', 'disbursed', 'amount_dis', 'milestone', 'milestones', 'projectDetails', 'array_years', 'disburse_amt'));
        // }

        // $this->set(compact('projectDetails','id','milestones'));
    }




    public function viewPlans($id =  null)
    {
        $this->loadModel('Plans');
        $plans =  $this->Plans->find('all');

        $this->loadModel('Staff');
        $staffs =  $this->Staff->find('all');

        $this->set(compact('plans', 'id', 'staffs'));
    }

    public function completion()
    {
        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'id' => $q
        ];


        $this->paginate = [
            'contain' => [
                'ProjectDetails',
                'ProjectDetails.Statuses',
                'ProjectDetails.Currencies',
                'Activities'
            ],
            // 'conditions' => ['ProjectDetails.system_user_id' => $this->Auth->user('system_user_id')],// This is supposed to show only projects you created. Not fully implemented
            //            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];
        //        $this->loadModel('Projects');
        $projects = $this->paginate($this->Projects);

        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all');

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->ProjectDetails->find('all');

        $this->loadModel('Activities');
        $activities =  $this->Activities->find('all');

        // debug($projects);
        // die();

        $this->set(compact('projects', 'milestones', 'projectDetails', 'activities'));
    }

    public function implementation()
    {
        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'id' => $q
        ];


        $this->paginate = [
            'contain' => [
                'ProjectDetails',
                'ProjectDetails.Statuses',
                'ProjectDetails.Currencies',
                'Activities'
            ],
            // 'conditions' => ['ProjectDetails.system_user_id' => $this->Auth->user('system_user_id')],// This is supposed to show only projects you created. Not fully implemented
            //            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];
        //        $this->loadModel('Projects');
        $projects = $this->paginate($this->Projects);

        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all');

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->ProjectDetails->find('all');

        $this->loadModel('Activities');
        $activities =  $this->Activities->find('all');

        $this->loadModel('Approvals');
        $approvals =  $this->Approvals->find('all');

        // debug($projects);
        // die();

        $this->set(compact('projects', 'milestones', 'projectDetails', 'activities', 'approvals'));
    }
    public function preImplementation($id =  null)
    {
        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'id' => $q
        ];


        $this->paginate = [
            'contain' => [
                'ProjectDetails',
                'ProjectDetails.Statuses',
                'ProjectDetails.Currencies',
                'Activities',
                'Approvals',
                'Agreements'
            ],
            // 'conditions' => ['ProjectDetails.system_user_id' => $this->Auth->user('system_user_id')],// This is supposed to show only projects you created. Not fully implemented
            //            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];
        //        $this->loadModel('Projects');
        $projects = $this->paginate($this->Projects);

        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all');

        $this->loadModel('ProjectDetails');
        $projectDetails =  $this->ProjectDetails->find('all');

        $this->loadModel('Activities');
        $activities =  $this->Activities->find('all');

        $this->loadModel('Agreements');
        $agreements =  $this->Agreements->find('all');

        $this->loadModel('Approvals');
        $approvals =  $this->Approvals->find('all');
        // debug($agreements);
        // debug($projects);
        // die();

        $this->set(compact('projects', 'milestones', 'projectDetails', 'activities', 'agreements', 'approvals'));
    }
}
