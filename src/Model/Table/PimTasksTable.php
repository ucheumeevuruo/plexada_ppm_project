<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimTasks Model
 *
 * @property \App\Model\Table\PimsTable&\Cake\ORM\Association\BelongsTo $Pims
 *
 * @method \App\Model\Entity\PimTask get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimTask newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimTask[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimTask|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimTask saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimTask patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimTask[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimTask findOrCreate($search, callable $callback = null, $options = [])
 */
class PimTasksTable extends Table
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

        $this->setTable('pim_tasks');
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
            ->scalar('task')
            ->maxLength('task', 120)
            ->requirePresence('task', 'create')
            ->notEmptyString('task');

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
