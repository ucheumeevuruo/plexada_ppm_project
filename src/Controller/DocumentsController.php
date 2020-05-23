<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Documents Controller
 *
 * @property \App\Model\Table\DocumentsTable $Documents
 *
 * @method \App\Model\Entity\Document[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentsController extends AppController
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
        $documents = $this->paginate($this->Documents);

        $this->set(compact('documents'));
    }

    /**
     * View method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => ['Projects', 'Documents'],
        ]);

        $this->set('document', $document);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $document = $this->Documents->newEntity();
        if ($this->request->is('post')) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['controller' => 'Projects', 'action' => 'documents', $id]);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }

        $projects = $this->Documents->Projects->find('list', ['limit' => 200])->where(['id' => $id]);

        // debug($projects);
        // die();
        $this->set(compact('document', 'projects', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $document = $this->Documents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $document = $this->Documents->patchEntity($document, $this->request->getData());
            if ($this->Documents->save($document)) {
                $this->Flash->success(__('The document has been saved.'));

                return $this->redirect(['controller' => 'Projects', 'action' => 'documents', $id]);
            }
            $this->Flash->error(__('The document could not be saved. Please, try again.'));
        }
        $projects = $this->Documents->Projects->find('list', ['limit' => 200]);
        $this->set(compact('document', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Document id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $document = $this->Documents->get($id);
        if ($this->Documents->delete($document)) {
            $this->Flash->success(__('The document has been deleted.'));
        } else {
            $this->Flash->error(__('The document could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}