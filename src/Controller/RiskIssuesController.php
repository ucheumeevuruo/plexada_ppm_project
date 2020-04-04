<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RiskIssues Controller
 *
 * @property \App\Model\Table\RiskIssuesTable $RiskIssues
 *
 * @method \App\Model\Entity\RiskIssue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RiskIssuesController extends AppController
{
    /**
     * Index method
     *
     * @param null $id
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProjectDetails', 'Staff', 'Lov'],
        ];
        $riskIssues = $this->paginate($this->RiskIssues);

        $this->set(compact('riskIssues'));
    }

    /**
     * View method
     *
     * @param string|null $id Risk Issue id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $riskIssue = $this->RiskIssues->get($id, [
            'contain' => ['ProjectDetails', 'Staff', 'Lov'],
        ]);

        $this->set('riskIssue', $riskIssue);
    }

    /**
     * Add method
     *
     * @param null $id
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $riskIssue = $this->RiskIssues->newEntity();
        if ($this->request->is('post')) {
            $riskIssue = $this->RiskIssues->patchEntity($riskIssue, $this->RiskIssues->identify($this->request->getData()));
            if ($this->RiskIssues->save($riskIssue)) {
                $this->Flash->success(__('The risk issue has been saved.'));

//                return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The risk issue could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $projectDetails = $this->RiskIssues->ProjectDetails->find('list', ['limit' => 200]);
        $staff = $this->RiskIssues->Staff->find('list', ['limit' => 200]);
//        $lov = $this->RiskIssues->Lov->find('list', ['limit' => 200]);
        $lov = $this->RiskIssues->Lov->find('list', [
            'conditions' => ['Lov.lov_type' => 'project_status', 'Lov.lov_value' => 'Open'],
            'limit' => 200
        ]);
        $this->set(compact('riskIssue', 'projectDetails', 'staff', 'lov', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Risk Issue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $riskIssue = $this->RiskIssues->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $riskIssue = $this->RiskIssues->patchEntity($riskIssue, $this->RiskIssues->identify($this->request->getData()));
            if ($this->RiskIssues->save($riskIssue)) {
                $this->Flash->success(__('The risk issue has been saved.'));

//                return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The risk issue could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $projectDetails = $this->RiskIssues->ProjectDetails->find('list', ['limit' => 200]);
        $staff = $this->RiskIssues->Staff->find('list', ['limit' => 200]);
        $lov = $this->RiskIssues->Lov->find('list', ['limit' => 200]);
        $this->set(compact('riskIssue', 'projectDetails', 'staff', 'lov'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Risk Issue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $riskIssue = $this->RiskIssues->get($id);
        if ($this->RiskIssues->delete($riskIssue)) {
            $this->Flash->success(__('The risk issue has been deleted.'));
        } else {
            $this->Flash->error(__('The risk issue could not be deleted. Please, try again.'));
        }

//        return $this->redirect(['action' => 'index']);
        return $this->redirect($this->referer());
    }
}
