<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menus Model
 *
 * @property \App\Model\Table\MenusTable|\Cake\ORM\Association\BelongsTo $ParentMenus
 * @property \App\Model\Table\MenusTable|\Cake\ORM\Association\HasMany $ChildMenus
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsToMany $Types
 *
 * @method \App\Model\Entity\Menu get($primaryKey, $options = [])
 * @method \App\Model\Entity\Menu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Menu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Menu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Menu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Menu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Menu findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class MenusTable extends Table
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

        $this->setTable('menus');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentMenus', [
            'className' => 'Menus',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildMenus', [
            'className' => 'Menus',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsToMany('Types', [
            'foreignKey' => 'menu_id',
            'targetForeignKey' => 'type_id',
            'joinTable' => 'menus_types'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->boolean('has_child')
            ->requirePresence('has_child', 'create')
            ->notEmpty('has_child');

        $validator
            ->boolean('display')
            ->requirePresence('display', 'create')
            ->notEmpty('display');

        $validator
            ->integer('menu_order')
            ->requirePresence('menu_order', 'create')
            ->notEmpty('menu_order');

        $validator
            ->scalar('controller')
            ->requirePresence('controller', 'create')
            ->allowEmpty('controller');

        $validator
            ->scalar('action')
            ->requirePresence('action', 'create')
            ->allowEmpty('action');

        $validator
            ->scalar('url')
            ->requirePresence('url', 'create')
            ->allowEmpty('url');

        $validator
            ->scalar('class')
            ->requirePresence('class', 'create')
            ->allowEmpty('class');

        $validator
            ->scalar('tag')
            ->requirePresence('tag', 'create')
            ->allowEmpty('tag');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentMenus'));

        return $rules;
    }
}
