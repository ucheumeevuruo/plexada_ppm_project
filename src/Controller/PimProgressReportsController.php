<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimProgressReports Controller
 *
 * @property \App\Model\Table\PimProgressReportsTable $PimProgressReports
 *
 * @method \App\Model\Entity\PimProgressReport[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimProgressReportsController extends AppController
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
        $pimProgressReports = $this->paginate($this->PimProgressReports);

        $this->set(compact('pimProgressReports'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Progress Report id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimProgressReport = $this->PimProgressReports->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimProgressReport', $pimProgressReport);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimProgressReport = $this->PimProgressReports->newEntity();
        if ($this->request->is('post')) {
            $pimProgressReport = $this->PimProgressReports->patchEntity($pimProgressReport, $this->request->getData());
            if ($this->PimProgressReports->save($pimProgressReport)) {
                $this->Flash->success(__('The pim progress report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim progress report could not be saved. Please, try again.'));
        }
        $pims = $this->PimProgressReports->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimProgressReport', 'pims'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Progress Report id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimProgressReport = $this->PimProgressReports->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimProgressReport = $this->PimProgressReports->patchEntity($pimProgressReport, $this->request->getData());
            if ($this->PimProgressReports->save($pimProgressReport)) {
                $this->Flash->success(__('The pim progress report has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim progress report could not be saved. Please, try again.'));
        }
        $pims = $this->PimProgressReports->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimProgressReport', 'pims'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Progress Report id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimProgressReport = $this->PimProgressReports->get($id);
        if ($this->PimProgressReports->delete($pimProgressReport)) {
            $this->Flash->success(__('The pim progress report has been deleted.'));
        } else {
            $this->Flash->error(__('The pim progress report could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
