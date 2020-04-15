<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

/**
 * ProjectDetailsOld Model
 *
 * @property \App\Model\Table\VendorsTable&\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\StaffTable&\Cake\ORM\Association\BelongsTo $Staff
 * @property \App\Model\Table\SponsorsTable&\Cake\ORM\Association\BelongsTo $Sponsors
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Priorities
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $Lov
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Milestones
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $RiskIssues
 *
 * @method \App\Model\Entity\ProjectDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectDetail findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectDetailsTable extends Table
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

        $this->setTable('project_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id',
        ]);
        $this->belongsTo('Staff', [
            'className' => 'Staff',
            'foreignKey' => 'manager_id',
        ]);
        $this->belongsTo('Sponsors', [
            'foreignKey' => 'sponsor_id',
        ]);
        $this->belongsTo('Personnel', [
            'className' => 'Staff',
            'foreignKey' => 'waiting_on_id'
        ]);
        $this->belongsTo('Lov', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SubStatuses', [
            'foreignKey' => 'sub_status_id',
            'className' => 'Lov'
        ]);
        $this->belongsTo('Priorities', [
            'className' => 'Lov',
            'foreignKey' => 'priority_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'system_user_id',
        ]);
        $this->hasOne('Annotations', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasOne('tasks', [
            'foreignKey' => 'Task_name',
            'joinType' => 'LEFT'
        ]);
        $this->hasOne('Prices', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('Activities', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('Milestones', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('RiskIssues', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT'
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 600)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('location')
            ->maxLength('location', 150)
            ->allowEmptyString('location');

        $validator
            ->date('waiting_since')
            ->allowEmptyDate('waiting_on');

        //        $validator
        //            ->scalar('waiting_on')
        //            ->maxLength('waiting_on', 70)
        //            ->allowEmptyString('waiting_on');

        $validator
            ->date('start_dt')
            ->allowEmptyDate('start_dt');

        $validator
            ->date('end_dt')
            ->allowEmptyDate('end_dt');

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
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['manager_id'], 'Staff'));
        $rules->add($rules->existsIn(['sponsor_id'], 'Sponsors'));
        $rules->add($rules->existsIn(['waiting_on_id'], 'Staff'));
        $rules->add($rules->existsIn(['status_id'], 'Lov'));
        //        $rules->add($rules->existsIn(['annotation_id'], 'Annotations'));
        $rules->add($rules->existsIn(['sub_status_id'], 'SubStatuses'));
        $rules->add($rules->existsIn(['priority_id'], 'Priorities'));
        $rules->add($rules->existsIn(['system_user_id'], 'Users'));

        return $rules;
    }

    public function identify($formData)
    {
        $formData['start_dt'] = !empty($formData['start_dt']) ?
            DateTime::createFromFormat('d/m/Y', $formData['start_dt']) : $formData['start_dt'];
        $formData['end_dt'] = !empty($formData['end_dt']) ?
            DateTime::createFromFormat('d/m/Y', $formData['end_dt']) : $formData['end_dt'];
        return $formData;
    }
}