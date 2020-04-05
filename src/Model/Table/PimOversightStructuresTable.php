<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimOversightStructures Model
 *
 * @property \App\Model\Table\PimsTable&\Cake\ORM\Association\BelongsTo $Pims
 *
 * @method \App\Model\Entity\PimOversightStructure get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimOversightStructure newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimOversightStructure[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimOversightStructure|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimOversightStructure saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimOversightStructure patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimOversightStructure[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimOversightStructure findOrCreate($search, callable $callback = null, $options = [])
 */
class PimOversightStructuresTable extends Table
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

        $this->setTable('pim_oversight_structures');
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
            ->scalar('oversight_level')
            ->maxLength('oversight_level', 100)
            ->requirePresence('oversight_level', 'create')
            ->notEmptyString('oversight_level');

        $validator
            ->scalar('oversight_agency_mda')
            ->maxLength('oversight_agency_mda', 100)
            ->requirePresence('oversight_agency_mda', 'create')
            ->notEmptyString('oversight_agency_mda');

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
