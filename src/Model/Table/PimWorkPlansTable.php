<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimWorkPlans Model
 *
 * @property \App\Model\Table\PimsTable&\Cake\ORM\Association\BelongsTo $Pims
 *
 * @method \App\Model\Entity\PimWorkPlan get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimWorkPlan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimWorkPlan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimWorkPlan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimWorkPlan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimWorkPlan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimWorkPlan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimWorkPlan findOrCreate($search, callable $callback = null, $options = [])
 */
class PimWorkPlansTable extends Table
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

        $this->setTable('pim_work_plans');
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
            ->scalar('parties')
            ->maxLength('parties', 120)
            ->requirePresence('parties', 'create')
            ->notEmptyString('parties');

        $validator
            ->scalar('responsibilities')
            ->maxLength('responsibilities', 500)
            ->requirePresence('responsibilities', 'create')
            ->notEmptyString('responsibilities');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDate('end_date');

        $validator
            ->requirePresence('financial_cost', 'create')
            ->notEmptyString('financial_cost');

        $validator
            ->scalar('targets')
            ->maxLength('targets', 120)
            ->requirePresence('targets', 'create')
            ->notEmptyString('targets');

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
