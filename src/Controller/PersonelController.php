<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Personel Controller
 *
 * @property \App\Model\Table\PersonelTable $Personel
 *
 * @method \App\Model\Entity\Personel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonelController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
//            'contain' => ['SystemUsers'],
        ];
        $personel = $this->paginate($this->Personel);

        $this->set(compact('personel'));
    }

    /**
     * View method
     *
     * @param string|null $id Personel id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $personel = $this->Personel->get($id, [
//            'contain' => ['SystemUsers'],
        ]);

        $this->set('personel', $personel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personel = $this->Personel->newEntity();
        if ($this->request->is('post')) {
            $personel = $this->Personel->patchEntity($personel, $this->request->getData());
            if ($this->Personel->save($personel)) {
                $this->Flash->success(__('The personel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personel could not be saved. Please, try again.'));
        }
//        $systemUsers = $this->Personel->SystemUsers->find('list', ['limit' => 200]);
        $this->set(compact('personel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Personel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $personel = $this->Personel->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $personel = $this->Personel->patchEntity($personel, $this->request->getData());
            if ($this->Personel->save($personel)) {
                $this->Flash->success(__('The personel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The personel could not be saved. Please, try again.'));
        }
//        $systemUsers = $this->Personel->SystemUsers->find('list', ['limit' => 200]);
        $this->set(compact('personel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Personel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $personel = $this->Personel->get($id);
        if ($this->Personel->delete($personel)) {
            $this->Flash->success(__('The personel has been deleted.'));
        } else {
            $this->Flash->error(__('The personel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
