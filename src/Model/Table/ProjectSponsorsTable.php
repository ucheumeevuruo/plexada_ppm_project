<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectSponsors Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\SponsorsTable&\Cake\ORM\Association\BelongsTo $Sponsors
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $Lov
 *
 * @method \App\Model\Entity\ProjectSponsor get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectSponsor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectSponsor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSponsor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectSponsor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectSponsor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSponsor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectSponsor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectSponsorsTable extends Table
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

        $this->setTable('project_sponsors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Sponsors', [
            'foreignKey' => 'sponsor_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SponsorTypes', [
            'className' => 'Lov',
            'foreignKey' => 'sponsor_type_id',
            'joinType' => 'INNER',
            'conditions' => ['SponsorTypes.lov_type' => 'sponsor_type']
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
        $rules->add($rules->existsIn(['sponsor_id'], 'Sponsors'));
        $rules->add($rules->existsIn(['sponsor_type_id'], 'SponsorTypes'));

        return $rules;
    }
}
