<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimTasks Controller
 *
 * @property \App\Model\Table\PimTasksTable $PimTasks
 *
 * @method \App\Model\Entity\PimTask[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimTasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pims'],
        ];
        $pimTasks = $this->paginate($this->PimTasks);

        $this->set(compact('pimTasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Task id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimTask = $this->PimTasks->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimTask', $pimTask);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimTask = $this->PimTasks->newEntity();
        if ($this->request->is('post')) {
            $pimTask = $this->PimTasks->patchEntity($pimTask, $this->request->getData());
            if ($this->PimTasks->save($pimTask)) {
                $this->Flash->success(__('The pim task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim task could not be saved. Please, try again.'));
        }
        $pims = $this->PimTasks->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimTask', 'pims'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimTask = $this->PimTasks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimTask = $this->PimTasks->patchEntity($pimTask, $this->request->getData());
            if ($this->PimTasks->save($pimTask)) {
                $this->Flash->success(__('The pim task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim task could not be saved. Please, try again.'));
        }
        $pims = $this->PimTasks->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimTask', 'pims'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimTask = $this->PimTasks->get($id);
        if ($this->PimTasks->delete($pimTask)) {
            $this->Flash->success(__('The pim task has been deleted.'));
        } else {
            $this->Flash->error(__('The pim task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
