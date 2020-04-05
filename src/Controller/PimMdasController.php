<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimMdas Controller
 *
 * @property \App\Model\Table\PimMdasTable $PimMdas
 *
 * @method \App\Model\Entity\PimMda[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimMdasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pimMdas = $this->paginate($this->PimMdas);

        $this->set(compact('pimMdas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Mda id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimMda = $this->PimMdas->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimMda', $pimMda);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimMda = $this->PimMdas->newEntity();
        if ($this->request->is('post')) {
            $pimMda = $this->PimMdas->patchEntity($pimMda, $this->request->getData());
            if ($this->PimMdas->save($pimMda)) {
                $this->Flash->success(__('The pim mda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim mda could not be saved. Please, try again.'));
        }
        $this->set(compact('pimMda'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Mda id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimMda = $this->PimMdas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimMda = $this->PimMdas->patchEntity($pimMda, $this->request->getData());
            if ($this->PimMdas->save($pimMda)) {
                $this->Flash->success(__('The pim mda has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim mda could not be saved. Please, try again.'));
        }
        $this->set(compact('pimMda'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Mda id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimMda = $this->PimMdas->get($id);
        if ($this->PimMdas->delete($pimMda)) {
            $this->Flash->success(__('The pim mda has been deleted.'));
        } else {
            $this->Flash->error(__('The pim mda could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
