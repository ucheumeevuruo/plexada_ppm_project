<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pads Model
 *
 * @property \App\Model\Table\PadAchievementsTable&\Cake\ORM\Association\HasMany $PadAchievements
 * @property \App\Model\Table\PadActivitiesMeansTable&\Cake\ORM\Association\HasMany $PadActivitiesMeans
 * @property \App\Model\Table\PadCostingsTable&\Cake\ORM\Association\HasMany $PadCostings
 * @property \App\Model\Table\PadCreditFacilityAgreementsTable&\Cake\ORM\Association\HasMany $PadCreditFacilityAgreements
 * @property \App\Model\Table\PadObjectivesTable&\Cake\ORM\Association\HasMany $PadObjectives
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

        $this->hasMany('PadAchievements', [
            'foreignKey' => 'pad_id',
        ]);
        $this->hasMany('PadActivitiesMeans', [
            'foreignKey' => 'pad_id',
        ]);
        $this->hasMany('PadCostings', [
            'foreignKey' => 'pad_id',
        ]);
        $this->hasMany('PadCreditFacilityAgreements', [
            'foreignKey' => 'pad_id',
        ]);
        $this->hasMany('PadObjectives', [
            'foreignKey' => 'pad_id',
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
            ->allowEmptyDate('date');

        $validator
            ->scalar('brief')
            ->maxLength('brief', 100)
            ->requirePresence('brief', 'create')
            ->notEmptyString('brief');

        $validator
            ->scalar('key_players')
            ->maxLength('key_players', 100)
            ->requirePresence('key_players', 'create')
            ->notEmptyString('key_players');

        $validator
            ->scalar('project_type')
            ->maxLength('project_type', 100)
            ->requirePresence('project_type', 'create')
            ->notEmptyString('project_type');

        $validator
            ->scalar('project_target')
            ->maxLength('project_target', 100)
            ->requirePresence('project_target', 'create')
            ->notEmptyString('project_target');

        $validator
            ->scalar('details')
            ->maxLength('details', 500)
            ->requirePresence('details', 'create')
            ->notEmptyString('details');

        return $validator;
    }
}
