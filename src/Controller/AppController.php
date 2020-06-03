<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;


use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $helpers = [
        'Form' => [
            'className' => 'Bootstrap.Form'
        ],
//        'Html' => [
//            'className' => 'Bootstrap.Html'
//        ],
        'Modal' => [
            'className' => 'Bootstrap.Modal'
        ],
        'Navbar' => [
            'className' => 'Bootstrap.Navbar'
        ],
//        'Paginator' => [
//            'className' => 'Bootstrap.Paginator'
//        ],
//        'Panel' => [
//            'className' => 'Bootstrap.Panel'
//        ]
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Staff',
                'action' => 'login',
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users'
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Projects',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'staff',
                'action' => 'index'
            ],
            'storage' => [
                'className' => 'Session',
                'key' => 'Auth.Users',
            ],
//            'authorize' => ['Controller']
            'abc' => [
                'controller' => 'Messages',
                'action' => 'getMessageCount'
            ],
        ]);



        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        // $response = $this->requestAction('Messages/getMessageCount/');
        $logged_in_user = $this->Auth->user('id');
        $this->loadModel('Messages');
        $qryinbox = $this->Messages->find('all')->where(['recipient_id =' => $logged_in_user]) ;
        // $noofmessages = $qryinbox->func()->count();
        $noOfMessage = $qryinbox->count();
        $this->request->session()->write('akpython', $noOfMessage);



    }

    public function beforeFilter(Event $event)
    {
//        $this->Auth->allow(['login', 'logout', 'register']);
//
//        $this->loadModel('ProjectDetails');
//        $dateDiff = 30;
//        $today = date("Y-m-d");
//        $qryproject = $this->ProjectDetails->find()->where("DATEDIFF(end_dt,'$today') <= $dateDiff ");
//        // $qryproject = $this->ProjectDetails->find('all');
//        // $diff = $qryproject->func()->dateDiff(['ProjectDetails.end_dt', $today] <= 30) ;
//        // $qryproject->select(['difference' => $diff,]);
//        // $qryproject = $this->ProjectDetails->find('all')->where(['end_dt <='=> $today]) ;
//        // debug($qryproject->all());
//        // die();
//        $projectCount = $qryproject->count();
//        $this->set(compact('qryproject','projectCount'));

    }
}
