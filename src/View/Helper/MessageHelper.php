<?php
namespace App\View\Helper;

use Cake\ORM\TableRegistry;
use Cake\View\Helper;
use Cake\View\View;

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
            ->contain(['Senders'])
            ->where(['is_read' => 'N'])
            ->count();
        return $count;
    }

    public function getMessages()
    {
        $messages = $this->Messages->find('all')
            ->contain(['Senders'])
            ->where(['is_read' => 'N'])
            ->orderDesc('Messages.created')
            ->limit(5);
//            ->where(['first_name' => $name[0], 'last_name' => $name[1]])
//            ->first();
        return $messages;
    }
}