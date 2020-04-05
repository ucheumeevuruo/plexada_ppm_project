<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PadObjectives Controller
 *
 * @property \App\Model\Table\PadObjectivesTable $PadObjectives
 *
 * @method \App\Model\Entity\PadObjective[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadObjectivesController extends AppController
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
        $padObjectives = $this->paginate($this->PadObjectives);

        $this->set(compact('padObjectives'));
    }

    /**
     * View method
     *
     * @param string|null $id Pad Objective id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $padObjective = $this->PadObjectives->get($id, [
            'contain' => ['Pads'],
        ]);

        $this->set('padObjective', $padObjective);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $padObjective = $this->PadObjectives->newEntity();
        if ($this->request->is('post')) {
            $padObjective = $this->PadObjectives->patchEntity($padObjective, $this->request->getData());
            if ($this->PadObjectives->save($padObjective)) {
                $this->Flash->success(__('The pad objective has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad objective could not be saved. Please, try again.'));
        }
        $pads = $this->PadObjectives->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padObjective', 'pads'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pad Objective id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $padObjective = $this->PadObjectives->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $padObjective = $this->PadObjectives->patchEntity($padObjective, $this->request->getData());
            if ($this->PadObjectives->save($padObjective)) {
                $this->Flash->success(__('The pad objective has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad objective could not be saved. Please, try again.'));
        }
        $pads = $this->PadObjectives->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padObjective', 'pads'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pad Objective id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $padObjective = $this->PadObjectives->get($id);
        if ($this->PadObjectives->delete($padObjective)) {
            $this->Flash->success(__('The pad objective has been deleted.'));
        } else {
            $this->Flash->error(__('The pad objective could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
