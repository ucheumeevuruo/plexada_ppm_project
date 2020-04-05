<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PimProjectComponents Controller
 *
 * @property \App\Model\Table\PimProjectComponentsTable $PimProjectComponents
 *
 * @method \App\Model\Entity\PimProjectComponent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PimProjectComponentsController extends AppController
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
        $pimProjectComponents = $this->paginate($this->PimProjectComponents);

        $this->set(compact('pimProjectComponents'));
    }

    /**
     * View method
     *
     * @param string|null $id Pim Project Component id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pimProjectComponent = $this->PimProjectComponents->get($id, [
            'contain' => ['Pims'],
        ]);

        $this->set('pimProjectComponent', $pimProjectComponent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pimProjectComponent = $this->PimProjectComponents->newEntity();
        if ($this->request->is('post')) {
            $pimProjectComponent = $this->PimProjectComponents->patchEntity($pimProjectComponent, $this->request->getData());
            if ($this->PimProjectComponents->save($pimProjectComponent)) {
                $this->Flash->success(__('The pim project component has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim project component could not be saved. Please, try again.'));
        }
        $pims = $this->PimProjectComponents->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimProjectComponent', 'pims'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pim Project Component id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pimProjectComponent = $this->PimProjectComponents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pimProjectComponent = $this->PimProjectComponents->patchEntity($pimProjectComponent, $this->request->getData());
            if ($this->PimProjectComponents->save($pimProjectComponent)) {
                $this->Flash->success(__('The pim project component has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pim project component could not be saved. Please, try again.'));
        }
        $pims = $this->PimProjectComponents->Pims->find('list', ['limit' => 200]);
        $this->set(compact('pimProjectComponent', 'pims'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pim Project Component id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pimProjectComponent = $this->PimProjectComponents->get($id);
        if ($this->PimProjectComponents->delete($pimProjectComponent)) {
            $this->Flash->success(__('The pim project component has been deleted.'));
        } else {
            $this->Flash->error(__('The pim project component could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
