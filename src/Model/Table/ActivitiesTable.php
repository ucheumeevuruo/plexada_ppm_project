<?php

namespace App\Model\Table;

use Cake\I18n\Time;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

/**
 * Activities Model
 *
 * @property \App\Model\Table\ProjectDetailsTable&\Cake\ORM\Association\BelongsTo $ProjectDetails
 * @property \App\Model\Table\StaffTable&\Cake\ORM\Association\BelongsTo $Staff
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $Lov
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Activity get($primaryKey, $options = [])
 * @method \App\Model\Entity\Activity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Activity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Activity|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Activity saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Activity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Activity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Activity findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActivitiesTable extends Table
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

        $this->setTable('activities');
        $this->setDisplayField('next_activity');
        $this->setPrimaryKey('activity_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProjectDetails', [
            'foreignKey' => 'project_id',
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
        ]);
        $this->belongsTo('Staff', [
            'foreignKey' => 'assigned_to_id',
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id'
        ]);
        $this->belongsTo('Priorities', [
            'className' => 'Lov',
            'foreignKey' => 'priority_id',
            'joinType' => 'LEFT',
            'conditions' => ['Priorities.lov_type' => 'priority']
        ]);
        $this->belongsTo('Statuses', [
            'className' => 'Lov',
            'foreignKey' => 'status_id',
            'joinType' => 'LEFT',
            'conditions' => ['Statuses.lov_type' => 'project_status']
        ]);
        $this->belongsTo('Milestones', [
            'foreignKey' => 'milestone_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'system_user_id',
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'activity_id',
        ]);
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
            ->nonNegativeInteger('activity_id')
            ->allowEmptyString('activity_id', null, 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('current_activity')
            ->maxLength('current_activity', 300)
            ->allowEmptyString('current_activity');

        $validator
            ->scalar('waiting_on')
            ->maxLength('waiting_on', 70)
            ->allowEmptyString('waiting_on');

        $validator
            ->date('waiting_since')
            ->allowEmptyDate('waiting_since');

        $validator
            ->scalar('next_activity')
            ->maxLength('next_activity', 300)
            ->allowEmptyString('next_activity');

        $validator
            ->scalar('sub_status_id')
            ->maxLength('sub_status_id', 11)
            ->allowEmptyString('sub_status_id');

        $validator
            ->notEmptyString('priority_id');

        $validator
            ->integer('percentage_completion');
        //            ->requirePresence('percentage_completion', 'create')
        //            ->notEmptyString('percentage_completion');

        $validator
            ->scalar('description')
            ->maxLength('description', 300)
            //            ->requirePresence('Description', 'create')
            ->notEmptyString('Description');

        $validator
            ->date('completion_date')
            ->allowEmptyDate('completion_date');

        $validator
            ->dateTime('last_updated')
            ->allowEmptyDateTime('last_updated');

        return $validator;
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
        // $rules->add($rules->existsIn(['project_id'], 'ProjectDetails'));
        $rules->add($rules->existsIn(['assigned_to_id'], 'Staff'));
        $rules->add($rules->existsIn(['priority_id'], 'Priorities'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));
        $rules->add($rules->existsIn(['system_user_id'], 'Users'));

        return $rules;
    }

    // public function identify($formData)
    // {
    //     if (isset($formData['status_id'])) {

    //         $status = $this->Statuses->find()
    //             ->where(['id' => $formData['status_id']])
    //             ->first();
    //         if (strtolower($status->lov_value) == 'closed') {
    //             $formData['completion_date'] = Time::now();
    //         }
    //     }
    //     $formData['start_date'] = !empty($formData['start_date']) ?
    //     DateTime::createFromFormat('d/m/Y', $formData['start_date']) : $formData['start_date'];
    //     $formData['end_date'] = !empty($formData['end_date']) ?
    //     DateTime::createFromFormat('d/m/Y', $formData['end_date']) : $formData['end_date'];

    //     return $formData;
    // }

    public function findByProjectName($query, $options)
    {
        $name = $options['id'];

        if (!is_null($id)) {
            $query->where(function ($exp, Query $q) use ($name) {
                return $exp->like('Activities.name', "%$name%");
            });
        }
        return $query;
    }

    public function identify($formData)
    {
        if (isset($formData['status_id'])) {

            $status = $this->Statuses->find()
                ->where(['id' => $formData['status_id']])
                ->first();
            if (strtolower($status->lov_value) == 'closed') {
                $formData['completion_date'] = Time::now();
            }
        }
        $formData['start_date'] = !empty($formData['start_date']) ?
            DateTime::createFromFormat('d/m/Y', $formData['start_date']) : $formData['start_date'];
        $formData['end_date'] = !empty($formData['end_date']) ?
            DateTime::createFromFormat('d/m/Y', $formData['end_date']) : $formData['end_date'];

        return $formData;
    }
}
