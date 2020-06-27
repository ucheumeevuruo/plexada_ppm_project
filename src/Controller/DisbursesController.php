<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Disburses Controller
 *
 * @property \App\Model\Table\DisbursesTable $Disburses
 *
 * @method \App\Model\Entity\Disburse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisbursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects'],
        ];
        $disburses = $this->paginate($this->Disburses);

        $this->set(compact('disburses'));
    }

    /**
     * View method
     *
     * @param string|null $id Disburse id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disburse = $this->Disburses->get($id, [
            'contain' => ['Projects'],
        ]);

        $this->set('disburse', $disburse);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $disburse = $this->Disburses->newEntity();
        if ($this->request->is('post')) {
            $disburse = $this->Disburses->patchEntity($disburse, $this->request->getData());
            if ($this->Disburses->save($disburse)) {
                $this->Flash->success(__('The disburse has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The disburse could not be saved. Please, try again.'));
        }
        $projects = $this->Disburses->Projects->find('list', ['limit' => 200])->where(['id' => $id]);

        $this->loadModel('Sponsors');
        $sponsors =  $this->Sponsors->find('list');

        $this->set(compact('disburse', 'projects', 'sponsors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disburse id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disburse = $this->Disburses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disburse = $this->Disburses->patchEntity($disburse, $this->request->getData());
            if ($this->Disburses->save($disburse)) {
                $this->Flash->success(__('The disburse has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The disburse could not be saved. Please, try again.'));
        }
        $projects = $this->Disburses->Projects->find('list', ['limit' => 200]);

        $this->loadModel('Sponsors');
        $sponsors =  $this->Sponsors->find('list');

        $this->set(compact('disburse', 'projects', 'sponsors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disburse id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disburse = $this->Disburses->get($id);
        if ($this->Disburses->delete($disburse)) {
            $this->Flash->success(__('The disburse has been deleted.'));
        } else {
            $this->Flash->error(__('The disburse could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
        return $this->redirect($this->referer());

    }
}
