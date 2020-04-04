<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectDetailsOld Model
 *
 * @property \App\Model\Table\VendorsTable&\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\PersonelTable&\Cake\ORM\Association\BelongsTo $Personel
 * @property \App\Model\Table\SponsorsTable&\Cake\ORM\Association\BelongsTo $Sponsors
* // * @property \App\Model\Table\SystemUsersTable&\Cake\ORM\Association\BelongsTo $SystemUsers
 *
 * @method \App\Model\Entity\ProjectDetailOld get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectDetailOld newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectDetailOld[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectDetailOld|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectDetailOld saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectDetailOld patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectDetailOld[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectDetailOld findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectDetailsTableOld extends Table
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

        $this->setTable('project_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Vendors', [
            'foreignKey' => 'vendor_id',
        ]);
        $this->belongsTo('Personel', [
            'foreignKey' => 'manager_id',
        ]);
        $this->belongsTo('Sponsors', [
            'foreignKey' => 'sponsor_id',
        ]);
        $this->belongsTo('Lov', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasOne('Prices', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('Activities', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT'
        ]);
//        $this->hasOne('ProjectObjectives', [
//            'foreignKey' => 'project_id',
//            'joinType' => 'LEFT'
//        ]);
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
            ->scalar('Name')
            ->maxLength('Name', 150)
            ->allowEmptyString('Name');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 600)
            ->allowEmptyString('Description');

        $validator
            ->scalar('location')
            ->maxLength('location', 150)
            ->allowEmptyString('location');

        $validator
            ->scalar('waiting_since')
            ->maxLength('waiting_since', 70)
            ->allowEmptyString('waiting_since');

        $validator
            ->date('waiting_on')
            ->allowEmptyDate('waiting_on');

        $validator
            ->date('start_dt')
            ->allowEmptyDate('start_dt');

        $validator
            ->date('end_dt')
            ->allowEmptyDate('end_dt');

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
        $rules->add($rules->existsIn(['vendor_id'], 'Vendors'));
        $rules->add($rules->existsIn(['manager_id'], 'Personel'));
        $rules->add($rules->existsIn(['sponsor_id'], 'Sponsors'));
        $rules->add($rules->existsIn(['status_id'], 'Lov'));
//        $rules->add($rules->existsIn(['system_user_id'], 'SystemUsers'));

        return $rules;
    }
}
