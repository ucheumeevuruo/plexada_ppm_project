<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pad Controller
 *
 *
 * @method \App\Model\Entity\Pad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pad = $this->paginate($this->Pad);

        $this->set(compact('pad'));
    }

    /**
     * View method
     *
     * @param string|null $id Pad id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pad = $this->Pad->get($id, [
            'contain' => [],
        ]);

        $this->set('pad', $pad);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pad = $this->Pad->newEntity();
        if ($this->request->is('post')) {
            $pad = $this->Pad->patchEntity($pad, $this->request->getData());
            if ($this->Pad->save($pad)) {
                $this->Flash->success(__('The pad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad could not be saved. Please, try again.'));
        }
        $this->set(compact('pad'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pad = $this->Pad->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pad = $this->Pad->patchEntity($pad, $this->request->getData());
            if ($this->Pad->save($pad)) {
                $this->Flash->success(__('The pad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad could not be saved. Please, try again.'));
        }
        $this->set(compact('pad'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pad = $this->Pad->get($id);
        if ($this->Pad->delete($pad)) {
            $this->Flash->success(__('The pad has been deleted.'));
        } else {
            $this->Flash->error(__('The pad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
