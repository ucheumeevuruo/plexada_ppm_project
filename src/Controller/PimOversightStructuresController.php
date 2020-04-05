<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimOversightStructures Controller
 *
 * @property \App\Model\Table\PimOversightStructuresTable $PimOversightStructures
 *
 * @method \App\Model\Entity\PimOversightStructure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimOversightStructuresController extends AppController
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
        $pimOversightStructures = $this->paginate($this->PimOversightStructures);

        $this->set(compact('pimOversightStructures'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Oversight Structure id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimOversightStructure = $this->PimOversightStructures->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimOversightStructure', $pimOversightStructure);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimOversightStructure = $this->PimOversightStructures->newEntity();
        if ($this->request->is('post')) {
            $pimOversightStructure = $this->PimOversightStructures->patchEntity($pimOversightStructure, $this->request->getData());
            if ($this->PimOversightStructures->save($pimOversightStructure)) {
                $this->Flash->success(__('The pim oversight structure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim oversight structure could not be saved. Please, try again.'));
        }
        $pims = $this->PimOversightStructures->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimOversightStructure', 'pims'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Oversight Structure id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimOversightStructure = $this->PimOversightStructures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimOversightStructure = $this->PimOversightStructures->patchEntity($pimOversightStructure, $this->request->getData());
            if ($this->PimOversightStructures->save($pimOversightStructure)) {
                $this->Flash->success(__('The pim oversight structure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim oversight structure could not be saved. Please, try again.'));
        }
        $pims = $this->PimOversightStructures->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimOversightStructure', 'pims'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Oversight Structure id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimOversightStructure = $this->PimOversightStructures->get($id);
        if ($this->PimOversightStructures->delete($pimOversightStructure)) {
            $this->Flash->success(__('The pim oversight structure has been deleted.'));
        } else {
            $this->Flash->error(__('The pim oversight structure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
