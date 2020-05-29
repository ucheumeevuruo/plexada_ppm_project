<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

/**
 * Plans Model
 *
 * @property \App\Model\Table\ActivitiesTable&\Cake\ORM\Association\BelongsTo $Activities
 *
 * @method \App\Model\Entity\Plan get($primaryKey, $options = [])
 * @method \App\Model\Entity\Plan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Plan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Plan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Plan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Plan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Plan findOrCreate($search, callable $callback = null, $options = [])
 */
class PlansTable extends Table
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

        $this->setTable('plans');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Activities', [
            'foreignKey' => 'activity_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
        ]);
        $this->belongsTo('Staff', [
            'foreignKey' => 'assigned_to_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('comment')
            ->maxLength('comment', 255)
            ->allowEmptyString('comment');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');


        $validator
            ->dateTime('start_date')
            ->allowEmptyDateTime('start_date');

        $validator
            ->dateTime('end_date')
            ->allowEmptyDateTime('end_date');

        return $validator;
    }

    public function identify($formData) {
        $formData['start_date'] = !empty($formData['start_date']) ?
            DateTime::createFromFormat('d/m/Y', $formData['start_date']) : $formData['start_date'];           
        $formData['end_date'] = !empty($formData['end_date']) ?
            DateTime::createFromFormat('d/m/Y', $formData['end_date']) : $formData['end_date'];                       
        return $formData;
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
        // $rules->add($rules->existsIn(['activity_id'], 'Activities'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['assigned_to_id'], 'Staff'));


        return $rules;
    }
}
