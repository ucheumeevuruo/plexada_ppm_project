<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 *
 * @method \App\Model\Entity\Message[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    // [ 'conditions' => ['Articles. title LIKE' => '%Ovens%'] ]); $number = $query->count();
    public function index()
    {   
        $logged_in_user = $this->Auth->user('id');
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $qry = $this->Messages->find('all')->where(['sender_id =' => $logged_in_user]); 
        $qryinbox = $this->Messages->find('all')->where(['recipient_id =' => $logged_in_user]) ; 
        // $qryinbox2 = $this->Messages->find('all',['contain'=>['Users'],'conditions'=>['Users.id = Messages.sender_id']]) ;//->innerJoin(['Users'],['Users.id = Messages.sender_id'])->where("recipient_id = $logged_in_user"); 
        $inboxmessages = $this->paginate($qryinbox);
        $messages = $this->paginate($qry);
        // sql(($qryinbox2));
        // die();
        $this->set(compact('messages', 'inboxmessages'));
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => ['Users'],
        ]);
        $this->set('message', $message);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $message = $this->Messages->newEntity();

        if ($this->request->is('post')) {
            $myMessage = $this->request->getData('body');
            $subject = $this->request->getData('subject');
            $recipent_id = $this->request->getData('recipient_id');
            $this->loadModel('Users');
            $recipent_email = $this->Users->find('all')
            ->select(['email'=>'Users.email'])
            ->where(['id'=>$recipent_id])
            ->toArray();
            $email = $recipent_email[0]['email'];
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));
                // $this->sendMail($email,$myMessage,$subject);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
            // debug($message);
            // die();
        }
        $logged_in_user = $this->Auth->user('id');
        $users = $this->Messages->Users->find('list', ['limit' => 200,'conditions'=>['id !='=>$logged_in_user]]);
        $this->set(compact('message', 'users','logged_in_user'));
    }

    public function sendMail($to,$msg,$subject)
    {
        $email = new Email('default');
        $email
             ->transport('gmail')
             ->from(['iamaqim@gmail.com' => 'iamaqim@gmail.com'])
             ->to($to)
             ->subject($subject)
              ->emailFormat('html')
             ->viewVars(array('msg' => $msg))
             ->send($msg);
        


        
        // $email = new Email('default');
        // $email->from(['me@example.com' => 'My Site'])
        //     ->to($to)
        //     ->subject($subject)
        //     ->send($message);

    }
    /**
     * Edit method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $message = $this->Messages->patchEntity($message, $this->request->getData());
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
        $users = $this->Messages->Users->find('list', ['limit' => 200]);
        $this->set(compact('message', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public Function getMessageCount(){
        $qryinbox = $this->Messages->find('all')->where(['recipient_id =' => $logged_in_user]) ;
        $noOfMessage = count($this->paginate($qryinbox)); 
     return $noOfMessage;

     }

    //  public function getProjects() {
    //     $this->loadModel('Projects');
    //     $projects =  $this->Projects->find('all');

    //     $count = 0;
    //     foreach($projects as $project) {
    //         $count++;
    //     }
    //     return $count;
    //  }

}
