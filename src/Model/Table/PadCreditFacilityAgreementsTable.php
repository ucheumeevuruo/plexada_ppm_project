<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PadCreditFacilityAgreements Model
 *
 * @property \App\Model\Table\PadsTable&\Cake\ORM\Association\BelongsTo $Pads
 *
 * @method \App\Model\Entity\PadCreditFacilityAgreement get($primaryKey, $options = [])
 * @method \App\Model\Entity\PadCreditFacilityAgreement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PadCreditFacilityAgreement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PadCreditFacilityAgreement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PadCreditFacilityAgreement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PadCreditFacilityAgreement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PadCreditFacilityAgreement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PadCreditFacilityAgreement findOrCreate($search, callable $callback = null, $options = [])
 */
class PadCreditFacilityAgreementsTable extends Table
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

        $this->setTable('pad_credit_facility_agreements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pads', [
            'foreignKey' => 'pad_id',
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
            ->scalar('funding_agency')
            ->maxLength('funding_agency', 100)
            ->requirePresence('funding_agency', 'create')
            ->notEmptyString('funding_agency');

        $validator
            ->scalar('conditions')
            ->maxLength('conditions', 255)
            ->requirePresence('conditions', 'create')
            ->notEmptyString('conditions');

        $validator
            ->date('deadline')
            ->requirePresence('deadline', 'create')
            ->notEmptyDate('deadline');

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
        $rules->add($rules->existsIn(['pad_id'], 'Pads'));

        return $rules;
    }
}
