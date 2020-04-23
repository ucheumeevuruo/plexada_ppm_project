<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectFundings Model
 *
 * @property \App\Model\Table\MilestonesTable&\Cake\ORM\Association\BelongsTo $Milestones
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\ProjectFunding get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectFunding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectFunding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectFunding|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectFunding saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectFunding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectFunding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectFunding findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectFundingsTable extends Table
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

        $this->setTable('project_fundings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Milestones', [
            'foreignKey' => 'milestone_id', # This cannot be the foreign key. Please change
            'joinType' => 'INNER',
        ]);
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
            ->integer('funding')
            ->requirePresence('funding', 'create')
            ->notEmptyString('funding');

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
        $rules->add($rules->existsIn(['milestone_id'], 'Milestones'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}