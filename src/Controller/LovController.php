<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lov Controller
 *
 * @property \App\Model\Table\LovTable $Lov
 *
 * @method \App\Model\Entity\Lov[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LovController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SystemUsers'],
        ];
        $lov = $this->paginate($this->Lov);

        $this->set(compact('lov'));
    }

    /**
     * View method
     *
     * @param string|null $id Lov id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lov = $this->Lov->get($id, [
            'contain' => ['SystemUsers'],
        ]);

        $this->set('lov', $lov);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lov = $this->Lov->newEntity();
        if ($this->request->is('post')) {
            $lov = $this->Lov->patchEntity($lov, $this->request->getData());
            if ($this->Lov->save($lov)) {
                $this->Flash->success(__('The lov has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lov could not be saved. Please, try again.'));
        }
        $systemUsers = $this->Lov->SystemUsers->find('list', ['limit' => 200]);
        $this->set(compact('lov', 'systemUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lov id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lov = $this->Lov->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lov = $this->Lov->patchEntity($lov, $this->request->getData());
            if ($this->Lov->save($lov)) {
                $this->Flash->success(__('The lov has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lov could not be saved. Please, try again.'));
        }
        $systemUsers = $this->Lov->SystemUsers->find('list', ['limit' => 200]);
        $this->set(compact('lov', 'systemUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lov id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lov = $this->Lov->get($id);
        if ($this->Lov->delete($lov)) {
            $this->Flash->success(__('The lov has been deleted.'));
        } else {
            $this->Flash->error(__('The lov could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
