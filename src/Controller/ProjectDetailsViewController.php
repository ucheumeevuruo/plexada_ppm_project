<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectDetailsView Controller
 *
 * @property \App\Model\Table\ProjectDetailsViewTable $ProjectDetailsView
 *
 * @method \App\Model\Entity\ProjectDetailsView[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectDetailsViewController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Lov'],
        ];
        $projectDetailsView = $this->paginate($this->ProjectDetailsView);

        $this->set(compact('projectDetailsView'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Details View id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectDetailsView = $this->ProjectDetailsView->get($id, [
            'contain' => ['Lov'],
        ]);

        $this->set('projectDetailsView', $projectDetailsView);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectDetailsView = $this->ProjectDetailsView->newEntity();
        if ($this->request->is('post')) {
            $projectDetailsView = $this->ProjectDetailsView->patchEntity($projectDetailsView, $this->request->getData());
            if ($this->ProjectDetailsView->save($projectDetailsView)) {
                $this->Flash->success(__('The project details view has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project details view could not be saved. Please, try again.'));
        }
        $statuses = $this->ProjectDetailsView->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('projectDetailsView', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Details View id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectDetailsView = $this->ProjectDetailsView->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectDetailsView = $this->ProjectDetailsView->patchEntity($projectDetailsView, $this->request->getData());
            if ($this->ProjectDetailsView->save($projectDetailsView)) {
                $this->Flash->success(__('The project details view has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project details view could not be saved. Please, try again.'));
        }
        $statuses = $this->ProjectDetailsView->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('projectDetailsView', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Details View id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectDetailsView = $this->ProjectDetailsView->get($id);
        if ($this->ProjectDetailsView->delete($projectDetailsView)) {
            $this->Flash->success(__('The project details view has been deleted.'));
        } else {
            $this->Flash->error(__('The project details view could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
