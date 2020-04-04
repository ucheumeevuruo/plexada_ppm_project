<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Annotations Controller
 *
 * @property \App\Model\Table\AnnotationsTable $Annotations
 *
 * @method \App\Model\Entity\Annotation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnnotationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $annotations = $this->paginate($this->Annotations);

        $this->set(compact('annotations'));
    }

    /**
     * View method
     *
     * @param string|null $id Annotation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $annotation = $this->Annotations->get($id, [
            'contain' => ['ProjectDetails'],
        ]);

        $this->set('annotation', $annotation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $annotation = $this->Annotations->newEntity();
        if ($this->request->is('post')) {
            $annotation = $this->Annotations->patchEntity($annotation, $this->request->getData());
            if ($this->Annotations->save($annotation)) {
                $this->Flash->success(__('The annotation has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The annotation could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->set(compact('annotation', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Annotation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $annotation = $this->Annotations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $annotation = $this->Annotations->patchEntity($annotation, $this->request->getData());
            if ($this->Annotations->save($annotation)) {
                $this->Flash->success(__('The annotation has been saved.'));

//                return $this->redirect(['action' => 'index']);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The annotation could not be saved. Please, try again.'));
            return $this->redirect($this->referer());
        }
        $this->set(compact('annotation'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Annotation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $annotation = $this->Annotations->get($id);
        if ($this->Annotations->delete($annotation)) {
            $this->Flash->success(__('The annotation has been deleted.'));
        } else {
            $this->Flash->error(__('The annotation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
