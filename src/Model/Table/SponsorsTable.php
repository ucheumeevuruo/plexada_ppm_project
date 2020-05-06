<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sponsors Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProjectDetailsTable&\Cake\ORM\Association\HasMany $ProjectDetails
 *
 * @method \App\Model\Entity\Sponsor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sponsor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sponsor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sponsor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sponsor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SponsorsTable extends Table
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

        $this->setTable('sponsors');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'system_user_id',
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'first_name',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('ProjectDetails', [
            'foreignKey' => 'sponsor_id',
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
            ->scalar('last_name')
            ->maxLength('last_name', 150)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 150)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('other_names')
            ->maxLength('other_names', 150)
            ->allowEmptyString('other_names');

        $validator
            ->scalar('role')
            ->maxLength('role', 150)
            ->allowEmptyString('role');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['system_user_id'], 'Users'));

        return $rules;
    }
}