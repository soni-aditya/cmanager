<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ratings Controller
 *
 * @property \App\Model\Table\RatingsTable $Ratings
 *
 * @method \App\Model\Entity\Rating[] paginate($object = null, array $settings = [])
 */
class RatingsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Revievers']
        ];
        $ratings = $this->paginate($this->Ratings);

        $this->set(compact('ratings'));
        $this->set('_serialize', ['ratings']);
    }

    /**
     * View method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rating = $this->Ratings->get($id, [
            'contain' => ['Users', 'Revievers']
        ]);

        $this->set('rating', $rating);
        $this->set('_serialize', ['rating']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $current_user=$ExtraInfo->getCurrentUser($this);
        $currentUserType=$ExtraInfo->getCurrentType($this);
        $rating = $this->Ratings->newEntity();
        if ($this->request->is('post')) {
            $rating = $this->Ratings->patchEntity($rating, $this->request->data);
            $ExtraInfo->setCreatedBy($rating,$current_user);
            $ExtraInfo->setModifiedBy($rating,$current_user);
            $rating->user_id=$current_user;

            if ($this->Ratings->save($rating)) {
                $this->Flash->success(__('The {0} has been saved.', 'Rating'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Rating'));
            }
        }
        //Here we get the type_id of the team leader for currently logged in user
        //than we get all those users who have type_id less than the type_id of the logged in user
        //Also those users must be a part of the team to which user belongs
        //In this way a user will be able to send the ratings to the users having better type (High ranking)
        $leader=$ExtraInfo->getTeamLeader($this,$current_user);
        $users=$this->getHigherMembersOfTeam($leader,$current_user,$currentUserType);
        //done


//        $users = $this->Ratings->Users->find('list', ['limit' => 200]);
        $revievers = $this->Ratings->Revievers->find('list', ['limit' => 200]);
        $this->set(compact('rating', 'users', 'revievers'));
        $this->set('_serialize', ['rating']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $current_user=$ExtraInfo->getCurrentUser($this);
        $currentUserType=$ExtraInfo->getCurrentType($this);
        $rating = $this->Ratings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rating = $this->Ratings->patchEntity($rating, $this->request->data);
            $ExtraInfo->setModifiedBy($rating,$current_user);
            if ($this->Ratings->save($rating)) {
                $this->Flash->success(__('The {0} has been saved.', 'Rating'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Rating'));
            }
        }
        //Here we get the type_id of the team leader for currently logged in user
        //than we get all those users who have type_id less than the type_id of the logged in user
        //Also those users must be a part of the team to which user belongs
        //In this way a user will be able to send the ratings to the users having better type (High ranking)
        $leader=$ExtraInfo->getTeamLeader($this,$current_user);
        $users=$this->getHigherMembersOfTeam($leader,$current_user,$currentUserType);
        //done


//        $users = $this->Ratings->Users->find('list', ['limit' => 200]);
        $revievers = $this->Ratings->Revievers->find('list', ['limit' => 200]);
        $this->set(compact('rating', 'users', 'revievers'));
        $this->set('_serialize', ['rating']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rating id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rating = $this->Ratings->get($id);
        if ($this->Ratings->delete($rating)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Rating'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Rating'));
        }
        return $this->redirect(['action' => 'index']);
    }
    //This function gets all the members of the team to which user belongs and
    //than it gets those users whose type_id is less than the user's type_id
    public function getHigherMembersOfTeam($leader,$current_user,$current_user_type){
        $ExtraInfo=$this->loadComponent('Extra_info');
        $members=$ExtraInfo->getTeam($this,$leader,$current_user);
        $users=[];
        foreach ($members as $member){
//            debug($member);
            $user = $this->Ratings->Users->find('all')->where(['id'=>$member->user_id ,'AND'=>['type_id <'=>$current_user_type]])->first();
            if($user != null)
            {
                $user=$user->toArray();
                $users[$user['id']]=$user['first_name'].' '.$user['last_name'];
            }
        }
        return $users;
    }
    public function test(){
            if($this->request->is('post')){
                $data=$this->request->getData();
                debug($data);
                die();
//                $entity=$this->Ratings->newEntity();

            }
    }

    protected function getRatingValue($rate_string){

    }
}
