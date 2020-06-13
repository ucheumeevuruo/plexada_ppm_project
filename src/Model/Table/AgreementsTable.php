<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agreements Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\Agreement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agreement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Agreement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agreement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agreement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agreement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agreement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agreement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgreementsTable extends Table
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

        $this->setTable('agreements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->scalar('sponsor_agreement')
            ->maxLength('sponsor_agreement', 100)
            ->allowEmptyString('sponsor_agreement');

        $validator
            ->scalar('donor_agreement')
            ->maxLength('donor_agreement', 100)
            ->allowEmptyString('donor_agreement');

        $validator
            ->scalar('mda_agreement')
            ->maxLength('mda_agreement', 100)
            ->allowEmptyString('mda_agreement');

        $validator
            ->scalar('other_documents')
            ->maxLength('other_documents', 100)
            ->allowEmptyString('other_documents');

        $validator
            ->scalar('approve_documents')
            ->maxLength('approve_documents', 2)
            ->allowEmptyString('approve_documents');

        $validator
            ->scalar('approve_project')
            ->maxLength('approve_project', 2)
            ->allowEmptyString('approve_project');

        $validator
            ->date('completed_date')
            ->allowEmptyDate('completed_date');

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
