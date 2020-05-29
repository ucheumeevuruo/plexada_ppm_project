<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

/**
 * Disbursements Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\MilestonesTable&\Cake\ORM\Association\BelongsTo $Milestones
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Disbursement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Disbursement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Disbursement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Disbursement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disbursement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Disbursement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Disbursement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Disbursement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DisbursementsTable extends Table
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

        $this->setTable('disbursements');
        $this->setDisplayField('name');
        $this->setPrimaryKey('disbursement_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
        ]);
        $this->belongsTo('Milestones', [
            'foreignKey' => 'milestone_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'system_user_id',
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
            ->nonNegativeInteger('disbursement_id')
            ->allowEmptyString('disbursement_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('percentage_completion')
            ->notEmptyString('percentage_completion');

        $validator
            ->scalar('description')
            ->maxLength('description', 300)
            ->allowEmptyString('description');

        $validator
            ->date('start_date')
            ->allowEmptyDate('start_date');

        // $validator
        //     ->date('end_date')
        //     ->allowEmptyDate('end_date');

        $validator
            ->decimal('cost')
            ->allowEmptyString('cost');

        // $validator
        //     ->dateTime('last_updated')
        //     ->allowEmptyDateTime('last_updated');

        return $validator;
    }
    
    public function identify($formData) {
        $formData['start_date'] = !empty($formData['start_date']) ?
            DateTime::createFromFormat('d/m/Y', $formData['start_date']) : $formData['start_date'];                    
        return $formData;
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
        $rules->add($rules->existsIn(['system_user_id'], 'Users'));

        return $rules;
    }
}
