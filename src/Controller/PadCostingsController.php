<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PadCostings Controller
 *
 * @property \App\Model\Table\PadCostingsTable $PadCostings
 *
 * @method \App\Model\Entity\PadCosting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadCostingsController extends AppController
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
        $padCostings = $this->paginate($this->PadCostings);

        $this->set(compact('padCostings'));
    }

    /**
     * View method
     *
     * @param string|null $id Pad Costing id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $padCosting = $this->PadCostings->get($id, [
            'contain' => ['Pads'],
        ]);

        $this->set('padCosting', $padCosting);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $padCosting = $this->PadCostings->newEntity();
        if ($this->request->is('post')) {
            $padCosting = $this->PadCostings->patchEntity($padCosting, $this->request->getData());
            if ($this->PadCostings->save($padCosting)) {
                $this->Flash->success(__('The pad costing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad costing could not be saved. Please, try again.'));
        }
        $pads = $this->PadCostings->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padCosting', 'pads'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pad Costing id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $padCosting = $this->PadCostings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $padCosting = $this->PadCostings->patchEntity($padCosting, $this->request->getData());
            if ($this->PadCostings->save($padCosting)) {
                $this->Flash->success(__('The pad costing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad costing could not be saved. Please, try again.'));
        }
        $pads = $this->PadCostings->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padCosting', 'pads'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pad Costing id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $padCosting = $this->PadCostings->get($id);
        if ($this->PadCostings->delete($padCosting)) {
            $this->Flash->success(__('The pad costing has been deleted.'));
        } else {
            $this->Flash->error(__('The pad costing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
