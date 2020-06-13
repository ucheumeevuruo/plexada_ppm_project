<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Approvals Controller
 *
 * @property \App\Model\Table\ApprovalsTable $Approvals
 *
 * @method \App\Model\Entity\Approval[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApprovalsController extends AppController
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
        $approvals = $this->paginate($this->Approvals);

        $this->set(compact('approvals'));
    }

    /**
     * View method
     *
     * @param string|null $id Approval id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $approval = $this->Approvals->get($id, [
            'contain' => ['Projects'],
        ]);

        $this->set('approval', $approval);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $approval = $this->Approvals->newEntity();
        if ($this->request->is('post')) {
            $approval = $this->Approvals->patchEntity($approval, $this->request->getData());
            if ($this->Approvals->save($approval)) {
                $this->Flash->success(__('The approval has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The approval could not be saved. Please, try again.'));
        }
        $projects = $this->Approvals->Projects->find('list', ['limit' => 200]);
        $this->set(compact('approval', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Approval id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $approval = $this->Approvals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $approval = $this->Approvals->patchEntity($approval, $this->request->getData());
            if ($this->Approvals->save($approval)) {
                $this->Flash->success(__('The approval has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The approval could not be saved. Please, try again.'));
        }
        $projects = $this->Approvals->Projects->find('list', ['limit' => 200]);
        $this->set(compact('approval', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Approval id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $approval = $this->Approvals->get($id);
        if ($this->Approvals->delete($approval)) {
            $this->Flash->success(__('The approval has been deleted.'));
        } else {
            $this->Flash->error(__('The approval could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Approval id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function projectApproval($id = null)
    {
        $approval = $this->Approvals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $approval = $this->Approvals->patchEntity($approval, $this->request->getData());
            if ($this->Approvals->save($approval)) {
                $this->Flash->success(__('The approval has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The approval could not be saved. Please, try again.'));
        }
        $projects = $this->Approvals->Projects->find('list', ['limit' => 200]);
        $this->set(compact('approval', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Approval id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function designApproval($id = null)
    {
        $approval = $this->Approvals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $approval = $this->Approvals->patchEntity($approval, $this->request->getData());
            if ($this->Approvals->save($approval)) {
                $this->Flash->success(__('The approval has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The approval could not be saved. Please, try again.'));
        }
        $projects = $this->Approvals->Projects->find('list', ['limit' => 200]);
        $this->set(compact('approval', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Approval id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function documentsApproval($id = null)
    {
        $approval = $this->Approvals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $approval = $this->Approvals->patchEntity($approval, $this->request->getData());
            if ($this->Approvals->save($approval)) {
                $this->Flash->success(__('The approval has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The approval could not be saved. Please, try again.'));
        }
        $projects = $this->Approvals->Projects->find('list', ['limit' => 200]);
        $this->set(compact('approval', 'projects'));
    }
}
