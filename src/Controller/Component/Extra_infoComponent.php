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
    //get current logged-in user type
    public function getCurrentType($object){
        $user = $object->request->getSession()->read('Auth.User');
        return $user['type_id'];
    }
    //get the user_id of the team leader for the current user
    public function getTeamLeader($object,$user_by){
        $model=$object->loadModel('Teams');
        $leader=$model->find('all')->where(['user_id'=>$user_by])->first();
        return $leader->leader_id;
    }
    //get the team members for a team leader by taking the user id of the team leader
    public function getTeam($object,$leader,$user_by){
        $model=$object->loadModel('Teams');
        $members=$model->find('all')->where(['leader_id'=>$leader ,'AND'=>['user_id !='=>$user_by]]);
        return $members;
    }
    //set the id for the created_by field
    public function setCreatedBy($entity,$value){
        $entity->created_by=$value;
        return $entity;
    }
    //set the id for the modified_by field
    public function setModifiedBy($entity,$value){
        $entity->modified_by=$value;
        return $entity;
    }
    //get the type_id for any user from the users table
    public function getUserType($user_id,$object){
        $model=$object->loadModel('Users');
        $user=$model->get($user_id);
        return $user->type_id;
    }
}