<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pads Controller
 *
 * @property \App\Model\Table\PadsTable $Pads
 *
 * @method \App\Model\Entity\Pad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pads = $this->paginate($this->Pads);

        $this->set(compact('pads'));
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
        $pad = $this->Pads->get($id, [
            'contain' => ['PadAchievements', 'PadActivitiesMeans', 'PadCostings', 'PadCreditFacilityAgreements', 'PadObjectives'],
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
        $pad = $this->Pads->newEntity();
        if ($this->request->is('post')) {
            $pad = $this->Pads->patchEntity($pad, $this->request->getData());
            if ($this->Pads->save($pad)) {
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
        $pad = $this->Pads->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pad = $this->Pads->patchEntity($pad, $this->request->getData());
            if ($this->Pads->save($pad)) {
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
        $pad = $this->Pads->get($id);
        if ($this->Pads->delete($pad)) {
            $this->Flash->success(__('The pad has been deleted.'));
        } else {
            $this->Flash->error(__('The pad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
