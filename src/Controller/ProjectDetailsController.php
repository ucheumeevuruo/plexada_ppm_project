<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Excel\Handlers\ProjectUploadHandler;

/**
 * ProjectDetails Controller
 *
 * @property \App\Model\Table\ProjectDetailsTable $ProjectDetails
 *
 * @method \App\Model\Entity\ProjectDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vendors', 'Staff', 'Sponsors', 'Lov', 'Users', 'Prices', 'Annotations'],

        ];
        $projectDetails = $this->paginate($this->ProjectDetails);

        $this->set(compact('projectDetails'));

        $this->loadModel('Tasks');
        $tasks = $this->Tasks->find('all');
        $this->set('tasks', $tasks);


        $this->loadModel('Activities');
        $activities = $this->Activities->find('all');
        $this->set('activities', $activities);
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
            'contain' => ['Tasks', 'Vendors', 'Staff', 'Personnel', 'Sponsors', 'Activities.Priorities', 'Lov', 'Activities.Statuses', 'Users', 'Activities', 'Activities.Staff', 'SubStatuses', 'Priorities'],

        ]);

        $this->set('projectDetail', $projectDetail);
        $this->loadModel('Tasks');
        $tasks = $this->Tasks->find('all');

        $this->set('tasks', $tasks);
    }

    public function activities($id = null)
    {
        $projectDetail = $this->ProjectDetails->get($id, [
            'contain' => ['Activities', 'Activities.Priorities', 'Lov', 'Activities.Statuses']
        ]);

        $this->set('projectDetail', $projectDetail);
    }

    public function milestones($id = null)
    {
        $projectDetail = $this->ProjectDetails->get($id, [
            // 'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'Milestones', 'Milestones.Lov', 'Milestones.Triggers', 'Priorities', 'Prices', 'Prices.Currencies'],
            'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'Milestones', 'Milestones.Lov', 'Milestones.Triggers', 'Priorities', 'Prices'],
        ]);

        $this->set('projectDetail', $projectDetail);
    }

    public function riskIssues($id = null)
    {
        $projectDetail = $this->ProjectDetails->get($id, [
            // 'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'RiskIssues', 'RiskIssues.Lov', 'RiskIssues.Impact', 'RiskIssues.Staff', 'Priorities', 'Prices', 'Prices.Currencies'],
            'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'RiskIssues', 'RiskIssues.Lov', 'RiskIssues.Impact', 'RiskIssues.Staff', 'Priorities', 'Prices'],
        ]);

        $this->set('projectDetail', $projectDetail);
    }

    // public function evaluation($id = null)
    // {
    //     $projectDetail = $this->ProjectDetails->get($id, [
    //         // 'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'RiskIssues', 'RiskIssues.Lov', 'RiskIssues.Impact', 'RiskIssues.Staff', 'Priorities', 'Prices', 'Prices.Currencies'],
    //         'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'RiskIssues', 'RiskIssues.Lov', 'RiskIssues.Impact', 'RiskIssues.Staff', 'Priorities', 'Prices'],
    //     ]);

    //     $this->set('projectDetail', $projectDetail);
    // }

    public function evaluation()
    {
        $this->paginate = [
            'contain' => ['Vendors', 'Staff', 'Sponsors', 'Lov', 'Users', 'Prices', 'SubStatuses', 'Priorities', 'Annotations', 'Tasks', 'Projects','Environmental factors', 'Fundings', 'Approvals', 'Risks'],


        ];

        $projectDetails = $this->paginate($this->ProjectDetails);
        $this->set(compact('projectDetails'));
    }

    public function summary()
    {
        $this->paginate = [
            'contain' => ['Vendors', 'Staff', 'Sponsors', 'Lov', 'Users', 'Prices', 'SubStatuses', 'Priorities', 'Annotations', 'Tasks'],

        ];

        $projectDetails = $this->paginate($this->ProjectDetails);
        $this->set(compact('projectDetails'));
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
            if ($this->ProjectDetails->save($projectDetail)) {
                $this->Flash->success(__('The project detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'index']);
        }

        $vendors = $this->ProjectDetails->Vendors->find('list', ['limit' => 200]);
        $staff = $this->ProjectDetails->Staff->find('list', ['limit' => 200]);
        $sponsors = $this->ProjectDetails->Sponsors->find('list', ['limit' => 200]);
        // $lov = $this->ProjectDetails->Lov->find('list', ['limit' => 200]);
        $lov = $this->ProjectDetails->Lov->find('list', [
            'conditions' => ['Lov.lov_type' => 'project_status', 'Lov.lov_value' => 'Open'],
            'limit' => 200
        ]);
        $priority = $this->ProjectDetails->Lov->find('list', [
            'conditions' => ['Lov.lov_type' => 'priority'],
            'limit' => 200
        ]);
        $subStatus = $this->ProjectDetails->Lov->find('list', [
            'conditions' => ['Lov.lov_type' => 'project_sub_status'],
            'limit' => 200
        ]);
        $authUser = $this->Auth->User();
        $users = $this->ProjectDetails->Users->find('list', ['limit' => 200]);
        $annotations = $this->ProjectDetails->Annotations->find('list', ['limit' => 200]);
        $prices = $this->ProjectDetails->Prices->find('list', ['limit' => 200]);
        // $subStatuses = $this->ProjectDetails->SubStatus->find('list', ['limit' => 200]);
        $this->set(compact('projectDetail', 'vendors', 'staff', 'sponsors', 'lov', 'users', 'annotations', 'prices'));
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

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));
        }
        $vendors = $this->ProjectDetails->Vendors->find('list', ['limit' => 200]);
        $staff = $this->ProjectDetails->Staff->find('list', ['limit' => 200]);
        $sponsors = $this->ProjectDetails->Sponsors->find('list', ['limit' => 200]);
        $lov = $this->ProjectDetails->Lov->find('list', ['limit' => 200]);
        $users = $this->ProjectDetails->Users->find('list', ['limit' => 200]);
        $annotations = $this->ProjectDetails->Annotations->find('list', ['limit' => 200]);
        $prices = $this->ProjectDetails->Prices->find('list', ['limit' => 200]);
        // $priority = $this->ProjectDetails->Prices->find('list', ['limit' => 200]);
        $subStatuses = $this->ProjectDetails->SubStatuses->find('list', ['limit' => 200]);
        $this->set(compact('projectDetail', 'vendors', 'staff', 'sponsors', 'lov', 'users', 'annotations', 'prices', 'subStatuses'));
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

    public function import()
    {
        $upload_errors = [];
        $projectDetails = $this->ProjectDetails->newEntity();
        if ($this->request->is('post')) {
            // Get a list of UploadedFile objects
            $files = $this->request->getUploadedFiles();

            $fileSize = $files[ProjectUploadHandler::__SLUG]->getSize();
            $filename = $files[ProjectUploadHandler::__SLUG]->getClientFileName();
            $mediaType = $files[ProjectUploadHandler::__SLUG]->getClientMediaType();
            $fileStream = $files[ProjectUploadHandler::__SLUG]->getStream();
            $location = $fileStream->getMetadata()['uri'];
            $fileError = $files[ProjectUploadHandler::__SLUG]->getError();
            try {
                $excel = new ProjectUploadHandler($filename, $fileSize, $mediaType, $location, $fileError, $fileStream);
                $fetchData = $excel->handleImport();
                $projectDetails = $this->ProjectDetails->patchEntities($projectDetails, $fetchData);
                foreach ($projectDetails as $key => $projectDetail) {
                    if (isset($fetchData[$key]['error'])) {
                        $error = $fetchData[$key]['error'];
                        unset($fetchData[$key]['error']);

                        array_push(
                            $upload_errors,
                            array_merge_recursive($fetchData[$key], ['errors' => $error])
                        );
                        continue;
                    }
                    if (!$this->ProjectDetails->save($projectDetail)) {
                        array_push(
                            $upload_errors,
                            array_merge_recursive($fetchData[$key], ['errors' => $projectDetail->getErrors()])
                        );
                    }
                }

                if (empty($upload_errors)) {
                    $this->Flash->success(__('The import has been saved.'));

                    return $this->redirect($this->referer());
                } else {
                    $error = $excel->__extract_error($upload_errors);
                    $this->log(__($error['error']), 'error', ['scope' => ['import']]);
                    $this->Flash->error(__(count($upload_errors) .
                        " record(s) could not be saved. Please, try again or check the log for more information."));
                    return $this->redirect($this->referer());
                }
            } catch (ExcelDocumentException $e) {
                $this->log($e->getMessage(), 'error', ['scope' => ['import']]);
                $this->Flash->error(__($e->getMessage()));
                return $this->redirect($this->referer());
            } catch (\Exception $e) {
                $this->log($e->getMessage(), 'error', ['scope' => ['import']]);
                $this->Flash->error(__('Unexpected error occurred. Please check log.'));
                return $this->redirect($this->referer());
            }
        }
        $this->set(compact('projectDetails'));
    }
}
