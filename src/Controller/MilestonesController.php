<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Milestones Controller
 *
 * @property \App\Model\Table\MilestonesTable $Milestones
 *
 * @method \App\Model\Entity\Milestone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MilestonesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Statuses', 'Triggers'],
        ];
        $milestones = $this->paginate($this->Milestones);

        $this->set(compact('milestones'));
    }

    /**
     * View method
     *
     * @param string|null $id Milestone id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $milestone = $this->Milestones->get($id, [
            'contain' => ['Projects', 'Lov', 'Triggers', 'Activities'],
        ]);

        $this->set('milestone', $milestone);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($project_id = null)
    {

        //        $project_id = $this->request->getData('project_id');

        $project = $this->Milestones->Projects->get($project_id, [
            'contain' => ['ProjectDetails', 'Milestones'],
            'limit' => 200
        ]);
        $name = $this->request->getData('name');
        $prevsrecord = $this->Milestones->find('all')->where(['name' => $name])->first();
        if (isset($prevsrecord)) {
            $this->Flash->error(__('The milestone could not be saved. Record already exists, try again.'));
            return $this->redirect($this->referer());
        }
        $milestone = $this->Milestones->newEntity();
        if ($this->request->is('post')) {
            //  $milestone = $this->Milestones->patchEntity($milestone, $this->request->getData());
            $milestone = $this->Milestones->patchEntity($milestone, $this->Milestones->identify($this->request->getData()));
            if ($this->Milestones->save($milestone)) {
                $this->Flash->success(__('Indicator saved successfully.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The milestone could not be saved. Please, try again.'));
            //            return $this->redirect($this->referer());
        }


        $projects = $this->Milestones->Projects->find('list', ['limit' => 200]);

        $indicatorTotal = 0;
        foreach ($project->milestones as $miles) {
            $indicatorTotal += $miles->amount;
        }
        $sumDiff = $project->project_detail->budget - $indicatorTotal;

        $status = $this->Milestones->Statuses->find('list', ['limit' => 200])->where(['lov_type' => 'project_status']);
        $triggers = [];

        $this->set(compact('milestone', 'projects', 'project', 'project_id', 'status', 'triggers', 'sumDiff'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Milestone id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $milestone = $this->Milestones->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $milestone = $this->Milestones->patchEntity($milestone, $this->request->getData());
            $milestone = $this->Milestones->patchEntity($milestone, $this->Milestones->identify($this->request->getData()));
            if ($this->Milestones->save($milestone)) {
                $this->Flash->success(__('The milestone has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The milestone could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }

        $projects = $this->Milestones->Projects->find('list', ['limit' => 200]);

        $this->loadModel('ProjectDetails');
        $result  = $this->ProjectDetails->find('all', ['conditions' => ['project_id' => $milestone->project_id]])->first();
        $budget = $result->budget;
        $start_date = ($result->start_dt)->format("d-m-Y");
        $end_date = ($result->end_dt)->format("d-m-Y");


        $indicator = $this->Milestones->find('all')->where(['project_id' => $milestone['project_id']]);

        $indiTotal = 0;
        foreach ($indicator as $ind) {
            $indiTotal = $indiTotal + $ind->amount;
        }

        $sumDiff = $budget - $indiTotal;

        $lov = $this->Milestones->Lov->find('list', ['limit' => 200]);
        $triggers = $this->Milestones->Triggers->find('list', ['limit' => 200]);
        $this->set(compact('milestone', 'projects', 'lov', 'triggers', 'budget', 'start_date', 'end_date', 'sumDiff'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Milestone id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $milestone = $this->Milestones->get($id);
        if ($this->Milestones->delete($milestone)) {
            $this->Flash->success(__('The milestone has been deleted.'));
        } else {
            $this->Flash->error(__('The milestone could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
        return $this->redirect($this->referer());
    }

    public function method()
    {
        // Run only if this is an AJAX request and we are POSTing data
        if ($this->request->is('ajax') && !empty($this->request->data)) {
            $value_to_save = $this->request->data['the_value'];

            if ($value_to_save == 1) {
                $this->Controller->save('yes');
            } else {
                $this->Controller->save('no');
            }
        } else {
            throw new \MethodNotAllowedException('This method is not allowed');
        }
    }
}
