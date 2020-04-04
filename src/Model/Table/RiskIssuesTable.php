<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

/**
 * RiskIssues Model
 *
 * @property \App\Model\Table\ProjectDetailsTable&\Cake\ORM\Association\BelongsTo $ProjectDetails
 * @property \App\Model\Table\StaffTable&\Cake\ORM\Association\BelongsTo $Staff
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $Lov
 * @property \App\Model\Table\LovTable&\Cake\ORM\Association\BelongsTo $Impact
 *
 * @method \App\Model\Entity\RiskIssue get($primaryKey, $options = [])
 * @method \App\Model\Entity\RiskIssue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RiskIssue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RiskIssue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RiskIssue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RiskIssue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RiskIssue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RiskIssue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RiskIssuesTable extends Table
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

        $this->setTable('risk_issues');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProjectDetails', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Staff', [
            'foreignKey' => 'assigned_to_id',
        ]);
        $this->belongsTo('Lov', [
            'foreignKey' => 'status_id'
        ]);
        $this->belongsTo('Impact', [
            'className' => 'Lov',
            'foreignKey' => 'impact_id',
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
            ->scalar('record_number')
            ->maxLength('record_number', 100)
            ->allowEmptyString('record_number');

        $validator
            ->scalar('remediation')
            ->maxLength('remediation', 100)
            ->allowEmptyString('remediation');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->allowEmptyString('description');

        $validator
            ->scalar('issue')
            ->maxLength('issue', 100)
            ->allowEmptyString('issue');

        $validator
            ->date('expected_resolution_date')
            ->allowEmptyDate('expected_resolution_date');

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
        $rules->add($rules->existsIn(['project_id'], 'ProjectDetails'));
        $rules->add($rules->existsIn(['assigned_to_id'], 'Staff'));
        $rules->add($rules->existsIn(['status_id'], 'Lov'));
        $rules->add($rules->existsIn(['impact_id'], 'Impact'));

        return $rules;
    }

    public function identify($formData) {
        if(empty($formData['record_number']))
            $formData['record_number'] = $this->generate_string($this->permitted_chars, 8);
        if(!empty($formData['expected_resolution_date']))
            $formData['expected_resolution_date'] = DateTime::createFromFormat('d/m/Y', $formData['expected_resolution_date']);
        return $formData;
    }

    private $permitted_chars = 'A12345abcde123456';

    private function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}
