<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimProjectActionPlans Model
 *
 * @property \App\Model\Table\PimsTable&\Cake\ORM\Association\BelongsTo $Pims
 *
 * @method \App\Model\Entity\PimProjectActionPlan get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimProjectActionPlan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimProjectActionPlan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimProjectActionPlan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimProjectActionPlan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimProjectActionPlan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimProjectActionPlan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimProjectActionPlan findOrCreate($search, callable $callback = null, $options = [])
 */
class PimProjectActionPlansTable extends Table
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

        $this->setTable('pim_project_action_plans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pims', [
            'foreignKey' => 'pim_id',
            'joinType' => 'INNER',
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
            ->scalar('activities')
            ->maxLength('activities', 500)
            ->requirePresence('activities', 'create')
            ->notEmptyString('activities');

        $validator
            ->scalar('action')
            ->maxLength('action', 100)
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

        $validator
            ->scalar('responsible_party')
            ->maxLength('responsible_party', 100)
            ->requirePresence('responsible_party', 'create')
            ->notEmptyString('responsible_party');

        $validator
            ->date('plan_start_date')
            ->requirePresence('plan_start_date', 'create')
            ->notEmptyDate('plan_start_date');

        $validator
            ->date('plan_end_date')
            ->requirePresence('plan_end_date', 'create')
            ->notEmptyDate('plan_end_date');

        $validator
            ->scalar('dependency')
            ->maxLength('dependency', 500)
            ->requirePresence('dependency', 'create')
            ->notEmptyString('dependency');

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
        $rules->add($rules->existsIn(['pim_id'], 'Pims'));

        return $rules;
    }
}
