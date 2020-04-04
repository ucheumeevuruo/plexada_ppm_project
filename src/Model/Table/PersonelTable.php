<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personel Model
 *
 * @property \App\Model\Table\SystemUsersTable&\Cake\ORM\Association\BelongsTo $SystemUsers
 *
 * @method \App\Model\Entity\Personel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Personel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Personel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Personel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Personel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Personel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Personel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonelTable extends Table
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

        $this->setTable('personel');
        $this->setDisplayField('Last_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

//        $this->belongsTo('SystemUsers', [
//            'foreignKey' => 'system_user_id',
//        ]);
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
            ->scalar('Last_name')
            ->maxLength('Last_name', 150)
            ->allowEmptyString('Last_name');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 150)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('Other_names')
            ->maxLength('Other_names', 150)
            ->allowEmptyString('Other_names');

        $validator
            ->scalar('role')
            ->maxLength('role', 150)
            ->allowEmptyString('role');

        $validator
            ->scalar('Address')
            ->maxLength('Address', 250)
            ->allowEmptyString('Address');

        $validator
            ->scalar('State')
            ->maxLength('State', 50)
            ->allowEmptyString('State');

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
//        $rules->add($rules->existsIn(['system_user_id'], 'SystemUsers'));

        return $rules;
    }
}
