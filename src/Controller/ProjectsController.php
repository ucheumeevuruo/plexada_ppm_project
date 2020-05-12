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
        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'id' => $q
        ];


        $this->paginate = [
            'contain' => [
                'ProjectDetails.Statuses'
            ],
//            'maxLimit' => 3
            'finder' => [
                'byProjectName' => $customFinderOptions
            ]
        ];

        $projects = $this->paginate($this->Projects);

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
            'contain' => ['Pims', 'ProjectFundings', 'ProjectDetails', 'Activities', 'Annotations', 'Milestones', 'Objectives', 'Prices', 'RiskIssues', 'Sponsors', 'Pads'],
        ]);
        // debug($project);
        // die();
        $this->set('project', $project);
    }


    public function milestones($project_id = null)
    {
        $q = $this->request->getQuery('q');

        $milestones = $this->Projects->Milestones->find()
            ->contain(['Lov'])
            ->where(['project_id' => $project_id]);

        $milestones = $this->paginate($milestones);

        $this->set(compact('milestones', 'project_id'));
    }


    public function activities($project_id = null)
    {

        $activities = $this->Projects->Activities->find()
            ->contain(['Statuses', 'Priorities', 'Currencies'])
            ->where(['project_id' => $project_id]);

        $activities = $this->paginate($activities);

        $this->set(compact('activities', 'project_id'));
    }

    public function partners($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Sponsors', 'ProjectDetails'],
        ]);

        $this->set('project', $project);
    }

    public function riskIssues($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['RiskIssues', 'ProjectDetails'],
        ]);

        // debug($project);
        // die();
        $this->set('project', $project);
    }

    public function documents($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Pads', 'Pims', 'Documents'],
        ]);
        // debug($project);
        // die();

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