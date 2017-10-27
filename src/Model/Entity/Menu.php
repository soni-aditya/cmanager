<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity
 *
 * @property int $id
 * @property string $name
 * @property int $lft
 * @property int $rght
 * @property int $parent_id
 * @property bool $has_child
 * @property bool $display
 * @property int $menu_order
 * @property string $controller
 * @property string $action
 * @property string $url
 * @property string $class
 * @property string $tag
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $created_by
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Menu $parent_menu
 * @property \App\Model\Entity\Menu[] $child_menus
 * @property \App\Model\Entity\Type[] $types
 */
class Menu extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'lft' => true,
        'rght' => true,
        'parent_id' => true,
        'has_child' => true,
        'display' => true,
        'menu_order' => true,
        'controller' => true,
        'action' => true,
        'url' => true,
        'class' => true,
        'tag' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'parent_menu' => true,
        'child_menus' => true,
        'types' => true
    ];
}
