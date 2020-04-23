<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectComponents Controller
 *
 * @property \App\Model\Table\ProjectComponentsTable $ProjectComponents
 *
 * @method \App\Model\Entity\ProjectComponent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectComponentsController extends AppController
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
        $projectComponents = $this->paginate($this->ProjectComponents);

        $this->set(compact('projectComponents'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Component id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectComponent = $this->ProjectComponents->get($id, [
            'contain' => ['Projects'],
        ]);

        $this->set('projectComponent', $projectComponent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectComponent = $this->ProjectComponents->newEntity();
        if ($this->request->is('post')) {
            $projectComponent = $this->ProjectComponents->patchEntity($projectComponent, $this->request->getData());
            if ($this->ProjectComponents->save($projectComponent)) {
                $this->Flash->success(__('The project component has been saved.'));

                return $this->redirect($this->referer());
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project component could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectComponents->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectComponent', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Component id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectComponent = $this->ProjectComponents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectComponent = $this->ProjectComponents->patchEntity($projectComponent, $this->request->getData());
            if ($this->ProjectComponents->save($projectComponent)) {
                $this->Flash->success(__('The project component has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project component could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectComponents->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectComponent', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Component id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectComponent = $this->ProjectComponents->get($id);
        if ($this->ProjectComponents->delete($projectComponent)) {
            $this->Flash->success(__('The project component has been deleted.'));
        } else {
            $this->Flash->error(__('The project component could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
