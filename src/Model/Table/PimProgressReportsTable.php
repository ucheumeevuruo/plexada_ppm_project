<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimProgressReports Model
 *
 * @property \App\Model\Table\PimsTable&\Cake\ORM\Association\BelongsTo $Pims
 *
 * @method \App\Model\Entity\PimProgressReport get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimProgressReport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimProgressReport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimProgressReport|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimProgressReport saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimProgressReport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimProgressReport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimProgressReport findOrCreate($search, callable $callback = null, $options = [])
 */
class PimProgressReportsTable extends Table
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

        $this->setTable('pim_progress_reports');
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
            ->date('date_disbursed')
            ->requirePresence('date_disbursed', 'create')
            ->notEmptyDate('date_disbursed');

        $validator
            ->scalar('cumulated_disbursement')
            ->maxLength('cumulated_disbursement', 120)
            ->requirePresence('cumulated_disbursement', 'create')
            ->notEmptyString('cumulated_disbursement');

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
