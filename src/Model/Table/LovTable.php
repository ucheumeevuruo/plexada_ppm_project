<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lov Model
 *
 * @property \App\Model\Table\SystemUsersTable&\Cake\ORM\Association\BelongsTo $SystemUsers
 *
 * @method \App\Model\Entity\Lov get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lov newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lov[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lov|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lov saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lov patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lov[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lov findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LovTable extends Table
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

        $this->setTable('lov');
        $this->setDisplayField('lov_value');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SystemUsers', [
            'className' =>'lov',
            'foreignKey' => 'system_user_id',
            'jointype' => 'INNER',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('lov_type')
            ->maxLength('lov_type', 150)
            ->allowEmptyString('lov_type');

        $validator
            ->scalar('lov_value')
            ->maxLength('lov_value', 150)
            ->allowEmptyString('lov_value');

        $validator
            ->dateTime('last_updated')
            ->allowEmptyDateTime('last_updated');

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
        $rules->add($rules->existsIn(['system_user_id'], 'SystemUsers'));

        return $rules;
    }
}
