<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimWorkPlans Controller
 *
 * @property \App\Model\Table\PimWorkPlansTable $PimWorkPlans
 *
 * @method \App\Model\Entity\PimWorkPlan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimWorkPlansController extends AppController
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
        $pimWorkPlans = $this->paginate($this->PimWorkPlans);

        $this->set(compact('pimWorkPlans'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Work Plan id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimWorkPlan = $this->PimWorkPlans->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimWorkPlan', $pimWorkPlan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimWorkPlan = $this->PimWorkPlans->newEntity();
        if ($this->request->is('post')) {
            $pimWorkPlan = $this->PimWorkPlans->patchEntity($pimWorkPlan, $this->request->getData());
            if ($this->PimWorkPlans->save($pimWorkPlan)) {
                $this->Flash->success(__('The pim work plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim work plan could not be saved. Please, try again.'));
        }
        $pims = $this->PimWorkPlans->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimWorkPlan', 'pims'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Work Plan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimWorkPlan = $this->PimWorkPlans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimWorkPlan = $this->PimWorkPlans->patchEntity($pimWorkPlan, $this->request->getData());
            if ($this->PimWorkPlans->save($pimWorkPlan)) {
                $this->Flash->success(__('The pim work plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim work plan could not be saved. Please, try again.'));
        }
        $pims = $this->PimWorkPlans->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimWorkPlan', 'pims'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Work Plan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimWorkPlan = $this->PimWorkPlans->get($id);
        if ($this->PimWorkPlans->delete($pimWorkPlan)) {
            $this->Flash->success(__('The pim work plan has been deleted.'));
        } else {
            $this->Flash->error(__('The pim work plan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
