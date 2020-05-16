<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tasks = $this->paginate($this->Tasks);

        $this->set(compact('tasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => [],
        ]);

        $this->set('task', $task);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
//        $project_info = $this->Projects->get($id);


        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            // $task = $this->Tasks->patchEntity($task, $this->request->getData());
            $task = $this->Tasks->patchEntity($task, $this->Tasks->identify($this->request->getData()));
//             debug($task);
//             die();
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
            
            // debug($task);
            // die();
            return $this->redirect($this->referer());
        }
        $activities = $this->Tasks->Activities->find('list', ['limit' => 200]);
            // sql($activities_info);
            // die();
            // echo $activities_info;
        $oldTasks = $this->Tasks->find('list')->where(['activity_id'=>$id]);
        // debug($oldTasks);
        // die();
        $this->set(compact('task','activities', 'id','oldTasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->Tasks->identify($this->request->getData()));
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $this->set(compact('task'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
