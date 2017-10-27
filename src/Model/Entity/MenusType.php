<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MenusType Entity
 *
 * @property int $id
 * @property int $menu_id
 * @property int $type_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $created_by
 * @property int $modified_by
 *
 * @property \App\Model\Entity\Menu $menu
 * @property \App\Model\Entity\Type $type
 */
class MenusType extends Entity
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
        'menu_id' => true,
        'type_id' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'menu' => true,
        'type' => true
    ];
}
