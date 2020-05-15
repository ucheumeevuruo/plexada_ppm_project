<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

/**
 * Tasks Model
 *
 * @method \App\Model\Entity\Task get($primaryKey, $options = [])
 * @method \App\Model\Entity\Task newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Task[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Task|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Task saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Task patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Task[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Task findOrCreate($search, callable $callback = null, $options = [])
 */
class TasksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tasks');
        $this->setDisplayField('Description'); # What field do you want as the default field?description
        $this->setPrimaryKey('id'); // THIS IS THE PRIMARY KEY THE TABLE IS USING. You should define task_id as the primary key in your table ok thanks

        $this->belongsTo('Activities', [
            'foreignKey' => 'activity_id',
        ]);
        // $this->setDisplayField('description');
        // $this->setPrimaryKey('id'); I commented this out as this is not the primary key the table is using


//        $this->belongsTo('Projects', [
//            'foreignKey' => 'project_id',
//            'joinType' => 'INNER',
//        ]);

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('Task_name')
            ->maxLength('Task_name', 255)
            ->requirePresence('Task_name', 'create')
            ->notEmptyString('Task_name');

        $validator
            ->date('Start_date')
            ->requirePresence('Start_date', 'create')
            ->notEmptyDate('Start_date');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 255)
            ->requirePresence('Description', 'create')
            ->notEmptyString('Description');

        // $validator
        //     ->scalar('Predecessor')
        //     ->maxLength('Predecessor', 255)
        //     ->requirePresence('Predecessor', 'create')
        //     ->notEmptyString('Predecessor');

        // $validator
        //     ->scalar('Successor')
        //     ->maxLength('Successor', 255)
        //     ->requirePresence('Successor', 'create')
        //     ->notEmptyString('Successor');

        return $validator;
    }

    public function identify($formData)
    {
        $formData['Start_date'] = !empty($formData['Start_date']) ?
            DateTime::createFromFormat('d/m/Y', $formData['Start_date'])->format('Y-m-d') : $formData['Start_date'];
        return $formData;
    }
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['activity_id'], 'Activities'));

        return $rules;
    }
}