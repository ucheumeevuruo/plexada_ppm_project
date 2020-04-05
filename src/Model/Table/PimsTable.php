<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pims Model
 *
 * @property \App\Model\Table\PimApprovalsTable&\Cake\ORM\Association\BelongsTo $PimApprovals
 * @property \App\Model\Table\PimCategoriesTable&\Cake\ORM\Association\BelongsTo $PimCategories
 * @property \App\Model\Table\PimMdasTable&\Cake\ORM\Association\BelongsTo $PimMdas
 * @property \App\Model\Table\PimOversightStructuresTable&\Cake\ORM\Association\HasMany $PimOversightStructures
 * @property \App\Model\Table\PimProgressReportsTable&\Cake\ORM\Association\HasMany $PimProgressReports
 * @property \App\Model\Table\PimProjectActionPlansTable&\Cake\ORM\Association\HasMany $PimProjectActionPlans
 * @property \App\Model\Table\PimProjectComponentsTable&\Cake\ORM\Association\HasMany $PimProjectComponents
 * @property \App\Model\Table\PimTasksTable&\Cake\ORM\Association\HasMany $PimTasks
 * @property \App\Model\Table\PimTotalExpendituresTable&\Cake\ORM\Association\HasMany $PimTotalExpenditures
 * @property \App\Model\Table\PimWorkPlansTable&\Cake\ORM\Association\HasMany $PimWorkPlans
 *
 * @method \App\Model\Entity\Pim get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pim newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pim[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pim|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pim saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pim patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pim[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pim findOrCreate($search, callable $callback = null, $options = [])
 */
class PimsTable extends Table
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

        $this->setTable('pims');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PimApprovals', [
            'foreignKey' => 'pim_approval_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PimCategories', [
            'foreignKey' => 'pim_category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PimMdas', [
            'foreignKey' => 'pim_mda_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PimOversightStructures', [
            'foreignKey' => 'pim_id',
        ]);
        $this->hasMany('PimProgressReports', [
            'foreignKey' => 'pim_id',
        ]);
        $this->hasMany('PimProjectActionPlans', [
            'foreignKey' => 'pim_id',
        ]);
        $this->hasMany('PimProjectComponents', [
            'foreignKey' => 'pim_id',
        ]);
        $this->hasMany('PimTasks', [
            'foreignKey' => 'pim_id',
        ]);
        $this->hasMany('PimTotalExpenditures', [
            'foreignKey' => 'pim_id',
        ]);
        $this->hasMany('PimWorkPlans', [
            'foreignKey' => 'pim_id',
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
            ->notEmptyDate('date');

        $validator
            ->scalar('brief')
            ->maxLength('brief', 500)
            ->requirePresence('brief', 'create')
            ->notEmptyString('brief');

        $validator
            ->scalar('funding_agency')
            ->maxLength('funding_agency', 100)
            ->requirePresence('funding_agency', 'create')
            ->notEmptyString('funding_agency');

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
        $rules->add($rules->existsIn(['pim_approval_id'], 'PimApprovals'));
        $rules->add($rules->existsIn(['pim_category_id'], 'PimCategories'));
        $rules->add($rules->existsIn(['pim_mda_id'], 'PimMdas'));

        return $rules;
    }
}
