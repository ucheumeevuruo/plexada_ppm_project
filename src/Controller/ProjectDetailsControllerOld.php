<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectDetailsOld Controller
 *
 * @property \App\Model\Table\ProjectDetailsTableOld $ProjectDetailsOld
 *
 * @method \App\Model\Entity\ProjectDetailOld[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectDetailsControllerOld extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendors', 'Personel', 'Sponsors', 'Lov', 'Prices', 'Activities'],
        ];
        $projectDetails = $this->paginate($this->ProjectDetails);
        $this->set(compact('projectDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Detail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectDetail = $this->ProjectDetails->get($id, [
            'contain' => ['Vendors', 'Personel', 'Sponsors', 'Activities', 'Activities.Lov', 'Activities.Personel'],
        ]);
        $this->set('projectDetail', $projectDetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectDetail = $this->ProjectDetails->newEntity();
        if ($this->request->is('post')) {
            $projectDetail = $this->ProjectDetails->patchEntity($projectDetail, $this->request->getData());
            var_dump($this->request->getData());
            if ($this->ProjectDetails->save($projectDetail)) {
                $this->Flash->success(__('The project detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));
        }
        $vendors = $this->ProjectDetails->Vendors->find('list', ['limit' => 200]);
        $managers = $this->ProjectDetails->Personel->find('list', ['limit' => 200]);
        $sponsors = $this->ProjectDetails->Sponsors->find('list', ['limit' => 200]);
        $lovs = $this->ProjectDetails->Lov->find('list', [
            'conditions' => ['Lov.lov_type' => 'project_status', 'Lov.lov_value' => 'Open'],
            'limit' => 200
        ]);
//        $systemUsers = $this->ProjectDetailsOld->SystemUsers->find('list', ['limit' => 200]);
        $this->set(compact('projectDetail', 'vendors', 'lovs', 'managers', 'sponsors', 'systemUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectDetail = $this->ProjectDetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectDetail = $this->ProjectDetails->patchEntity($projectDetail, $this->request->getData());
            if ($this->ProjectDetails->save($projectDetail)) {
                $this->Flash->success(__('The project detail has been saved.'));

                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));
        }
        $vendors = $this->ProjectDetails->Vendors->find('list', ['limit' => 200]);
        $managers = $this->ProjectDetails->Personel->find('list', ['limit' => 200]);
        $sponsors = $this->ProjectDetails->Sponsors->find('list', ['limit' => 200]);
        $this->set(compact('projectDetail', 'vendors', 'managers', 'sponsors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectDetail = $this->ProjectDetails->get($id);
        if ($this->ProjectDetails->delete($projectDetail)) {
            $this->Flash->success(__('The project detail has been deleted.'));
        } else {
            $this->Flash->error(__('The project detail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
