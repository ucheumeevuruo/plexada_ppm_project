<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sponsors Controller
 *
 * @property \App\Model\Table\SponsorsTable $Sponsors
 *
 * @method \App\Model\Entity\Sponsor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SponsorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'SponsorTypes'],
        ];
        $sponsors = $this->paginate($this->Sponsors);

        $this->set(compact('sponsors'));
    }

    /**
     * View method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sponsor = $this->Sponsors->get($id, [
            'contain' => ['Users', 'ProjectDetails'],
        ]);

        $this->set('sponsor', $sponsor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sponsor = $this->Sponsors->newEntity();
        if ($this->request->is('post')) {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->getData());
            if ($this->Sponsors->save($sponsor)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        $users = $this->Sponsors->Users->find('list', ['limit' => 200]);
        $sponsorTypes = $this->Sponsors->SponsorTypes->find('list', ['limit' => 200]);
        $this->set(compact('sponsor', 'users', 'sponsorTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sponsor = $this->Sponsors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sponsor = $this->Sponsors->patchEntity($sponsor, $this->request->getData());
            if ($this->Sponsors->save($sponsor)) {
                $this->Flash->success(__('The sponsor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sponsor could not be saved. Please, try again.'));
        }
        $users = $this->Sponsors->Users->find('list', ['limit' => 200]);
        $sponsorTypes = $this->Sponsors->SponsorTypes->find('list', ['limit' => 200]);
        $this->set(compact('sponsor', 'users', 'sponsorTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sponsor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sponsor = $this->Sponsors->get($id);
        if ($this->Sponsors->delete($sponsor)) {
            $this->Flash->success(__('The sponsor has been deleted.'));
        } else {
            $this->Flash->error(__('The sponsor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
