<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Activities Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\SystemUsersTable&\Cake\ORM\Association\BelongsTo $SystemUsers
 *
 * @method \App\Model\Entity\ActivityOld get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActivityOld newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActivityOld[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActivityOld|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivityOld saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivityOld patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActivityOld[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActivityOld findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActivitiesTableOld extends Table
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

        $this->setTable('activities');
        $this->setDisplayField('activity_id');
        $this->setPrimaryKey('activity_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProjectDetailsOld', [
            'foreignKey' => 'id',
        ]);

        $this->belongsTo('Lov', [
            'foreignKey' => 'priority_id',
        ]);

        $this->belongsTo('Personel', [
            'foreignKey' => 'assigned_to',
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
            ->nonNegativeInteger('activity_id')
            ->allowEmptyString('activity_id', null, 'create');

        $validator
            ->scalar('current_activity')
            ->maxLength('current_activity', 300)
            ->allowEmptyString('current_activity');

        $validator
            ->scalar('waiting_on')
            ->maxLength('waiting_on', 70)
            ->allowEmptyString('waiting_on');

        $validator
            ->date('waiting_since')
            ->allowEmptyDate('waiting_since');

        $validator
            ->scalar('next_activity')
            ->maxLength('next_activity', 300)
            ->allowEmptyString('next_activity');

        $validator
            ->integer('percentage_completion')
            ->allowEmptyString('percentage_completion');

        $validator
            ->scalar('description')
            ->maxLength('description', 300)
            ->allowEmptyString('description');

//        $validator
//            ->scalar('priority')
//            ->maxLength('priority', 30)
//            ->allowEmptyString('priority');

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
        $rules->add($rules->existsIn(['project_id'], 'ProjectDetailsOld'));
        $rules->add($rules->existsIn(['priority_id'], 'Lov'));
        $rules->add($rules->existsIn(['assigned_to'], 'Personel'));
//        $rules->add($rules->existsIn(['system_user_id'], 'SystemUsers'));

        return $rules;
    }
}
