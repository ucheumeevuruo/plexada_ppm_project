<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Disburses Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\Disburse get($primaryKey, $options = [])
 * @method \App\Model\Entity\Disburse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Disburse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Disburse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disburse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disburse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Disburse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Disburse findOrCreate($search, callable $callback = null, $options = [])
 */
class DisbursesTable extends Table
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

        $this->setTable('disburses');
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
            ->scalar('source_of_funding')
            ->maxLength('source_of_funding', 100)
            ->requirePresence('source_of_funding', 'create')
            ->notEmptyString('source_of_funding');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

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
