<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PadActivitiesMeans Controller
 *
 * @property \App\Model\Table\PadActivitiesMeansTable $PadActivitiesMeans
 *
 * @method \App\Model\Entity\PadActivitiesMean[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadActivitiesMeansController extends AppController
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
        $padActivitiesMeans = $this->paginate($this->PadActivitiesMeans);

        $this->set(compact('padActivitiesMeans'));
    }

    /**
     * View method
     *
     * @param string|null $id Pad Activities Mean id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $padActivitiesMean = $this->PadActivitiesMeans->get($id, [
            'contain' => ['Pads'],
        ]);

        $this->set('padActivitiesMean', $padActivitiesMean);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $padActivitiesMean = $this->PadActivitiesMeans->newEntity();
        if ($this->request->is('post')) {
            $padActivitiesMean = $this->PadActivitiesMeans->patchEntity($padActivitiesMean, $this->request->getData());
            if ($this->PadActivitiesMeans->save($padActivitiesMean)) {
                $this->Flash->success(__('The pad activities mean has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad activities mean could not be saved. Please, try again.'));
        }
        $pads = $this->PadActivitiesMeans->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padActivitiesMean', 'pads'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pad Activities Mean id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $padActivitiesMean = $this->PadActivitiesMeans->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $padActivitiesMean = $this->PadActivitiesMeans->patchEntity($padActivitiesMean, $this->request->getData());
            if ($this->PadActivitiesMeans->save($padActivitiesMean)) {
                $this->Flash->success(__('The pad activities mean has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad activities mean could not be saved. Please, try again.'));
        }
        $pads = $this->PadActivitiesMeans->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padActivitiesMean', 'pads'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pad Activities Mean id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $padActivitiesMean = $this->PadActivitiesMeans->get($id);
        if ($this->PadActivitiesMeans->delete($padActivitiesMean)) {
            $this->Flash->success(__('The pad activities mean has been deleted.'));
        } else {
            $this->Flash->error(__('The pad activities mean could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
