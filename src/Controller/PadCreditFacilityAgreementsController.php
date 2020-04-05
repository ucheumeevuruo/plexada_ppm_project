<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PadCreditFacilityAgreements Controller
 *
 * @property \App\Model\Table\PadCreditFacilityAgreementsTable $PadCreditFacilityAgreements
 *
 * @method \App\Model\Entity\PadCreditFacilityAgreement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadCreditFacilityAgreementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pads'],
        ];
        $padCreditFacilityAgreements = $this->paginate($this->PadCreditFacilityAgreements);

        $this->set(compact('padCreditFacilityAgreements'));
    }

    /**
     * View method
     *
     * @param string|null $id Pad Credit Facility Agreement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $padCreditFacilityAgreement = $this->PadCreditFacilityAgreements->get($id, [
            'contain' => ['Pads'],
        ]);

        $this->set('padCreditFacilityAgreement', $padCreditFacilityAgreement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $padCreditFacilityAgreement = $this->PadCreditFacilityAgreements->newEntity();
        if ($this->request->is('post')) {
            $padCreditFacilityAgreement = $this->PadCreditFacilityAgreements->patchEntity($padCreditFacilityAgreement, $this->request->getData());
            if ($this->PadCreditFacilityAgreements->save($padCreditFacilityAgreement)) {
                $this->Flash->success(__('The pad credit facility agreement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad credit facility agreement could not be saved. Please, try again.'));
        }
        $pads = $this->PadCreditFacilityAgreements->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padCreditFacilityAgreement', 'pads'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pad Credit Facility Agreement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $padCreditFacilityAgreement = $this->PadCreditFacilityAgreements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $padCreditFacilityAgreement = $this->PadCreditFacilityAgreements->patchEntity($padCreditFacilityAgreement, $this->request->getData());
            if ($this->PadCreditFacilityAgreements->save($padCreditFacilityAgreement)) {
                $this->Flash->success(__('The pad credit facility agreement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad credit facility agreement could not be saved. Please, try again.'));
        }
        $pads = $this->PadCreditFacilityAgreements->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padCreditFacilityAgreement', 'pads'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pad Credit Facility Agreement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $padCreditFacilityAgreement = $this->PadCreditFacilityAgreements->get($id);
        if ($this->PadCreditFacilityAgreements->delete($padCreditFacilityAgreement)) {
            $this->Flash->success(__('The pad credit facility agreement has been deleted.'));
        } else {
            $this->Flash->error(__('The pad credit facility agreement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
