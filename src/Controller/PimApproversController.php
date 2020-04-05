<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimApprovers Controller
 *
 * @property \App\Model\Table\PimApproversTable $PimApprovers
 *
 * @method \App\Model\Entity\PimApprover[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimApproversController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pimApprovers = $this->paginate($this->PimApprovers);

        $this->set(compact('pimApprovers'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Approver id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimApprover = $this->PimApprovers->get($id, [
            'contain' => [],
        ]);

        $this->set('pimApprover', $pimApprover);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimApprover = $this->PimApprovers->newEntity();
        if ($this->request->is('post')) {
            $pimApprover = $this->PimApprovers->patchEntity($pimApprover, $this->request->getData());
            if ($this->PimApprovers->save($pimApprover)) {
                $this->Flash->success(__('The pim approver has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim approver could not be saved. Please, try again.'));
        }
        $this->set(compact('pimApprover'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Approver id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimApprover = $this->PimApprovers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimApprover = $this->PimApprovers->patchEntity($pimApprover, $this->request->getData());
            if ($this->PimApprovers->save($pimApprover)) {
                $this->Flash->success(__('The pim approver has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim approver could not be saved. Please, try again.'));
        }
        $this->set(compact('pimApprover'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Approver id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimApprover = $this->PimApprovers->get($id);
        if ($this->PimApprovers->delete($pimApprover)) {
            $this->Flash->success(__('The pim approver has been deleted.'));
        } else {
            $this->Flash->error(__('The pim approver could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
