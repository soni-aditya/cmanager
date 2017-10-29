<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teams Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Leaders
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Team get($primaryKey, $options = [])
 * @method \App\Model\Entity\Team newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Team[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Team|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Team patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Team[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Team findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TeamsTable extends Table
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

        $this->setTable('teams');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Leaders', [
            'foreignKey' => 'leader_id',
            'joinType' => 'INNER',
            'className'=>'Users'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('short_description')
            ->requirePresence('short_description', 'create')
            ->notEmpty('short_description');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->allowEmpty('created_by');

        $validator
            ->integer('modified_by')
            ->requirePresence('modified_by', 'create')
            ->allowEmpty('modified_by');

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
        $rules->add($rules->existsIn(['leader_id'], 'Leaders'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->isUnique(['user_id'], 'Users'));
        return $rules;
    }
}
