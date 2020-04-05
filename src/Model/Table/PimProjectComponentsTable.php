<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimProjectComponents Model
 *
 * @property \App\Model\Table\PimsTable&\Cake\ORM\Association\BelongsTo $Pims
 *
 * @method \App\Model\Entity\PimProjectComponent get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimProjectComponent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimProjectComponent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimProjectComponent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimProjectComponent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimProjectComponent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimProjectComponent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimProjectComponent findOrCreate($search, callable $callback = null, $options = [])
 */
class PimProjectComponentsTable extends Table
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

        $this->setTable('pim_project_components');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pims', [
            'foreignKey' => 'pim_id',
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
            ->scalar('activities_achievements')
            ->maxLength('activities_achievements', 120)
            ->requirePresence('activities_achievements', 'create')
            ->notEmptyString('activities_achievements');

        $validator
            ->scalar('risks_mitigations')
            ->maxLength('risks_mitigations', 120)
            ->requirePresence('risks_mitigations', 'create')
            ->notEmptyString('risks_mitigations');

        $validator
            ->scalar('activity_next_semester')
            ->maxLength('activity_next_semester', 500)
            ->requirePresence('activity_next_semester', 'create')
            ->notEmptyString('activity_next_semester');

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
        $rules->add($rules->existsIn(['pim_id'], 'Pims'));

        return $rules;
    }
}
