<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimMdas Model
 *
 * @property \App\Model\Table\PimsTable&\Cake\ORM\Association\HasMany $Pims
 *
 * @method \App\Model\Entity\PimMda get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimMda newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimMda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimMda|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimMda saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimMda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimMda[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimMda findOrCreate($search, callable $callback = null, $options = [])
 */
class PimMdasTable extends Table
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

        $this->setTable('pim_mdas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Pims', [
            'foreignKey' => 'pim_mda_id',
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
            ->scalar('mda')
            ->maxLength('mda', 120)
            ->requirePresence('mda', 'create')
            ->notEmptyString('mda');

        $validator
            ->scalar('revision_committee_rep_information')
            ->maxLength('revision_committee_rep_information', 500)
            ->requirePresence('revision_committee_rep_information', 'create')
            ->notEmptyString('revision_committee_rep_information');

        return $validator;
    }
}
