<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Disbursements Controller
 *
 *
 * @method \App\Model\Entity\Disbursement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisbursementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $disbursements = $this->paginate($this->Disbursements);

        $this->set(compact('disbursements'));
    }

    /**
     * View method
     *
     * @param string|null $id Disbursement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disbursement = $this->Disbursements->get($id, [
            'contain' => [],
        ]);

        $this->set('disbursement', $disbursement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {

        $disbursement = $this->Disbursements->newEntity();
        if ($this->request->is('post')) {
            $disbursement = $this->Disbursements->patchEntity($disbursement, $this->Disbursements->identify($this->request->getData()));
            // $activity = $this->Activities->patchEntity($activity, $this->Activities->identify($this->request->getData()));
            if ($this->Disbursements->save($disbursement)) {
                $this->Flash->success(__('The disbursement has been saved.'));

                return $this->redirect($this->referer());
            }
            // debug($disbursement);
            // die();
            $this->Flash->error(__('The disbursement could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }
        // $cummulative = $this->Disbursements->
        $query = $this->Disbursements->find('all');
        $query = $query->where(['milestone_id'=>$id]);
        $query = $query->select(['cost' => $query->func()->SUM('cost')])->first();
        $cummulative = $query['cost'] ? $query['cost']: 0;

        $this->loadModel('Milestones');
        // $milestones = $this->Milestones->find('list', ['limit' => 200, 'conditions' => ['id' => $id]]);
        $projects_id = $this->Milestones->find('all', ['limit' => 200, 'conditions' => ['id' => $id]])->first();
        $projects = $projects_id->project_id;
        $milestones = $id;
        // debug($projects);
        // die();

        $this->set(compact('disbursement','milestones','projects','cummulative'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disbursement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disbursement = $this->Disbursements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disbursement = $this->Disbursements->patchEntity($disbursement, $this->request->getData());
            if ($this->Disbursements->save($disbursement)) {
                $this->Flash->success(__('The disbursement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disbursement could not be saved. Please, try again.'));
        }
        $this->set(compact('disbursement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disbursement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disbursement = $this->Disbursements->get($id);
        if ($this->Disbursements->delete($disbursement)) {
            $this->Flash->success(__('The disbursement has been deleted.'));
        } else {
            $this->Flash->error(__('The disbursement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
