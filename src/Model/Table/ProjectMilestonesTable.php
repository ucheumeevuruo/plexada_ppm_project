<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectMilestones Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\ProjectMilestone get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectMilestone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectMilestone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectMilestone|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectMilestone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectMilestone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectMilestone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectMilestone findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectMilestonesTable extends Table
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

        $this->setTable('project_milestones');
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
            ->scalar('status')
            ->maxLength('status', 100)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('description')
            ->maxLength('description', 500)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmptyDateTime('created_at');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 30)
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

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
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
