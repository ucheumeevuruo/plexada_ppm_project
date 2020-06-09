<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;       //  Built in function use for sending multiple email
use Cake\Mailer\Email;


/**
 * Staff Controller
 *
 * @property \App\Model\Table\StaffTable $Staff
 *
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $q = $this->request->getQuery('q');

        $customFinderOptions = [
            'name' => $q
        ];

        $this->paginate = [
            'contain' => ['Users', 'Roles'],
            'finder' => [
                'byName' => $customFinderOptions
            ]
        ];
        $staff = $this->paginate($this->Staff);

        $this->set(compact('staff'));
    }

    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staff->get($id, [
            'contain' => ['Users', 'Roles'],
        ]);

        $this->set('staff', $staff);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staff->newEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staff->patchEntity($staff, $this->request->getData());

            $firstname = $staff->first_name;
            $lastname = $staff->last_name;
            $othername = $staff->other_names;
            $username = $staff->user->username;
            $email = $staff->user->email;
            $phone = $staff->phone_no;

            $st = 'You just created an account with Ogun State PPM' . ', 
            First Name: ' . $firstname . ', 
            Last Name: ' . $lastname . ', 
            Other Name(s): ' . $othername . ', 
            Username: ' . $username . ', 
            Email: ' . $email . ', 
            Phone No: ' . $phone;

            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));
                $email = new Email('default');
                $email->from(['projects@plexada-si-apps.com' => 'Ogun state PPM'])
                    ->to($staff->user->email)
                    ->bcc('kingsconsult001@gmail.com') // blind carbon (optional)
                    ->subject('A staff have been created')
                    ->replyTo('kingsconsult001@gmail.com')
                    ->send($st);

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $users = $this->Staff->Users->find('list', ['limit' => 200]);
        $roles = $this->Staff->Roles->find('list', ['limit' => 200]);
        $this->set(compact('staff', 'users', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staff->get($id, [
            'contain' => ['Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staff->patchEntity($staff, $this->request->getData());
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $users = $this->Staff->Users->find('list', ['limit' => 200]);
        $roles = $this->Staff->Roles->find('list', ['limit' => 200]);
        $this->set(compact('staff', 'users', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staff->get($id);
        if ($this->Staff->delete($staff)) {
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $redirect = $this->request->getQuery('redirect');
            $user = $this->Auth->identify();
            if ($user) {
                $staff = $this->Staff->find('all')
                    ->contain(['Roles'])
                    ->where(['system_user_id' => $user['id']])
                    ->first();
                $this->Auth->setUser($staff);
                if (isset($redirect))
                    return $this->redirect($this->Auth->redirectUrl($redirect));
                else
                    return $this->redirect($this->Auth->redirectUrl('/projects'));
            }
            $this->Flash->error(__('Login credentials failed, please try again'));
        }

        $this->set(compact('user'));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    {
        $staff = $this->Staff->newEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staff->patchEntity($staff, $this->request->getData());
            //            debug($staff);die();
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $role = $this->Staff->Roles->find('list', ['limit' => 200]);
        $this->set(compact('staff', 'role'));
    }
}
