<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PadActivitiesMeans Model
 *
 * @property \App\Model\Table\PadsTable&\Cake\ORM\Association\BelongsTo $Pads
 *
 * @method \App\Model\Entity\PadActivitiesMean get($primaryKey, $options = [])
 * @method \App\Model\Entity\PadActivitiesMean newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PadActivitiesMean[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PadActivitiesMean|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PadActivitiesMean saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PadActivitiesMean patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PadActivitiesMean[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PadActivitiesMean findOrCreate($search, callable $callback = null, $options = [])
 */
class PadActivitiesMeansTable extends Table
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

        $this->setTable('pad_activities_means');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pads', [
            'foreignKey' => 'pad_id',
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
            ->scalar('specific_objective')
            ->maxLength('specific_objective', 500)
            ->requirePresence('specific_objective', 'create')
            ->notEmptyString('specific_objective');

        $validator
            ->scalar('first_indicator')
            ->maxLength('first_indicator', 120)
            ->requirePresence('first_indicator', 'create')
            ->notEmptyString('first_indicator');

        $validator
            ->scalar('second_indicator')
            ->maxLength('second_indicator', 120)
            ->requirePresence('second_indicator', 'create')
            ->notEmptyString('second_indicator');

        $validator
            ->scalar('third_indicator')
            ->maxLength('third_indicator', 120)
            ->requirePresence('third_indicator', 'create')
            ->notEmptyString('third_indicator');

        $validator
            ->scalar('forth_indicator')
            ->maxLength('forth_indicator', 120)
            ->requirePresence('forth_indicator', 'create')
            ->notEmptyString('forth_indicator');

        $validator
            ->scalar('fifth_indicator')
            ->maxLength('fifth_indicator', 120)
            ->requirePresence('fifth_indicator', 'create')
            ->notEmptyString('fifth_indicator');

        $validator
            ->scalar('sixth_indicator')
            ->maxLength('sixth_indicator', 120)
            ->requirePresence('sixth_indicator', 'create')
            ->notEmptyString('sixth_indicator');

        $validator
            ->scalar('m_e_method')
            ->maxLength('m_e_method', 120)
            ->requirePresence('m_e_method', 'create')
            ->notEmptyString('m_e_method');

        $validator
            ->scalar('critical_assumptions')
            ->maxLength('critical_assumptions', 500)
            ->requirePresence('critical_assumptions', 'create')
            ->notEmptyString('critical_assumptions');

        $validator
            ->requirePresence('pad_file', 'create')
            ->notEmptyFile('pad_file');

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
        $rules->add($rules->existsIn(['pad_id'], 'Pads'));

        return $rules;
    }
}
