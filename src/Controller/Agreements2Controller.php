<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Agreements Controller
 *
 * @property \App\Model\Table\AgreementsTable $Agreements
 *
 * @method \App\Model\Entity\Agreement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgreementsController extends AppController
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
        $agreements = $this->paginate($this->Agreements);

        $this->set(compact('agreements'));
    }

    /**
     * View method
     *
     * @param string|null $id Agreement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agreement = $this->Agreements->get($id, [
            'contain' => ['Projects'],
        ]);

        $this->set('agreement', $agreement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $agreement = $this->Agreements->newEntity();
        if ($this->request->is('post')) {
            $agreement = $this->Agreements->patchEntity($agreement, $this->request->getData());
            if ($this->Agreements->save($agreement)) {
                $this->Flash->success(__('The agreement has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The agreement could not be saved. Please, try again.'));
        }
        $projects = $this->Agreements->Projects->find('list', ['limit' => 200])->where(['id' => $id]);

        $this->set(compact('agreement', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Agreement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agreement = $this->Agreements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agreement = $this->Agreements->patchEntity($agreement, $this->request->getData());
            if ($this->Agreements->save($agreement)) {
                $this->Flash->success(__('The agreement has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The agreement could not be saved. Please, try again.'));
        }
        $projects = $this->Agreements->Projects->find('list', ['limit' => 200]);
        $this->set(compact('agreement', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Agreement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agreement = $this->Agreements->get($id);
        if ($this->Agreements->delete($agreement)) {
            $this->Flash->success(__('The agreement has been deleted.'));
        } else {
            $this->Flash->error(__('The agreement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Agreement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editAgreement($id = null)
    {
        $agreement = $this->Agreements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agreement = $this->Agreements->patchEntity($agreement, $this->request->getData());
            if ($this->Agreements->save($agreement)) {
                $this->Flash->success(__('The agreement has been saved.'));

                // return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());

            }
            $this->Flash->error(__('The agreement could not be saved. Please, try again.'));
        }
        $projects = $this->Agreements->Projects->find('list', ['limit' => 200]);
        $this->set(compact('agreement', 'projects'));
    }
}
