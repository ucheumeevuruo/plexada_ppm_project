<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Pims', 'ProjectFundings'],
        // ];
        $query = $this->Projects->find('all', ['contain' => ['ProjectDetails']])->select(['id', 'name', 'introduction', 'cost', 'percent' => 'ProjectDetails.completed_percent', 'waiting_on' => 'ProjectDetails.waiting_on_id']);
        $projects = $this->paginate($query);
        // $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Pims', 'ProjectFundings', 'ProjectDetails', 'Activities', 'Annotations', 'Milestones', 'Objectives', 'Prices', 'RiskIssues'],
        ]);

        $this->set('project', $project);
    }



    public function report($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Pims', 'ProjectFundings', 'ProjectDetails', 'Activities', 'Annotations', 'Milestones', 'Objectives', 'Prices', 'RiskIssues', 'Sponsors'],
        ]);

        $this->set('project', $project);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
            debug($project);
            die();
        }
        $pims = $this->Projects->Pims->find('list', ['limit' => 200]);
        $projectDetails = $this->Projects->ProjectDetails->find('list', ['limit' => 200]);
        $projectFundings = $this->Projects->ProjectFundings->find('list', ['limit' => 200]);
        $this->set(compact('project', 'pims', 'projectFundings', 'projectDetails'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $pims = $this->Projects->Pims->find('list', ['limit' => 200]);
        $projectFundings = $this->Projects->ProjectFundings->find('list', ['limit' => 200]);
        $this->set(compact('project', 'pims', 'projectFundings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}