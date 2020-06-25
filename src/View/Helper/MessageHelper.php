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
        $this->Tasks = TableRegistry::getTableLocator()->get('Tasks');
        $this->Activities = TableRegistry::getTableLocator()->get('Activities');
        $this->Milestones = TableRegistry::getTableLocator()->get('Milestones');
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

    public function getTasks()
    {
        $tasks = $this->Tasks->find('all')->where(['status_id' => 1]);
        $today = date_create(date('m/d/Y'));

        $count = 0;
        $convertDate = array();
        foreach ($tasks as $task) {
            $dateDiff = date_diff($today, date_create($task->Start_date));
            $converted = $dateDiff->format('%R%a day(s)');
            if ((int) $converted < 0) {

                array_push($convertDate, $task);
                // array_push($convertDate, (int) $converted, $task->Task_name);
            }

            $count++;
        }
        return $convertDate;
    }
    public function tasksCount()
    {
        $tasks = $this->Tasks->find('all')->where(['status_id' => 1]);
        $today = date_create(date('m/d/Y'));

        $count = 0;
        foreach ($tasks as $task) {
            $dateDiff = date_diff($today, date_create($task->Start_date));
            $converted = $dateDiff->format('%R%a day(s)');
            if ((int) $converted < 0) {
                $count++;
            }
        }
        return $count;
    }
   

    public function getActivities()
    {
        $activities = $this->Activities->find('all')->where(['status_id' => 1]);
        $today = date_create(date('m/d/Y'));

        $count = 0;
        $convertDate = array();
        foreach ($activities as $activity) {
            $dateDiff = date_diff($today, date_create($activity->start_date));
            $converted = $dateDiff->format('%R%a day(s)');
            if ((int) $converted < 0) {

                array_push($convertDate, $activity);
            }

            $count++;
        }
        return $convertDate;
    }
    public function activitiesCount()
    {
        $activities = $this->Activities->find('all')->where(['status_id' => 1]);
        $today = date_create(date('m/d/Y'));

        $count = 0;
        foreach ($activities as $activity) {
            $dateDiff = date_diff($today, date_create($activity->start_date));
            $converted = $dateDiff->format('%R%a day(s)');
            if ((int) $converted < 0) {

                $count++;
            }
        }
        return $count;
    }

    public function getIndicators()
    {
        $indicators = $this->Milestones->find('all')->where(['status_id' => 1]);
        $today = date_create(date('m/d/Y'));

        $count = 0;
        $convertDate = array();
        foreach ($indicators as $indicator) {
            $dateDiff = date_diff($today, date_create($indicator->start_date));
            $converted = $dateDiff->format('%R%a day(s)');
            if ((int) $converted < 0) {

                array_push($convertDate, $indicator);
            }
            $count++;
        }
        return $convertDate;
    }
    public function indicatorsCount()
    {
        $indicators = $this->Milestones->find('all')->where(['status_id' => 1]);
        $today = date_create(date('m/d/Y'));

        $count = 0;
        foreach ($indicators as $indicator) {
            $dateDiff = date_diff($today, date_create($indicator->start_date));
            $converted = $dateDiff->format('%R%a day(s)');
            if ((int) $converted < 0) {

                $count++;
            }
        }
        return $count;
    }

}
