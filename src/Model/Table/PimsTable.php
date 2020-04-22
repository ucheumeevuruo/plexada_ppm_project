<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pims Model
 *
 * @property &\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\Pim get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pim newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pim[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pim|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pim saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pim patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pim[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pim findOrCreate($search, callable $callback = null, $options = [])
 */
class PimsTable extends Table
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

        $this->setTable('pims');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('brief')
            ->maxLength('brief', 500)
            ->requirePresence('brief', 'create')
            ->notEmptyString('brief');

        $validator
            ->scalar('funding_agency')
            ->maxLength('funding_agency', 100)
            ->requirePresence('funding_agency', 'create')
            ->notEmptyString('funding_agency');

        $validator
            ->scalar('activities_achievement')
            ->maxLength('activities_achievement', 120)
            ->requirePresence('activities_achievement', 'create')
            ->notEmptyString('activities_achievement');

        $validator
            ->scalar('risks_mitigation')
            ->maxLength('risks_mitigation', 120)
            ->requirePresence('risks_mitigation', 'create')
            ->notEmptyString('risks_mitigation');

        $validator
            ->scalar('activity_next_semester')
            ->maxLength('activity_next_semester', 500)
            ->requirePresence('activity_next_semester', 'create')
            ->notEmptyString('activity_next_semester');

        $validator
            ->requirePresence('total_expenditure', 'create')
            ->notEmptyString('total_expenditure');

        $validator
            ->scalar('oversight_level')
            ->maxLength('oversight_level', 100)
            ->requirePresence('oversight_level', 'create')
            ->notEmptyString('oversight_level');

        $validator
            ->scalar('oversight_agency_mda')
            ->maxLength('oversight_agency_mda', 100)
            ->requirePresence('oversight_agency_mda', 'create')
            ->notEmptyString('oversight_agency_mda');

        $validator
            ->scalar('mda')
            ->maxLength('mda', 120)
            ->requirePresence('mda', 'create')
            ->notEmptyString('mda');

        $validator
            ->scalar('rev_commitee_rep_information')
            ->maxLength('rev_commitee_rep_information', 500)
            ->requirePresence('rev_commitee_rep_information', 'create')
            ->notEmptyString('rev_commitee_rep_information');

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
            ->requirePresence('approvers_date', 'create')
            ->notEmptyDate('approvers_date');

        $validator
            ->scalar('signed_mou')
            ->maxLength('signed_mou', 255)
            ->requirePresence('signed_mou', 'create')
            ->notEmptyString('signed_mou');

        $validator
            ->scalar('adopted_minutes')
            ->maxLength('adopted_minutes', 255)
            ->requirePresence('adopted_minutes', 'create')
            ->notEmptyString('adopted_minutes');

        $validator
            ->scalar('financial_management')
            ->maxLength('financial_management', 255)
            ->requirePresence('financial_management', 'create')
            ->notEmptyString('financial_management');

        $validator
            ->scalar('financial_template')
            ->maxLength('financial_template', 255)
            ->requirePresence('financial_template', 'create')
            ->notEmptyString('financial_template');

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

        $validator
            ->scalar('category')
            ->maxLength('category', 120)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->scalar('owner')
            ->maxLength('owner', 120)
            ->requirePresence('owner', 'create')
            ->notEmptyString('owner');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 100)
            ->requirePresence('currency', 'create')
            ->notEmptyString('currency');

        $validator
            ->requirePresence('disbursed_amount', 'create')
            ->notEmptyString('disbursed_amount');

        $validator
            ->date('exp_output_date')
            ->requirePresence('exp_output_date', 'create')
            ->notEmptyDate('exp_output_date');

        $validator
            ->scalar('task')
            ->maxLength('task', 120)
            ->requirePresence('task', 'create')
            ->notEmptyString('task');

        $validator
            ->scalar('progress_category')
            ->maxLength('progress_category', 120)
            ->requirePresence('progress_category', 'create')
            ->notEmptyString('progress_category');

        $validator
            ->scalar('progress_currency')
            ->maxLength('progress_currency', 100)
            ->requirePresence('progress_currency', 'create')
            ->notEmptyString('progress_currency');

        $validator
            ->requirePresence('amount_credit_allocation', 'create')
            ->notEmptyString('amount_credit_allocation');

        $validator
            ->scalar('disbursed_current_semester')
            ->maxLength('disbursed_current_semester', 120)
            ->requirePresence('disbursed_current_semester', 'create')
            ->notEmptyString('disbursed_current_semester');

        $validator
            ->date('date_disbursement')
            ->requirePresence('date_disbursement', 'create')
            ->notEmptyDate('date_disbursement');

        $validator
            ->scalar('cumulated_disbursment')
            ->maxLength('cumulated_disbursment', 120)
            ->requirePresence('cumulated_disbursment', 'create')
            ->notEmptyString('cumulated_disbursment');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
