<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectMilestones Controller
 *
 * @property \App\Model\Table\ProjectMilestonesTable $ProjectMilestones
 *
 * @method \App\Model\Entity\ProjectMilestone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectMilestonesController extends AppController
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
        $projectMilestones = $this->paginate($this->ProjectMilestones);

        $this->set(compact('projectMilestones'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Milestone id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectMilestone = $this->ProjectMilestones->get($id, [
            'contain' => ['Projects'],
        ]);

        $this->set('projectMilestone', $projectMilestone);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectMilestone = $this->ProjectMilestones->newEntity();
        if ($this->request->is('post')) {
            $projectMilestone = $this->ProjectMilestones->patchEntity($projectMilestone, $this->request->getData());
            if ($this->ProjectMilestones->save($projectMilestone)) {
                $this->Flash->success(__('The project milestone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project milestone could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectMilestones->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectMilestone', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Milestone id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectMilestone = $this->ProjectMilestones->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectMilestone = $this->ProjectMilestones->patchEntity($projectMilestone, $this->request->getData());
            if ($this->ProjectMilestones->save($projectMilestone)) {
                $this->Flash->success(__('The project milestone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project milestone could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectMilestones->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectMilestone', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Milestone id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectMilestone = $this->ProjectMilestones->get($id);
        if ($this->ProjectMilestones->delete($projectMilestone)) {
            $this->Flash->success(__('The project milestone has been deleted.'));
        } else {
            $this->Flash->error(__('The project milestone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
