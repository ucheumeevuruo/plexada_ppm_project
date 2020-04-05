<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PimCategories Model
 *
 * @property \App\Model\Table\PimsTable&\Cake\ORM\Association\HasMany $Pims
 *
 * @method \App\Model\Entity\PimCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PimCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PimCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PimCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PimCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PimCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PimCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class PimCategoriesTable extends Table
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

        $this->setTable('pim_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Pims', [
            'foreignKey' => 'pim_category_id',
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
            ->scalar('category')
            ->maxLength('category', 120)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->scalar('owner')
            ->maxLength('owner', 120)
            ->requirePresence('owner', 'create')
            ->notEmptyString('owner');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 100)
            ->requirePresence('currency', 'create')
            ->notEmptyString('currency');

        $validator
            ->requirePresence('disbursed_amount', 'create')
            ->notEmptyString('disbursed_amount');

        $validator
            ->date('expected_output_date')
            ->requirePresence('expected_output_date', 'create')
            ->notEmptyDate('expected_output_date');

        return $validator;
    }
}
