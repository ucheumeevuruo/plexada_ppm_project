<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimApprovers Model
 *
 * @method \App\Model\Entity\PimApprover get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimApprover newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimApprover[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimApprover|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimApprover saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimApprover patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimApprover[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimApprover findOrCreate($search, callable $callback = null, $options = [])
 */
class PimApproversTable extends Table
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

        $this->setTable('pim_approvers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('approvers_agency')
            ->maxLength('approvers_agency', 100)
            ->requirePresence('approvers_agency', 'create')
            ->notEmptyString('approvers_agency');

        $validator
            ->scalar('approvers_rep_information')
            ->maxLength('approvers_rep_information', 500)
            ->requirePresence('approvers_rep_information', 'create')
            ->notEmptyString('approvers_rep_information');

        $validator
            ->date('approvers_date')
            ->allowEmptyDate('approvers_date');

        $validator
            ->requirePresence('signed_mou', 'create')
            ->notEmptyString('signed_mou');

        $validator
            ->requirePresence('adopted_minutes', 'create')
            ->notEmptyString('adopted_minutes');

        $validator
            ->requirePresence('financial_management', 'create')
            ->notEmptyString('financial_management');

        $validator
            ->requirePresence('financial_template', 'create')
            ->notEmptyString('financial_template');

        return $validator;
    }
}
