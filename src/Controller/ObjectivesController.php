<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Objectives Controller
 *
 * @property \App\Model\Table\ObjectivesTable $Objectives
 *
 * @method \App\Model\Entity\Objective[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ObjectivesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects'],
        ];
        $objectives = $this->paginate($this->Objectives);

        $this->set(compact('objectives'));
    }

    /**
     * View method
     *
     * @param string|null $id Objective id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $objective = $this->Objectives->get($id, [
            'contain' => ['Projects'],
        ]);

        $this->set('objective', $objective);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $this->loadModel('Projects');
        $project_info = $this->Projects->get($id);

        $objective = $this->Objectives->newEntity();
        if ($this->request->is('post')) {
            // $objective = $this->Objectives->patchEntity($objective, $this->Objectives->identify($this->request->getData()));

            $objective = $this->Objectives->patchEntity($objective, $this->request->getData());

            if ($this->Objectives->save($objective)) {
                $this->Flash->success(__('The objective has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The objective could not be saved. Please, try again.'));
            // debug($objective);
            // die();
            return $this->redirect($this->referer());
        }
        $projects = $this->Objectives->Projects->find('list', ['limit' => 200]) ;
        $this->set(compact('objective', 'projects', 'project_info'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Objective id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $objective = $this->Objectives->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $objective = $this->Objectives->patchEntity($objective, $this->request->getData());
            if ($this->Objectives->save($objective)) {
                $this->Flash->success(__('The objective has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The objective could not be saved. Please, try again.'));
        }
        $projects = $this->Objectives->Projects->find('list', ['limit' => 200]);
        $this->set(compact('objective', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Objective id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $objective = $this->Objectives->get($id);
        if ($this->Objectives->delete($objective)) {
            $this->Flash->success(__('The objective has been deleted.'));
        } else {
            $this->Flash->error(__('The objective could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
