<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProjectAppraisals Controller
 *
 * @property \App\Model\Table\ProjectAppraisalsTable $ProjectAppraisals
 *
 * @method \App\Model\Entity\ProjectAppraisal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectAppraisalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendors', 'Staff', 'Sponsors', 'Lov', 'SubStatuses', 'Users', 'Annotations'],
        ];
        $projectAppraisals = $this->paginate($this->ProjectAppraisals);

        $this->set(compact('projectAppraisals'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Appraisal id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectAppraisal = $this->ProjectAppraisals->get($id, [
            'contain' => ['Vendors', 'Staff', 'Sponsors', 'Lov', 'SubStatuses', 'Users', 'Annotations', 'ProjectDefinitions'],
        ]);

        $this->set('projectAppraisal', $projectAppraisal);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectAppraisal = $this->ProjectAppraisals->newEntity();
        if ($this->request->is('post')) {
            $projectAppraisal = $this->ProjectAppraisals->patchEntity($projectAppraisal, $this->request->getData());
            if ($this->ProjectAppraisals->save($projectAppraisal)) {
                $this->Flash->success(__('The project appraisal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project appraisal could not be saved. Please, try again.'));
        }
        $vendors = $this->ProjectAppraisals->Vendors->find('list', ['limit' => 200]);
        $staff = $this->ProjectAppraisals->Staff->find('list', ['limit' => 200]);
        $sponsors = $this->ProjectAppraisals->Sponsors->find('list', ['limit' => 200]);
        $lov = $this->ProjectAppraisals->Lov->find('list', ['limit' => 200]);
        $subStatuses = $this->ProjectAppraisals->SubStatuses->find('list', ['limit' => 200]);
        $users = $this->ProjectAppraisals->Users->find('list', ['limit' => 200]);
        $annotations = $this->ProjectAppraisals->Annotations->find('list', ['limit' => 200]);
        $this->set(compact('projectAppraisal', 'vendors', 'staff', 'sponsors', 'lov', 'subStatuses', 'users', 'annotations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Appraisal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectAppraisal = $this->ProjectAppraisals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectAppraisal = $this->ProjectAppraisals->patchEntity($projectAppraisal, $this->request->getData());
            if ($this->ProjectAppraisals->save($projectAppraisal)) {
                $this->Flash->success(__('The project appraisal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project appraisal could not be saved. Please, try again.'));
        }
        $vendors = $this->ProjectAppraisals->Vendors->find('list', ['limit' => 200]);
        $staff = $this->ProjectAppraisals->Staff->find('list', ['limit' => 200]);
        $sponsors = $this->ProjectAppraisals->Sponsors->find('list', ['limit' => 200]);
        $lov = $this->ProjectAppraisals->Lov->find('list', ['limit' => 200]);
        $subStatuses = $this->ProjectAppraisals->SubStatuses->find('list', ['limit' => 200]);
        $users = $this->ProjectAppraisals->Users->find('list', ['limit' => 200]);
        $annotations = $this->ProjectAppraisals->Annotations->find('list', ['limit' => 200]);
        $this->set(compact('projectAppraisal', 'vendors', 'staff', 'sponsors', 'lov', 'subStatuses', 'users', 'annotations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Appraisal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectAppraisal = $this->ProjectAppraisals->get($id);
        if ($this->ProjectAppraisals->delete($projectAppraisal)) {
            $this->Flash->success(__('The project appraisal has been deleted.'));
        } else {
            $this->Flash->error(__('The project appraisal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
