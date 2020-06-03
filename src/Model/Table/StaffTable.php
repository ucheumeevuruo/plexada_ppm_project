<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staff Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Staff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staff newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Staff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staff|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staff findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StaffTable extends Table
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

        $this->setTable('staff');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'system_user_id',
        ]);

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
        ]);
    }

    public function findByName(Query $query, $options)
    {
        $name = $options['name'];

        if(!is_null($name))
        {
            $query->where(function ($exp, Query $q) use ($name){
                return $exp->like('Users.username', "%$name%");
            });
        }
        return $query;
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
            ->scalar('last_name')
            ->maxLength('last_name', 150)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 150)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('other_names')
            ->maxLength('other_names', 150)
            ->allowEmptyString('other_names');

        $validator
            ->nonNegativeInteger('role_id')
            ->maxLength('role_id', 11)
            ->requirePresence('role_id', 'create')
            ->notEmptyString('role_id');

        $validator
            ->scalar('address')
            ->maxLength('address', 250)
            ->allowEmptyString('address');

        $validator
            ->scalar('state')
            ->maxLength('state', 50)
            ->allowEmptyString('state');

        $validator
            ->scalar('country')
            ->maxLength('country', 50)
            ->allowEmptyString('country');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('phone_no')
            ->maxLength('phone_no', 30)
            ->allowEmptyString('phone_no');

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
        $rules->add($rules->isUnique(['first_name', 'last_name']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['system_user_id'], 'Users'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
