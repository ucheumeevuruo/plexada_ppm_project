<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pads Model
 *
 * @method \App\Model\Entity\Pad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pad findOrCreate($search, callable $callback = null, $options = [])
 */
class PadsTable extends Table
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

        $this->setTable('pads');
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->scalar('brief')
            ->maxLength('brief', 255)
            ->requirePresence('brief', 'create')
            ->notEmptyString('brief');

        $validator
            ->scalar('key_players')
            ->maxLength('key_players', 120)
            ->requirePresence('key_players', 'create')
            ->notEmptyString('key_players');

        $validator
            ->scalar('project_type')
            ->maxLength('project_type', 120)
            ->requirePresence('project_type', 'create')
            ->notEmptyString('project_type');

        $validator
            ->scalar('project_target')
            ->maxLength('project_target', 120)
            ->requirePresence('project_target', 'create')
            ->notEmptyString('project_target');

        $validator
            ->scalar('project_details')
            ->maxLength('project_details', 500)
            ->requirePresence('project_details', 'create')
            ->notEmptyString('project_details');

        $validator
            ->requirePresence('project_amount', 'create')
            ->notEmptyString('project_amount');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 120)
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

        $validator
            ->integer('funding_agency')
            ->requirePresence('funding_agency', 'create')
            ->notEmptyString('funding_agency');

        $validator
            ->scalar('conditions')
            ->maxLength('conditions', 255)
            ->requirePresence('conditions', 'create')
            ->notEmptyString('conditions');

        $validator
            ->date('deadline')
            ->requirePresence('deadline', 'create')
            ->notEmptyDate('deadline');

        $validator
            ->scalar('heirarchy_of_objectiv')
            ->maxLength('heirarchy_of_objectiv', 120)
            ->requirePresence('heirarchy_of_objectiv', 'create')
            ->notEmptyString('heirarchy_of_objectiv');

        $validator
            ->scalar('objective_sub_category')
            ->maxLength('objective_sub_category', 120)
            ->requirePresence('objective_sub_category', 'create')
            ->notEmptyString('objective_sub_category');

        $validator
            ->scalar('specific_oobjective')
            ->maxLength('specific_oobjective', 500)
            ->requirePresence('specific_oobjective', 'create')
            ->notEmptyString('specific_oobjective');

        $validator
            ->scalar('first_oindicator')
            ->maxLength('first_oindicator', 120)
            ->requirePresence('first_oindicator', 'create')
            ->notEmptyString('first_oindicator');

        $validator
            ->scalar('second_oindicator')
            ->maxLength('second_oindicator', 120)
            ->requirePresence('second_oindicator', 'create')
            ->notEmptyString('second_oindicator');

        $validator
            ->scalar('third_oindicator')
            ->maxLength('third_oindicator', 120)
            ->requirePresence('third_oindicator', 'create')
            ->notEmptyString('third_oindicator');

        $validator
            ->scalar('forth_oindicator')
            ->maxLength('forth_oindicator', 120)
            ->requirePresence('forth_oindicator', 'create')
            ->notEmptyString('forth_oindicator');

        $validator
            ->scalar('fifth_oindicator')
            ->maxLength('fifth_oindicator', 120)
            ->requirePresence('fifth_oindicator', 'create')
            ->notEmptyString('fifth_oindicator');

        $validator
            ->scalar('sixth_oindicator')
            ->maxLength('sixth_oindicator', 120)
            ->requirePresence('sixth_oindicator', 'create')
            ->notEmptyString('sixth_oindicator');

        $validator
            ->scalar('m_e_omethod')
            ->maxLength('m_e_omethod', 120)
            ->requirePresence('m_e_omethod', 'create')
            ->notEmptyString('m_e_omethod');

        $validator
            ->scalar('critical_oassumptions')
            ->maxLength('critical_oassumptions', 500)
            ->requirePresence('critical_oassumptions', 'create')
            ->notEmptyString('critical_oassumptions');

        $validator
            ->scalar('specific_aobjective')
            ->maxLength('specific_aobjective', 500)
            ->requirePresence('specific_aobjective', 'create')
            ->notEmptyString('specific_aobjective');

        $validator
            ->scalar('first_aindicator')
            ->maxLength('first_aindicator', 120)
            ->requirePresence('first_aindicator', 'create')
            ->notEmptyString('first_aindicator');

        $validator
            ->scalar('second_aindicator')
            ->maxLength('second_aindicator', 120)
            ->requirePresence('second_aindicator', 'create')
            ->notEmptyString('second_aindicator');

        $validator
            ->scalar('third_aindicator')
            ->maxLength('third_aindicator', 120)
            ->requirePresence('third_aindicator', 'create')
            ->notEmptyString('third_aindicator');

        $validator
            ->scalar('forth_aindicator')
            ->maxLength('forth_aindicator', 120)
            ->requirePresence('forth_aindicator', 'create')
            ->notEmptyString('forth_aindicator');

        $validator
            ->scalar('fifth_aindicator')
            ->maxLength('fifth_aindicator', 120)
            ->requirePresence('fifth_aindicator', 'create')
            ->notEmptyString('fifth_aindicator');

        $validator
            ->scalar('sixth_aindicator')
            ->maxLength('sixth_aindicator', 120)
            ->requirePresence('sixth_aindicator', 'create')
            ->notEmptyString('sixth_aindicator');

        $validator
            ->scalar('m_e_amethod')
            ->maxLength('m_e_amethod', 120)
            ->requirePresence('m_e_amethod', 'create')
            ->notEmptyString('m_e_amethod');

        $validator
            ->scalar('critical_aassumptions')
            ->maxLength('critical_aassumptions', 120)
            ->requirePresence('critical_aassumptions', 'create')
            ->notEmptyString('critical_aassumptions');

        $validator
            ->scalar('specific_mobjectives')
            ->maxLength('specific_mobjectives', 500)
            ->requirePresence('specific_mobjectives', 'create')
            ->notEmptyString('specific_mobjectives');

        $validator
            ->scalar('first_mindicator')
            ->maxLength('first_mindicator', 120)
            ->requirePresence('first_mindicator', 'create')
            ->notEmptyString('first_mindicator');

        $validator
            ->scalar('second_mindicator')
            ->maxLength('second_mindicator', 120)
            ->requirePresence('second_mindicator', 'create')
            ->notEmptyString('second_mindicator');

        $validator
            ->scalar('third_mindicator')
            ->maxLength('third_mindicator', 120)
            ->requirePresence('third_mindicator', 'create')
            ->notEmptyString('third_mindicator');

        $validator
            ->scalar('forth_mindicator')
            ->maxLength('forth_mindicator', 120)
            ->requirePresence('forth_mindicator', 'create')
            ->notEmptyString('forth_mindicator');

        $validator
            ->scalar('fifth_mindicator')
            ->maxLength('fifth_mindicator', 120)
            ->requirePresence('fifth_mindicator', 'create')
            ->notEmptyString('fifth_mindicator');

        $validator
            ->scalar('sixth_mindicator')
            ->maxLength('sixth_mindicator', 120)
            ->requirePresence('sixth_mindicator', 'create')
            ->notEmptyString('sixth_mindicator');

        $validator
            ->scalar('m_e_mmethod')
            ->maxLength('m_e_mmethod', 120)
            ->requirePresence('m_e_mmethod', 'create')
            ->notEmptyString('m_e_mmethod');

        $validator
            ->scalar('critical_massumptions')
            ->maxLength('critical_massumptions', 255)
            ->requirePresence('critical_massumptions', 'create')
            ->notEmptyString('critical_massumptions');

        $validator
            ->scalar('file_upload')
            ->maxLength('file_upload', 255)
            ->requirePresence('file_upload', 'create')
            ->notEmptyFile('file_upload');

        return $validator;
    }
}