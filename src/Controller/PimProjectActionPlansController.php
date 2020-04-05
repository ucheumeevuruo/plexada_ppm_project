<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimProjectActionPlans Controller
 *
 * @property \App\Model\Table\PimProjectActionPlansTable $PimProjectActionPlans
 *
 * @method \App\Model\Entity\PimProjectActionPlan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimProjectActionPlansController extends AppController
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
        $pimProjectActionPlans = $this->paginate($this->PimProjectActionPlans);

        $this->set(compact('pimProjectActionPlans'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Project Action Plan id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimProjectActionPlan = $this->PimProjectActionPlans->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimProjectActionPlan', $pimProjectActionPlan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimProjectActionPlan = $this->PimProjectActionPlans->newEntity();
        if ($this->request->is('post')) {
            $pimProjectActionPlan = $this->PimProjectActionPlans->patchEntity($pimProjectActionPlan, $this->request->getData());
            if ($this->PimProjectActionPlans->save($pimProjectActionPlan)) {
                $this->Flash->success(__('The pim project action plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim project action plan could not be saved. Please, try again.'));
        }
        $pims = $this->PimProjectActionPlans->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimProjectActionPlan', 'pims'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Project Action Plan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimProjectActionPlan = $this->PimProjectActionPlans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimProjectActionPlan = $this->PimProjectActionPlans->patchEntity($pimProjectActionPlan, $this->request->getData());
            if ($this->PimProjectActionPlans->save($pimProjectActionPlan)) {
                $this->Flash->success(__('The pim project action plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim project action plan could not be saved. Please, try again.'));
        }
        $pims = $this->PimProjectActionPlans->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimProjectActionPlan', 'pims'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Project Action Plan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimProjectActionPlan = $this->PimProjectActionPlans->get($id);
        if ($this->PimProjectActionPlans->delete($pimProjectActionPlan)) {
            $this->Flash->success(__('The pim project action plan has been deleted.'));
        } else {
            $this->Flash->error(__('The pim project action plan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
