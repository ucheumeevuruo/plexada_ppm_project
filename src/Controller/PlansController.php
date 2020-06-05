<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Plans Controller
 *
 * @property \App\Model\Table\PlansTable $Plans
 *
 * @method \App\Model\Entity\Plan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlansController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Activities'],
        ];
        $plans = $this->paginate($this->Plans);

        $this->set(compact('plans'));
    }

    /**
     * View method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plan = $this->Plans->get($id, [
            'contain' => ['Activities'],
        ]);
        // debug($plan);
        // die();

        $this->set('plan', $plan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $plan = $this->Plans->newEntity();
        if ($this->request->is('post')) {
            $plan = $this->Plans->patchEntity($plan, $this->Plans->identify($this->request->getData()));
            if ($this->Plans->save($plan)) {
                $this->Flash->success(__('The plan has been saved.'));

                return $this->redirect($this->referer());
            }

            $this->Flash->error(__('The plan could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $activities = $this->Plans->Activities->find('list', ['limit' => 200]);

        $this->loadModel('Activities');
        $activity_details = $this->Activities->find('all', ['conditions' => ['activity_id'=>$id]])->first();

        $s_date = ($activity_details->start_date)->format("d-m-Y");
        $e_date = ($activity_details->end_date)->format("d-m-Y");

        $activity_id = $id;

        // $activities = $this->Plans->Activities->find('all', ['limit' => 200]);
        // $activities = $this->Plans->Activities->find()->combine('id', 'name');


        $staff = $this->Plans->Staff->find('list', ['limit' => 200]);
        $user = $this->Plans->Users->find('list', ['limit' => 200]);


        $logged_in_user = $this->Auth->user('id');

        $this->set(compact('plan', 'activities', 'staff', 'user', 'logged_in_user','id','activity_id','s_date','e_date'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plan = $this->Plans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // $plan = $this->Plans->patchEntity($plan, $this->request->getData());
            $plan = $this->Plans->patchEntity($plan, $this->Plans->identify($this->request->getData()));
            if ($this->Plans->save($plan)) {
                $this->Flash->success(__('The plan has been saved.'));

                return $this->redirect($this->referer());
            }

            $this->Flash->error(__('The plan could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }

        $staff = $this->Plans->Staff->find('list', ['limit' => 200]);
        $logged_in_user = $this->Auth->user('id');
        $activity = $this->Plans->find()->where(['id' => $id])->first();
        $sid = $activity->activity_id;
        // debug($activity->activity_id);
        // die();
        $activities = $this->Plans->Activities->find('list', ['limit' => 200]);
        $this->set(compact('plan', 'activities', 'logged_in_user', 'activity', 'staff', 'sid'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plan = $this->Plans->get($id);
        if ($this->Plans->delete($plan)) {
            $this->Flash->success(__('The plan has been deleted.'));
        } else {
            $this->Flash->error(__('The plan could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
        return $this->redirect($this->referer());

    }
}
