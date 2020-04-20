<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectFundings Controller
 *
 * @property \App\Model\Table\ProjectFundingsTable $ProjectFundings
 *
 * @method \App\Model\Entity\ProjectFunding[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectFundingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Milestones'],
        ];
        $projectFundings = $this->paginate($this->ProjectFundings);

        $this->set(compact('projectFundings'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Funding id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectFunding = $this->ProjectFundings->get($id, [
            'contain' => ['Milestones', 'ProjectDefinitions'],
        ]);

        $this->set('projectFunding', $projectFunding);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectFunding = $this->ProjectFundings->newEntity();
        if ($this->request->is('post')) {
            $projectFunding = $this->ProjectFundings->patchEntity($projectFunding, $this->request->getData());
            if ($this->ProjectFundings->save($projectFunding)) {
                $this->Flash->success(__('The project funding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project funding could not be saved. Please, try again.'));
        }
        $milestones = $this->ProjectFundings->Milestones->find('list', ['limit' => 200]);
        $this->set(compact('projectFunding', 'milestones'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Funding id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectFunding = $this->ProjectFundings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectFunding = $this->ProjectFundings->patchEntity($projectFunding, $this->request->getData());
            if ($this->ProjectFundings->save($projectFunding)) {
                $this->Flash->success(__('The project funding has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project funding could not be saved. Please, try again.'));
        }
        $milestones = $this->ProjectFundings->Milestones->find('list', ['limit' => 200]);
        $this->set(compact('projectFunding', 'milestones'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Funding id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectFunding = $this->ProjectFundings->get($id);
        if ($this->ProjectFundings->delete($projectFunding)) {
            $this->Flash->success(__('The project funding has been deleted.'));
        } else {
            $this->Flash->error(__('The project funding could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
