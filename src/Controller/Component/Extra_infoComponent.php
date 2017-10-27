<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 27/10/17
 * Time: 10:20 AM
 */
namespace App\Controller\Component;

use Cake\Controller\Component;

class Extra_infoComponent extends Component
{
    //get current logged-in user
    public function getCurrentUser($object) {
        $user = $object->request->getSession()->read('Auth.User');
        return $user['id'];
    }
    public function setCreatedBy($entity,$value){
        $entity->created_by=$value;
        return $entity;
    }
    public function setModifiedBy($entity,$value){
        $entity->modified_by=$value;
        return $entity;
    }
}