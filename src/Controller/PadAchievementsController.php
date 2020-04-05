<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PadAchievements Controller
 *
 * @property \App\Model\Table\PadAchievementsTable $PadAchievements
 *
 * @method \App\Model\Entity\PadAchievement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PadAchievementsController extends AppController
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
        $padAchievements = $this->paginate($this->PadAchievements);

        $this->set(compact('padAchievements'));
    }

    /**
     * View method
     *
     * @param string|null $id Pad Achievement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $padAchievement = $this->PadAchievements->get($id, [
            'contain' => ['Pads'],
        ]);

        $this->set('padAchievement', $padAchievement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $padAchievement = $this->PadAchievements->newEntity();
        if ($this->request->is('post')) {
            $padAchievement = $this->PadAchievements->patchEntity($padAchievement, $this->request->getData());
            if ($this->PadAchievements->save($padAchievement)) {
                $this->Flash->success(__('The pad achievement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad achievement could not be saved. Please, try again.'));
        }
        $pads = $this->PadAchievements->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padAchievement', 'pads'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pad Achievement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $padAchievement = $this->PadAchievements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $padAchievement = $this->PadAchievements->patchEntity($padAchievement, $this->request->getData());
            if ($this->PadAchievements->save($padAchievement)) {
                $this->Flash->success(__('The pad achievement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pad achievement could not be saved. Please, try again.'));
        }
        $pads = $this->PadAchievements->Pads->find('list', ['limit' => 200]);
        $this->set(compact('padAchievement', 'pads'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pad Achievement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $padAchievement = $this->PadAchievements->get($id);
        if ($this->PadAchievements->delete($padAchievement)) {
            $this->Flash->success(__('The pad achievement has been deleted.'));
        } else {
            $this->Flash->error(__('The pad achievement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
