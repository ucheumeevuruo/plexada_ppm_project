<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pims Controller
 *
 * @property \App\Model\Table\PimsTable $Pims
 *
 * @method \App\Model\Entity\Pim[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PimApprovals', 'PimCategories', 'PimMdas'],
        ];
        $pims = $this->paginate($this->Pims);

        $this->set(compact('pims'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pim = $this->Pims->get($id, [
            'contain' => ['PimApprovals', 'PimCategories', 'PimMdas', 'PimOversightStructures', 'PimProgressReports', 'PimProjectActionPlans', 'PimProjectComponents', 'PimTasks', 'PimTotalExpenditures', 'PimWorkPlans'],
        ]);

        $this->set('pim', $pim);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pim = $this->Pims->newEntity();
        if ($this->request->is('post')) {
            $pim = $this->Pims->patchEntity($pim, $this->request->getData());
            if ($this->Pims->save($pim)) {
                $this->Flash->success(__('The pim has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim could not be saved. Please, try again.'));
        }
        $pimApprovals = $this->Pims->PimApprovals->find('list', ['limit' => 200]);
        $pimCategories = $this->Pims->PimCategories->find('list', ['limit' => 200]);
        $pimMdas = $this->Pims->PimMdas->find('list', ['limit' => 200]);
        $this->set(compact('pim', 'pimApprovals', 'pimCategories', 'pimMdas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pim = $this->Pims->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pim = $this->Pims->patchEntity($pim, $this->request->getData());
            if ($this->Pims->save($pim)) {
                $this->Flash->success(__('The pim has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim could not be saved. Please, try again.'));
        }
        $pimApprovals = $this->Pims->PimApprovals->find('list', ['limit' => 200]);
        $pimCategories = $this->Pims->PimCategories->find('list', ['limit' => 200]);
        $pimMdas = $this->Pims->PimMdas->find('list', ['limit' => 200]);
        $this->set(compact('pim', 'pimApprovals', 'pimCategories', 'pimMdas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pim = $this->Pims->get($id);
        if ($this->Pims->delete($pim)) {
            $this->Flash->success(__('The pim has been deleted.'));
        } else {
            $this->Flash->error(__('The pim could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
