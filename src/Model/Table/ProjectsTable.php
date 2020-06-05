<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\ActivitiesTable&\Cake\ORM\Association\HasMany $Activities
 * @property \App\Model\Table\AnnotationsTable&\Cake\ORM\Association\HasMany $Annotations
 * @property \App\Model\Table\MilestonesTable&\Cake\ORM\Association\HasMany $Milestones
 * @property \App\Model\Table\ObjectivesTable&\Cake\ORM\Association\HasMany $Objectives
 * @property \App\Model\Table\PricesTable&\Cake\ORM\Association\HasMany $Prices
 * @property \App\Model\Table\ProjectDetailsTable&\Cake\ORM\Association\HasMany $ProjectDetails
 * @property \App\Model\Table\ProjectFundingsTable&\Cake\ORM\Association\HasMany $ProjectFundings
 * @property \App\Model\Table\ProjectMilestonesTable&\Cake\ORM\Association\HasMany $ProjectMilestones
 * @property \App\Model\Table\ProjectObjectivesTable&\Cake\ORM\Association\HasMany $ProjectObjectives
 * @property \App\Model\Table\RiskIssuesTable&\Cake\ORM\Association\HasMany $RiskIssues
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Activities', [
            'foreignKey' => 'project_id',
            'joinType' => 'RIGHT',
        ]);
        $this->hasMany('Annotations', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('Milestones', [
            'foreignKey' => 'project_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('Objectives', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasOne('Prices', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasOne('ProjectDetails', [
            'foreignKey' => 'project_id',
            'joinType' => 'RIGHT'
        ]);
        $this->hasOne('ProjectFundings', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasOne('Pims', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasOne('Pads', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('ProjectMilestones', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('ProjectObjectives', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('RiskIssues', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('Documents', [
            'foreignKey' => 'project_id',
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'Task_name',
        ]);
        $this->hasOne('ProjectSponsors', [
            'foreignKey' => 'project_id',
            'conditions' => ['ProjectSponsors.sponsor_type_id' => '13'],
        ]);
        $this->hasOne('ProjectDonors', [
            'className' => 'ProjectSponsors',
            'foreignKey' => 'project_id',
            'conditions' => ['ProjectDonors.sponsor_type_id' => '14'],
        ]);
        $this->hasOne('ProjectMdas', [
            'className' => 'ProjectSponsors',
            'foreignKey' => 'project_id',
            'conditions' => ['ProjectMdas.sponsor_type_id' => '15'],
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
            ->scalar('introduction')
            ->maxLength('introduction', 500)
            ->requirePresence('introduction', 'create')
            ->notEmptyString('introduction');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

//        $validator
//            ->requirePresence('cost', 'create')
//            ->notEmptyString('cost');

        return $validator;
    }

    public function findByProjectName(Query $query, $options)
    {
        $id = $options['id'];

        if(!is_null($id))
        {
            $query->where(function ($exp, Query $q) use ($id){
                return $exp->like('Projects.name', "%$id%");
            });
        }
        return $query;
    }
}