<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

/**
 * Milestones Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\ActivitiesTable&\Cake\ORM\Association\HasMany $Activities
 * @property \App\Model\Table\ProjectFundingsTable&\Cake\ORM\Association\HasMany $ProjectFundings
 *
 * @method \App\Model\Entity\Milestone get($primaryKey, $options = [])
 * @method \App\Model\Entity\Milestone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Milestone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Milestone|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Milestone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Milestone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Milestone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Milestone findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MilestonesTable extends Table
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

        $this->setTable('milestones');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'className' => 'Lov',
            'foreignKey' => 'status_id',
            'conditions' => ['Statuses.lov_type' => 'project_status']
        ]);
        $this->belongsTo('Lov', [
            'foreignKey' => 'status_id',
            'conditions' => ['Lov.lov_type' => 'project_status']
        ]);
        $this->belongsTo('Triggers', [
            'className' => 'Lov',
            'foreignKey' => 'trigger_id',
        ]);
        $this->hasMany('Activities', [
            'foreignKey' => 'milestone_id',
        ]);
        $this->hasMany('ProjectFundings', [
            'foreignKey' => 'projects',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('record_number')
            ->maxLength('record_number', 100)
            ->allowEmptyString('record_number');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('payment')
            ->maxLength('payment', 100)
            ->allowEmptyString('payment');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->allowEmptyString('description');

        $validator
            ->scalar('achievement')
            ->maxLength('achievement', 100)
            ->allowEmptyString('achievement');

        $validator
            ->date('completed_date')
            ->allowEmptyDate('completed_date');

        $validator
            ->date('expected_completion_date')
            ->allowEmptyDate('expected_completion_date');

        $validator
            ->date('start_date')
            ->allowEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->allowEmptyDate('end_date');

        return $validator;
    }

    public function identify($formData)
    {
        $formData['start_date'] = !empty($formData['start_date']) ?
            DateTime::createFromFormat('d/m/Y', $formData['start_date'])->format('Y-m-d') : $formData['start_date'];
        $formData['end_date'] = !empty($formData['end_date']) ?
            DateTime::createFromFormat('d/m/Y', $formData['end_date'])->format('Y-m-d') : $formData['end_date'];

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));
//        $rules->add($rules->existsIn(['trigger_id'], 'Lov'));

        return $rules;
    }
}