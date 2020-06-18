<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Excel\Handlers\ProjectUploadHandler;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

use App\Form\ContactForm;
use DateTime;

/**
 * ProjectDetails Controller
 *
 * @property \App\Model\Table\ProjectDetailsTable $ProjectDetails
 *
 * @method \App\Model\Entity\ProjectDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectDetailsController extends AppController
{


    var $helpers = array('Html', 'Form', 'Csv');
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Vendors', 'Staff', 'Sponsors', 'Lov', 'Users', 'Prices', 'SubStatuses', 'Priorities', 'Annotations'],

        // ];
        $projectDetails = $this->ProjectDetails->find('all');


        ///
        ///
        //        $authUser = $this->Auth->User();

        //        $projectDetails = $this->ProjectDetails->find('all', [
        //            'contain' => ['Vendors', 'Staff', 'Sponsors', 'Lov', 'Users', 'Prices', 'SubStatuses', 'Priorities'],
        //            'conditions' => ['ProjectDetails.system_user_id' => $authUser['id']]
        //        ]);
        // $projectDetails = $this->paginate($this->ProjectDetails);
        $this->set(compact('projectDetails'));
    }

    /**
     * View method
     *
     * @param  string|null $id Project Detail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectDetail = $this->ProjectDetails->get(
            $id,
            [
                'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Activities.Priorities', 'Lov', 'Activities.Statuses', 'Users', 'Activities', 'Activities.Staff', 'SubStatuses', 'Priorities'],

            ]
        );
    }

    public function activities($id = null)
    {
        $projectDetail = $this->ProjectDetails->get(
            $id,
            [
                'contain' => ['Activities', 'Activities.Priorities', 'Lov', 'Activities.Statuses']
            ]
        );

        $this->set('projectDetail', $projectDetail);
    }

    public function milestones($id = null)
    {
        $projectDetail = $this->ProjectDetails->get(
            $id,
            [
                // 'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'Milestones', 'Milestones.Lov', 'Milestones.Triggers', 'Priorities', 'Prices', 'Prices.Currencies'],
                'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'Milestones', 'Milestones.Lov', 'Milestones.Triggers', 'Priorities', 'Prices'],
            ]
        );

        $this->set('projectDetail', $projectDetail);
    }

    public function riskIssues($id = null)
    {
        $projectDetail = $this->ProjectDetails->get(
            $id,
            [
                'contain' => ['Vendors', 'Staff', 'Personnel', 'Sponsors', 'Lov', 'Users', 'RiskIssues', 'RiskIssues.Lov', 'RiskIssues.Impact', 'RiskIssues.Staff', 'Priorities', 'Prices'],
            ]
        );

        $this->set('projectDetail', $projectDetail);
    }

    public function evaluation()
    {

        if ($this->request->is('post')) {
            $reportdate = $this->request->getData('reportdate');
            $from = $this->request->getData('from');
            $to = $this->request->getData('to');
            $fromnumber = strtotime($from);
            $tonumber = strtotime($to);

            $this->set(compact('fromnumber', 'tonumber'));
        }

        $projectDetails = $this->ProjectDetails->find('all')->contain(['Currencies']);

        $this->loadModel('Sponsors');
        $sponsors = $this->Sponsors->find('all');


        $staff = $this->ProjectDetails->Staff->find('all');
        $this->loadModel('Milestones');
        $milestone_list =  $this->Milestones->find('all');
        $this->loadModel('Activities');
        $activities =  $this->Activities->find('all');
        $this->loadModel('ProjectFundings');
        $projectfundings =  $this->ProjectFundings->find('all');


        // debug($projectDetails);
        // die();

        $this->set(compact('projectDetails', 'staff', 'milestone_list', 'activities', 'projectfundings', 'sponsors'));
    }


    public function consolidated()
    {

        // $contact = new ContactForm();
        if ($this->request->is('post')) {
            $sdate = $this->request->getData('from');
            $edate = $this->request->getData('dateto');

            $this->loadModel('Projects');
            $projectReports = $this->ProjectDetails->find('all')->contain(['Projects', 'Currencies'])->where(['ProjectDetails.start_dt >=' => $sdate, 'ProjectDetails.end_dt <=' => $edate]);




            $todays = date("Y");
            $sObj = new DateTime($sdate);
            $shsdate = $sObj->format("j F Y");
            $shsdate1 = $sObj->format("F Y");
            $eObj = new DateTime($edate);
            $shedate = $eObj->format("j F Y");
            $fromshdate1 = "$shsdate to $shedate";
            $fromshdate2 = "$shsdate1-December, $todays";

            $from = $sObj->format("d M Y");
            // $this->request->setData(['from'=> $from]);
            $this->request->data('from', $from);
            // debug($projectReports);
            // die();
            $this->set(compact('projectReports', 'from', 'edate', 'fromshdate1', 'fromshdate2'));
        }
    }


    public function summary()
    {
        $projectDetails = $this->ProjectDetails->find('all');


        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all');
        $this->loadModel('Sponsors');
        $sponsors =  $this->Sponsors->find('all');
        $this->loadModel('Projects');
        $projects =  $this->Projects->find('all');
        // debug($projectDetails);
        // die();

        $this->set(compact('projectDetails', 'milestones', 'sponsors',  'projects'));
    }

    public function printable($id = null)
    {
        $projectDetails = $this->ProjectDetails->get(
            $id,
            [
                'contain' => ['Currencies'],
            ]
        );
        $this->loadModel('Sponsors');
        $sponsors =  $this->Sponsors->find('all')->where(['id' => $projectDetails->sponsor_id])->first();

        $this->loadModel('Disbursements');
        $disbursed =  $this->Disbursements->find('all')->where(['project_id' => $projectDetails->project_id]);

        $amountDisbursed = 0;
        foreach ($disbursed as $disburse) {
            $amountDisbursed = $amountDisbursed + $disburse->cost;
        }

        $this->loadModel('Milestones');
        $milestones =  $this->Milestones->find('all')->where(['project_id' => $projectDetails->project_id]);
        $this->loadModel('Activities');
        $activities =  $this->Activities->find('all')->where(['project_id' => $projectDetails->project_id]);

        // $return = $this->redirect($this->referer());

        // debug($return);
        // die();


        $this->set(compact('projectDetails', 'sponsors', 'amountDisbursed', 'milestones', 'activities'));
    }



    public function report($id = null)
    {
        $this->loadModel('Milestones');
        $this->loadModel('RiskIssues');

        $milestone_list =  $this->Milestones->find('all');

        $projectDetails = $this->ProjectDetails->get(
            $id,
            [
                'contain' => [],
            ]
        );

        $this->set('projectDetails', $projectDetails);
    }


    public function partners($id = null)
    {


        // $projectDetails = $this->ProjectDetails->find('all', ['contain' => ['Sponsors']]);
        $projectDetails = $this->ProjectDetails->get(
            $id,
            [
                'contain' => ['Sponsors', 'Projects'],
            ]
        );

        $this->set('projectDetails', $projectDetails);
    }



    function download()
    {
        $this->set('orders', $this->Order->find('all'));
        $this->layout = null;
        $this->autoLayout = false;
        Configure::write('debug', '0');
    }

    public function export()
    {
        $this->response->download('export.csv');
        $data = $this->Subscriber->find('all')->toArray();
        $_serialize = 'data';
        $this->set(compact('data', '_serialize'));
        $this->viewBuilder()->className('CsvView.Csv');
        return;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $this->loadModel('Projects');
        $project_info = $this->Projects->get($id);

        $projectDetail = $this->ProjectDetails->newEntity();
        if ($this->request->is('post')) {

            $projectDetail = $this->ProjectDetails->patchEntity($projectDetail, $this->ProjectDetails->identify($this->request->getData()));
            if ($this->ProjectDetails->save($projectDetail)) {
                $this->Flash->success(__('The project detail has been saved.'));
                return $this->redirect(['controller' => 'projects', 'action' => 'index']);
                // return $this->redirect(['controller' => 'pims', 'action' => 'add', $id]);
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));
            // debug($projectDetail);
            // die();
            //            return $this->redirect(['controller' => 'projects', 'action' => 'index']);
        }
        $projects = $this->ProjectDetails->Projects->find('list', ['limit' => 200]);
        $vendors = $this->ProjectDetails->Vendors->find('list', ['limit' => 200]);
        $staff = $this->ProjectDetails->Staff->find('list', ['limit' => 200]);
        $lov = $this->ProjectDetails->Lov->find(
            'list',
            [
                'conditions' => ['Lov.lov_type' => 'project_status'],
                'limit' => 200
            ]
        );

        $sponsors = $this->ProjectDetails->Projects->ProjectSponsors->Sponsors->find(
            'list',
            [
                'contain' => ['SponsorTypes'],
                'conditions' => ['SponsorTypes.lov_value' => 'sponsor'],
                'limit' => 200
            ]
        );

        $donors = $this->ProjectDetails->Projects->ProjectSponsors->Sponsors->find(
            'list',
            [
                'contain' => ['SponsorTypes'],
                'conditions' => ['SponsorTypes.lov_value' => 'donor'],
                'limit' => 200
            ]
        );

        $mdas = $this->ProjectDetails->Projects->ProjectSponsors->Sponsors->find(
            'list',
            [
                'contain' => ['SponsorTypes'],
                'conditions' => ['SponsorTypes.lov_value' => 'mda'],
                'limit' => 200
            ]
        );


        $priority = $this->ProjectDetails->Lov->find(
            'list',
            [
                'conditions' => ['Lov.lov_type' => 'priority'],
                'limit' => 200
            ]
        );
        $subStatus = $this->ProjectDetails->SubStatuses->find(
            'list',
            [
                'conditions' => ['SubStatuses.lov_type' => 'project_sub_status'],
                'limit' => 200
            ]
        );
        $authUser = $this->Auth->User();
        $currencies = $this->ProjectDetails->Currencies->find(
            'list',
            [
                'limit' => 200
            ]
        );
        $users = $this->ProjectDetails->Users->find('list', ['limit' => 200]);
        $annotations = $this->ProjectDetails->Annotations->find('list', ['limit' => 200]);
        $prices = $this->ProjectDetails->Prices->find('list', ['limit' => 200]);
        $projects_info = $this->Projects->find('list', ['limit' => 200, 'conditions' => ['id' => $id]]);
        $this->set(compact('projectDetail', 'vendors', 'staff', 'sponsors', 'donors', 'mdas', 'priority', 'lov', 'users', 'annotations', 'prices', 'projects', 'subStatus', 'users', 'authUser', 'project_info', 'projects_info', 'currencies'));
    }

    /**
     * Edit method
     *
     * @param  string|null $id Project Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Projects');

        $projectDetail = $this->ProjectDetails->get($id, [
            'contain' => [
                'Projects',
                'Projects.ProjectSponsors',
                //                'Projects.ProjectSponsors.SponsorTypes',
                'Projects.ProjectMdas',
                //                'Projects.ProjectMdas.SponsorTypes',
                'Projects.ProjectDonors',
                //                'Projects.ProjectDonors.SponsorTypes',
            ]
        ]);


        $project_info = $this->Projects->get($projectDetail->project_id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectDetail = $this->ProjectDetails->patchEntity($projectDetail, $this->ProjectDetails->identify($this->request->getData()), [
                'associated' => [
                    'Projects.ProjectDonors', 'Projects.ProjectMdas', 'Projects.ProjectSponsors'
                ]
            ]);

            //             debug($projectDetail);
            //             die();
            if ($this->ProjectDetails->save($projectDetail)) {

                $this->Flash->success(__('The project detail has been saved.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));

            return $this->redirect($this->referer());
        }


        $vendors = $this->ProjectDetails->Vendors->find('list', ['limit' => 200]);

        $staff = $this->ProjectDetails->Staff->find('list', ['limit' => 200]);
        $lov = $this->ProjectDetails->Lov->find(
            'list',
            [
                'conditions' => ['Lov.lov_type' => 'project_status'],
                'limit' => 200
            ]
        );

        $sponsors = $this->ProjectDetails->Projects->ProjectSponsors->Sponsors->find(
            'list',
            [
                'contain' => ['SponsorTypes'],
                'conditions' => ['SponsorTypes.lov_value' => 'sponsor'],
                'limit' => 200
            ]
        );

        $donors = $this->ProjectDetails->Projects->ProjectSponsors->Sponsors->find(
            'list',
            [
                'contain' => ['SponsorTypes'],
                'conditions' => ['SponsorTypes.lov_value' => 'donor'],
                'limit' => 200
            ]
        );

        $mdas = $this->ProjectDetails->Projects->ProjectSponsors->Sponsors->find(
            'list',
            [
                'contain' => ['SponsorTypes'],
                'conditions' => ['SponsorTypes.lov_value' => 'mda'],
                'limit' => 200
            ]
        );
        $priority = $this->ProjectDetails->Lov->find(
            'list',
            [
                'conditions' => ['Lov.lov_type' => 'priority'],
                'limit' => 200
            ]
        );
        $currencies = $this->ProjectDetails->Currencies->find(
            'list',
            [
                'limit' => 200
            ]
        );
        $subStatus = $this->ProjectDetails->SubStatuses->find(
            'list',
            [
                'conditions' => ['SubStatuses.lov_type' => 'project_sub_status'],
                'limit' => 200
            ]
        );

        $users = $this->ProjectDetails->Users->find('list', ['limit' => 200]);
        $userid = $id;

        $this->set(compact('projectDetail', 'vendors', 'staff', 'sponsors', 'donors', 'mdas', 'lov', 'users', 'subStatus', 'users', 'currencies', 'project_info'));
    }
    /**
     * Delete method
     *
     * @param  string|null $id Project Detail id.
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
                    $this->Flash->error(
                        __(
                            count($upload_errors) .
                                " record(s) could not be saved. Please, try again or check the log for more information."
                        )
                    );
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
    /**
     * Edit method
     *
     * @param  string|null $id Project Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function designApproval($id = null)
    {
        $this->loadModel('Projects');

        $projectDetail = $this->ProjectDetails->get($id, [
            'contain' => [
                'Projects',
                'Projects.ProjectSponsors',
                //                'Projects.ProjectSponsors.SponsorTypes',
                'Projects.ProjectMdas',
                //                'Projects.ProjectMdas.SponsorTypes',
                'Projects.ProjectDonors',
                //                'Projects.ProjectDonors.SponsorTypes',
            ]
        ]);


        $project_info = $this->Projects->get($projectDetail->project_id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectDetail = $this->ProjectDetails->patchEntity($projectDetail, $this->ProjectDetails->identify($this->request->getData()), [
                'associated' => [
                    'Projects.ProjectDonors', 'Projects.ProjectMdas', 'Projects.ProjectSponsors'
                ]
            ]);
            if ($this->ProjectDetails->save($projectDetail)) {

                $this->Flash->success(__('The project design has been approved.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The project detail could not be saved. Please, try again.'));

            return $this->redirect($this->referer());
        }
        $this->set(compact('projectDetail', 'project_info'));

    }
}
