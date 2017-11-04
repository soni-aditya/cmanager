<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rating Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $reviever_id
 * @property int $rating_points
 * @property string $note_of_advice
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $created_by
 * @property int $modified_by
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Reviever $reviever
 */
class Rating extends Entity
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
        'user_id' => true,
        'reviever_id' => true,
        'rating_points' => true,
        'note_of_advice' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'user' => true,
        'reviever' => true
    ];
}
