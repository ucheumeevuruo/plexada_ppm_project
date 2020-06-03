<?php
namespace App\View\Helper;

use Cake\ORM\TableRegistry;
use Cake\View\Helper;
use Cake\View\View;

/**
 * Milestones Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 *
 * @method \App\Model\Entity\Messages[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class MessageHelper extends Helper
{
    private $Messages;

    public function __construct(View $View, array $config = [])
    {
        parent::__construct($View, $config);

        $this->Messages = TableRegistry::getTableLocator()->get('Messages');

    }

    public function getMessageCount()
    {
        $count = $this->Messages->find('all')
            ->contain(['Users'])
            ->where(['is_read' => 'N', 'Users.id' => $_SESSION['Auth']['Users']['system_user_id']])
            ->count();

        return $count;
    }

    public function getMessages()
    {
        $messages = $this->Messages->find('all')
            ->contain(['Users'])
            ->where(['is_read' => 'N', 'Users.id' => $_SESSION['Auth']['Users']['system_user_id']])
            ->orderDesc('Messages.created')
            ->limit(5);

        return $messages;
    }
}