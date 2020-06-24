<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\MailerAwareTrait;       //  Built in function use for sending multiple email
use Cake\Mailer\Email;                          // import email library

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 * @property \App\Model\Table\MilestonesTable $Milestones
 * @property \App\Model\Table\ProjectDetailsTable $ProjectDetails
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Activity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivitiesController extends AppController
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
                'ProjectDetails', 'Staff', 'Statuses', 'Users'
            ],
            'maxLimit' => 8,
            'finder' => [
                'byProjectId' => $customFinderOptions
            ]
        ];

        $activities = $this->paginate($this->Activities);

        $this->set(compact('activities'));
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => ['Projects', 'Milestones', 'Staff', 'Statuses', 'Users', 'Priorities', 'Tasks'],
        ]);

        // debug($activity);
        // die();

        $this->set('activity', $activity);
    }

    public function tasks($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => ['Tasks'],
        ]);

        $this->set('activity', $activity);
    }



    /**
     * Add method
     *
     * @param null $project_id
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($project_id = null)
    {
        $project = $this->Activities->Projects->get($project_id, [
            'contain' => ['ProjectDetails', 'ProjectDetails.Currencies', 'Activities']
        ]);
        $name = $this->request->getData('name');
        $prevsrecord = $this->Activities->find('all')->where(['name'=>$name])->first();
        if(isset($prevsrecord)){
            $this->Flash->error(__('The activity could not be saved. Record already exists, try again.'));
            return $this->redirect($this->referer());
        }
        $activity = $this->Activities->newEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->Activities->identify($this->request->getData()));
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                //                return $this->redirect(['controller' => 'ProjectDetails', 'action' => 'view', $project_id]);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
        }
        $projects = $this->Activities->Projects->find('list', ['limit' => 200]);
        $staff = $this->Activities->Staff->find('list', ['limit' => 200]);
        $priority = $this->Activities->Priorities->find('list', ['limit' => 200]);
        $status = $this->Activities->Statuses->find('list', ['limit' => 200]);
        $users = $this->Activities->Users->find('list', ['limit' => 200]);
        $activityTotal = 0;
        foreach ($project->activities as $act) {
            $activityTotal += $act->cost;
        }
        $sumDiff = $project->project_detail->budget - $activityTotal;

        $milestone = $this->Activities->Milestones->find('list', ['limit' => 200, 'conditions' => ['project_id' => $project_id]]);
        $this->set(compact('activity', 'projects', 'project', 'staff', 'priority', 'sumDiff', 'status', 'users', 'milestone'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => [],
        ]);

        $this->loadModel('Users');
        $user =  $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->first();

        $this->loadModel('Projects');
        $project =  $this->Projects->find('all')->where(['id' => $activity->project_id])->first();

        $this->loadModel('Lov');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->Activities->identify($this->request->getData()));
            if ($this->Activities->save($activity)) {
                $risks = $this->request->getData('risk');

                // get the id of project sub status
                $sub = $this->request->getData('percentage_completion');

                // get the lov 
                $lov =  $this->Lov->find('all')->where(['id' => $sub])->first();

                $this->Flash->success(__('The activity has been saved.'));
                $project_id = $activity->project_id;
                $conn = ConnectionManager::get('default');
                $conn->execute("Update project_details set risk_and_issues = '" . $risks . "' where project_id = $project_id");


                $proName = $project->name;
                $message = ' activity has been edited, the sub status is now "';
                $lov = $lov->lov_value;
                $riskIssue = '". The risks and Issues is "';
                

                $text = $proName . $message . $lov . $riskIssue . $risks .'"';

                $email = new Email('default');
                $email->from(['projects@plexada-si-apps.com' => 'Ogun state PPM'])
                    ->to($user->email)
                    ->bcc('kingsconsult001@gmail.com') // blind carbon (optional)
                    ->subject('A project activity has been edited')
                    ->replyTo('kingsconsult001@gmail.com')
                    ->send($text);

                //                return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }

        $projectDetails = $this->Activities->ProjectDetails->find('list', ['limit' => 200]);
        $staff = $this->Activities->Staff->find('list', ['limit' => 200]);
        //        $lov = $this->Activities->Lov->find('list', ['limit' => 200]);
        $priority = $this->Activities->Priorities->find('list', [
            'conditions' => ['Priorities.lov_type' => 'priority'],
            'limit' => 200
        ]);
        $status = $this->Activities->Statuses->find(
            'list',
            [
                'conditions' => ['Statuses.lov_type' => 'project_status'],
                'limit' => 200
            ]
        );

        $this->loadModel('Lov');
        $substatus = $this->Lov->find(
            'list',
            [
                'conditions' => ['lov_type' => 'project_sub_status'],
                'limit' => 200
            ]
        );

        $users = $this->Activities->Users->find('list', ['limit' => 200]);

        $this->loadModel('Milestones');

        $result  = $this->Milestones->find('all', ['conditions' => ['id' => $activity->milestone_id]])->first();

        // $budget = $result->amount;
        $s_date = ($result->start_date)->format("d-m-Y");
        $e_date = ($result->end_date)->format("d-m-Y");



        $this->set(compact('activity', 'projectDetails', 'staff', 'users', 'priority', 'status', 'budget', 's_date', 'e_date', 'substatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activity = $this->Activities->get($id);
        if ($this->Activities->delete($activity)) {
            $this->Flash->success(__('The activity has been deleted.'));
        } else {
            $this->Flash->error(__('The activity could not be deleted. Please, try again.'));
        }

        //        return $this->redirect(['action' => 'index']);
        return $this->redirect($this->referer());
    }

    public function method()
    {
        // Run only if this is an AJAX request and we are POSTing data
        if ($this->request->is('ajax') && !empty($this->request->data)) {
            $value_sent = $this->request->data['the_value'];

            $this->loadModel('Milestones');
            $indicator = $this->Milestones->find('all')->where(['project_id' => $value_sent]);
            $s_date = ($result->start_date)->format("d-m-Y");
            $e_date = ($result->end_date)->format("d-m-Y");
            return $s_date;
        } else {
            throw new \MethodNotAllowedException('This method is not allowed');
        }
    }
}
