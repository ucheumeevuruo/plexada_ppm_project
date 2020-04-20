<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectObjectives Controller
 *
 * @property \App\Model\Table\ProjectObjectivesTable $ProjectObjectives
 *
 * @method \App\Model\Entity\ProjectObjective[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectObjectivesController extends AppController
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
        $projectObjectives = $this->paginate($this->ProjectObjectives);

        $this->set(compact('projectObjectives'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Objective id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectObjective = $this->ProjectObjectives->get($id, [
            'contain' => ['Projects'],
        ]);

        $this->set('projectObjective', $projectObjective);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectObjective = $this->ProjectObjectives->newEntity();
        if ($this->request->is('post')) {
            $projectObjective = $this->ProjectObjectives->patchEntity($projectObjective, $this->request->getData());
            if ($this->ProjectObjectives->save($projectObjective)) {
                $this->Flash->success(__('The project objective has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project objective could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectObjectives->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectObjective', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Objective id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectObjective = $this->ProjectObjectives->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectObjective = $this->ProjectObjectives->patchEntity($projectObjective, $this->request->getData());
            if ($this->ProjectObjectives->save($projectObjective)) {
                $this->Flash->success(__('The project objective has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project objective could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectObjectives->Projects->find('list', ['limit' => 200]);
        $this->set(compact('projectObjective', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Objective id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectObjective = $this->ProjectObjectives->get($id);
        if ($this->ProjectObjectives->delete($projectObjective)) {
            $this->Flash->success(__('The project objective has been deleted.'));
        } else {
            $this->Flash->error(__('The project objective could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
