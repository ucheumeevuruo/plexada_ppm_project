<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimTotalExpenditures Controller
 *
 * @property \App\Model\Table\PimTotalExpendituresTable $PimTotalExpenditures
 *
 * @method \App\Model\Entity\PimTotalExpenditure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimTotalExpendituresController extends AppController
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
        $pimTotalExpenditures = $this->paginate($this->PimTotalExpenditures);

        $this->set(compact('pimTotalExpenditures'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Total Expenditure id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimTotalExpenditure = $this->PimTotalExpenditures->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimTotalExpenditure', $pimTotalExpenditure);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimTotalExpenditure = $this->PimTotalExpenditures->newEntity();
        if ($this->request->is('post')) {
            $pimTotalExpenditure = $this->PimTotalExpenditures->patchEntity($pimTotalExpenditure, $this->request->getData());
            if ($this->PimTotalExpenditures->save($pimTotalExpenditure)) {
                $this->Flash->success(__('The pim total expenditure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim total expenditure could not be saved. Please, try again.'));
        }
        $pims = $this->PimTotalExpenditures->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimTotalExpenditure', 'pims'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Total Expenditure id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimTotalExpenditure = $this->PimTotalExpenditures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimTotalExpenditure = $this->PimTotalExpenditures->patchEntity($pimTotalExpenditure, $this->request->getData());
            if ($this->PimTotalExpenditures->save($pimTotalExpenditure)) {
                $this->Flash->success(__('The pim total expenditure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim total expenditure could not be saved. Please, try again.'));
        }
        $pims = $this->PimTotalExpenditures->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimTotalExpenditure', 'pims'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Total Expenditure id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimTotalExpenditure = $this->PimTotalExpenditures->get($id);
        if ($this->PimTotalExpenditures->delete($pimTotalExpenditure)) {
            $this->Flash->success(__('The pim total expenditure has been deleted.'));
        } else {
            $this->Flash->error(__('The pim total expenditure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
