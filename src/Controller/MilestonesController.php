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
            'contain' => ['Projects', 'Lov', 'Triggers'],
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
    public function add($id = null)
    {
        $this->loadModel('ProjectDetails');

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

        // $ddi = $this->ProjectDetails->find('all')->where(['project_id'=> $projects->id]);

        $ddi  = $this->ProjectDetails->find('all', ['conditions' => ['project_id' => $id]]);
        foreach ($ddi as $a);
        $result = $a->budget;

        $start_date = ($a->start_dt)->format("d-m-Y");
        $end_date = ($a->end_dt)->format("d-m-Y");

        // debug($end_date);
        // die();

        $indicator = $this->Milestones->find('all')->where(['project_id' => $id]);

        $indiTotal = 0;
        foreach ($indicator as $ind) {
            $indiTotal = $indiTotal + $ind->amount;
        }
        $sumDiff = $result - $indiTotal;

        // debug($sumDiff);
        // debug($start_date);
        // die();

        $lov = $this->Milestones->Lov->find('list', ['limit' => 200])->where(['lov_type' => 'project_status']);
        //        $triggers = $this->Milestones->Triggers->find('list', ['limit' => 200]);
        $triggers = [];

        $this->set(compact('milestone', 'projects', 'lov', 'triggers', 'id',  'result', 'start_date','end_date', 'sumDiff' ));
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
        // $milestone = $this->Milestones->find('all',['conditions'=>['project_id'=>$id]]);

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

        // debug($projects);
        // die();

        // $projectDetails = $this->Milestones->ProjectDetails->find('list', ['limit' => 200]);

        $lov = $this->Milestones->Lov->find('list', ['limit' => 200]);
        $triggers = $this->Milestones->Triggers->find('list', ['limit' => 200]);
        $this->set(compact('milestone', 'projects', 'lov', 'triggers'));
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
}
