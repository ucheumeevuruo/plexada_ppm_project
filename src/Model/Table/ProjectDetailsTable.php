<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

/**
 * ProjectDetails Model
 *
 * @property \App\Model\Table\VendorsTable&\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\StaffTable&\Cake\ORM\Association\BelongsTo $Staff
 * @property \App\Model\Table\SponsorsTable&\Cake\ORM\Association\BelongsTo $Sponsors
 * @property \App\Model\Table\StaffTable&\Cake\ORM\Association\BelongsTo $Staff
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $Lov
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $Lov
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AnnotationsTable&\Cake\ORM\Association\BelongsTo $Annotations
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\PricesTable&\Cake\ORM\Association\BelongsTo $Prices
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $SubStatuses
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
            'foreignKey' => 'manager_id',
        ]);
        $this->belongsTo('Sponsors', [
            'foreignKey' => 'sponsor_id',
        ]);
        $this->belongsTo('Staff', [
            'foreignKey' => 'waiting_on_id',
        ]);
        $this->belongsTo('Lov', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Lov', [
            'foreignKey' => 'priority_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'system_user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Annotations', [
            'foreignKey' => 'annotation_id',
        ]);
        $this->hasOne('Projects', [
            'foreignKey' => 'id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Prices', [
            'foreignKey' => 'price_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SubStatuses', [
            'className' => 'lov',
            'foreignKey' => 'sub_status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Priorities', [
            'className' => 'lov',
            'foreignKey' => 'priority_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'className' => 'lov',
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Sponsors', [
            'foreignKey' => 'id',
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
            ->scalar('description')
            ->maxLength('description', 600)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('location')
            ->maxLength('location', 150)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

        $validator
            ->date('waiting_since')
            // ->requirePresence('waiting_since', 'create')
            ->notEmptyDate('waiting_since');

        $validator
            ->date('start_dt')
            // ->requirePresence('start_dt', 'create')
            ->notEmptyDate('start_dt');

        $validator
            ->date('end_dt')
            // ->requirePresence('end_dt', 'create')
            ->notEmptyDate('end_dt');

        $validator
            ->dateTime('last_updated')
            ->allowEmptyDateTime('last_updated');

        $validator
            ->scalar('environmental_factors')
            ->maxLength('environmental_factors', 500)
            ->requirePresence('environmental_factors', 'create')
            ->notEmptyString('environmental_factors');

        $validator
            ->scalar('partners')
            ->maxLength('partners', 4294967295)
            // ->requirePresence('partners', 'create')
            ->allowEmptyString('partners');

        $validator
            ->integer('funding')
            // ->requirePresence('funding', 'create')
            ->allowEmptyString('funding');

        $validator
            ->integer('approvals')
            // ->requirePresence('approvals', 'create')
            ->allowEmptyString('approvals');

        $validator
            ->scalar('risks')
            ->maxLength('risks', 500)
            // ->requirePresence('risks', 'create')
            ->allowEmptyString('risks');

        $validator
            ->scalar('components')
            ->maxLength('components', 255)
            // ->requirePresence('components', 'create')
            ->allowEmptyString('components');

        return $validator;
    }


    public function identify($formData)
    {
        $formData['waiting_since'] = !empty($formData['waiting_since']) ?
            DateTime::createFromFormat('d/m/Y', $formData['waiting_since']) : $formData['waiting_since'];
        $formData['start_dt'] = !empty($formData['start_dt']) ?
            DateTime::createFromFormat('d/m/Y', $formData['start_dt']) : $formData['start_dt'];
        $formData['end_dt'] = !empty($formData['end_dt']) ?
            DateTime::createFromFormat('d/m/Y', $formData['end_dt']) : $formData['end_dt'];
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
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['manager_id'], 'Staff'));
        $rules->add($rules->existsIn(['sponsor_id'], 'Sponsors'));
        $rules->add($rules->existsIn(['waiting_on_id'], 'Staff'));
        $rules->add($rules->existsIn(['status_id'], 'Lov'));
        $rules->add($rules->existsIn(['priority_id'], 'Lov'));
        $rules->add($rules->existsIn(['system_user_id'], 'Users'));
        $rules->add($rules->existsIn(['annotation_id'], 'Annotations'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['price_id'], 'Prices'));
        $rules->add($rules->existsIn(['sub_status_id'], 'SubStatuses'));

        return $rules;
    }
}