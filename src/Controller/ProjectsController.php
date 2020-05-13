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
                'ProjectDetails.Statuses'
            ],
//            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];

        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Pims', 'ProjectFundings', 'ProjectDetails', 'Activities', 'Annotations', 'Milestones', 'Objectives', 'Prices', 'RiskIssues'],
        ]);

        $this->set('project', $project);
    }



    public function report($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Pims', 'ProjectFundings', 'ProjectDetails', 'Activities', 'Annotations', 'Milestones', 'Objectives', 'Prices', 'RiskIssues', 'Sponsors', 'Pads'],
        ]);
        // debug($project);
        // die();
        $this->set('project', $project);
    }


    public function milestones($project_id = null)
    {
        $q = $this->request->getQuery('q');

        $milestones = $this->Projects->Milestones->find()
            ->contain(['Lov'])
            ->where(['project_id' => $project_id]);

        $milestones = $this->paginate($milestones);

        $this->set(compact('milestones', 'project_id'));
    }


    public function activities($project_id = null)
    {

        $activities = $this->Projects->Activities->find()
            ->contain(['Statuses', 'Priorities', 'Currencies'])
            ->where(['project_id' => $project_id]);

        $activities = $this->paginate($activities);

        // debug($activities);
        // die();
        $this->set(compact('activities', 'project_id'));
        
    }

    public function partners($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Sponsors', 'ProjectDetails'],
        ]);

        $this->set('project', $project);
    }

    public function riskIssues($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['RiskIssues', 'ProjectDetails'],
        ]);

        // debug($project);
        // die();
        $this->set('project', $project);
    }

    public function documents($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Pads', 'Pims', 'Documents'],
        ]);
        // debug($project);
        // die();

        $this->set('project', $project);
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
                $id = $project->id;
                // $this->addPad($id);

                return $this->redirect(['controller'=>'projectDetails','action' => 'add',$id]);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $pims = $this->Projects->Pims->find('list', ['limit' => 200]);
        $projectDetails = $this->Projects->ProjectDetails->find('list', ['limit' => 200]);
        $projectFundings = $this->Projects->ProjectFundings->find('list', ['limit' => 200]);
        $this->set(compact('project', 'pims', 'projectFundings', 'projectDetails'));
    }

    

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $pims = $this->Projects->Pims->find('list', ['limit' => 200]);
        $projectFundings = $this->Projects->ProjectFundings->find('list', ['limit' => 200]);
        $this->set(compact('project', 'pims', 'projectFundings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
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



    public function ganttChart($id = null){
        $array_gantt = array();
        $array_gantt_child = array();
        $conn = ConnectionManager::get('default');
        $qryallprojects = $conn->execute("SELECT * , projects.id as pid  FROM projects inner join project_details on projects.id = project_details.project_id where projects.id= $id");
        $mlcount = $qryallprojects->fetch('assoc');
        $num = 1;
        foreach ($qryallprojects as $projects){
            $projectID = $projects['pid'];
            $object = new \stdClass();
            $object->id = $num;
            $object->name = $projects['name'];
            $object->actualStart = $projects['start_dt'];
            $object->actualEnd= $projects['end_dt'];
            $object->children = $this->milestoneRecords($projectID, $num);
            array_push($array_gantt,$object);
        $num ++;
        }
        $ganttDetails = $array_gantt;

        $this->set(compact('ganttDetails', 'id'));
        
    }

    public function milestoneRecords($projectID, $num){
        $conn = ConnectionManager::get('default');
        $array_gantt_child = array();
        $qrymilestone = $conn->execute("SELECT *  FROM milestones where project_id = $projectID");
        $completed = $conn->execute("SELECT count(*) as T FROM milestones where project_id ='" . $projectID . "' and status_id ='3' ");
        $allproject = $conn->execute("SELECT count(*) as S FROM milestones where project_id ='" . $projectID . "' ");
        $complete = $completed->fetch('assoc');
        $totalprojects = $allproject->fetch('assoc');
        $progress = 0;
        if  ($totalprojects['S'] == 0){

            $progress = 0;
        }else{
            $result =  ($complete['T']/$totalprojects['S']) * 100;
            $progress= round(number_format($result,2),2);
        };
        $num_mile = 1 ;
        foreach ($qrymilestone as $milestone){
            $milestone_id = $milestone['id'];
            $num_mile2 = $num_mile + 1;
            $mileID = "$num _ $num_mile" ;
            $mileConnector = "$num _ $num_mile2" ;
            $object_milestone = new \stdClass();
            $object_milestone->id = $mileID;
            $object_milestone->name = $milestone['description'];
            $object_milestone->actualStart = $milestone['completed_date'];
            $object_milestone->actualEnd= $milestone['expected_completion_date'];
            $object_milestone->connectTo= $mileConnector;
            $object_milestone->connectorType= "finish-start";
            $object_milestone->progressValue= "$progress%";
            $object_milestone->children = $this->activityRecords($milestone_id, $num);
            array_push($array_gantt_child,$object_milestone);
            $num_mile ++;
        }
        return $array_gantt_child;
    }

    public function activityRecords($milestone_id, $num){
        $conn = ConnectionManager::get('default');
        $array_activity_child = array();
        $qryactivity = $conn->execute("SELECT *  FROM activities where milestone_id = $milestone_id");
        $num_mile = 1 ;
        foreach ($qryactivity as $activity){
            $activityID = $activity['activity_id'];
            $num_mile2 = $num_mile + 1;
            $mileID = "$num _ $num_mile" ;
            $mileConnector = "$num _ $num_mile2" ;
            $object_activity = new \stdClass();
            $object_activity->id = $mileID;
            $object_activity->name = $activity['next_activity'];
            $object_activity->actualStart = $activity['created'];
            $object_activity->actualEnd= $activity['last_updated'];
            $object_activity->connectTo= $mileConnector;
            $object_activity->connectorType= "finish-start";
            $object_activity->progressValue= $activity['percentage_completion']. "%";
            $object_activity->children = $this->tasksRecords($activityID, $num);
            array_push($array_activity_child,$object_activity);
            $num_mile ++;
        }
        return $array_activity_child;
    }

    public function tasksRecords($activityID, $num){
        $conn = ConnectionManager::get('default');
        $array_task_child = array();
        $qrytasks = $conn->execute("SELECT *  FROM tasks where activities_id = $activityID");
        $num_mile = 1 ;
        foreach ($qrytasks as $task){
            $num_mile2 = $num_mile + 1;
            $mileID = "$num _ $num_mile" ;
            $mileConnector = "$num _ $num_mile2" ;
            $object_tasks = new \stdClass();
            $object_tasks->id = $mileID;
            $object_tasks->name = $task['Task_name'];
            $object_tasks->actualStart = $task['Start_date'];
            // echo date('Y-m-d', strtotime($date. ' + 5 days'));
            $object_tasks->actualEnd= strtotime($task['Start_date']. ' + 5 days');
            $object_tasks->connectTo= $mileConnector;
            $object_tasks->connectorType= "finish-start";
            $object_tasks->progressValue= $task['percentage_completion'];
            array_push($array_task_child,$object_tasks);
            $num_mile ++;
        }
        return $array_task_child;
    }
}