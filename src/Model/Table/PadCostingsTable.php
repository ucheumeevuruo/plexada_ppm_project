<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PadCostings Model
 *
 * @property \App\Model\Table\PadsTable&\Cake\ORM\Association\BelongsTo $Pads
 *
 * @method \App\Model\Entity\PadCosting get($primaryKey, $options = [])
 * @method \App\Model\Entity\PadCosting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PadCosting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PadCosting|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PadCosting saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PadCosting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PadCosting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PadCosting findOrCreate($search, callable $callback = null, $options = [])
 */
class PadCostingsTable extends Table
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

        $this->setTable('pad_costings');
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
            ->scalar('project_amount')
            ->maxLength('project_amount', 255)
            ->requirePresence('project_amount', 'create')
            ->notEmptyString('project_amount');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 255)
            ->requirePresence('currency', 'create')
            ->notEmptyString('currency');

        $validator
            ->date('due_date')
            ->requirePresence('due_date', 'create')
            ->notEmptyDate('due_date');

        $validator
            ->scalar('expected_outcome')
            ->maxLength('expected_outcome', 255)
            ->requirePresence('expected_outcome', 'create')
            ->notEmptyString('expected_outcome');

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
