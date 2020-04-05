<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimCategories Controller
 *
 * @property \App\Model\Table\PimCategoriesTable $PimCategories
 *
 * @method \App\Model\Entity\PimCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pimCategories = $this->paginate($this->PimCategories);

        $this->set(compact('pimCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimCategory = $this->PimCategories->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimCategory', $pimCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimCategory = $this->PimCategories->newEntity();
        if ($this->request->is('post')) {
            $pimCategory = $this->PimCategories->patchEntity($pimCategory, $this->request->getData());
            if ($this->PimCategories->save($pimCategory)) {
                $this->Flash->success(__('The pim category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim category could not be saved. Please, try again.'));
        }
        $this->set(compact('pimCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimCategory = $this->PimCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimCategory = $this->PimCategories->patchEntity($pimCategory, $this->request->getData());
            if ($this->PimCategories->save($pimCategory)) {
                $this->Flash->success(__('The pim category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim category could not be saved. Please, try again.'));
        }
        $this->set(compact('pimCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimCategory = $this->PimCategories->get($id);
        if ($this->PimCategories->delete($pimCategory)) {
            $this->Flash->success(__('The pim category has been deleted.'));
        } else {
            $this->Flash->error(__('The pim category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
