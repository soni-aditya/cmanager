<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Feedbacks Controller
 *
 * @property \App\Model\Table\FeedbacksTable $Feedbacks
 *
 * @method \App\Model\Entity\Feedback[] paginate($object = null, array $settings = [])
 */
class FeedbacksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Recievers']
        ];
        $feedbacks = $this->paginate($this->Feedbacks);

        $this->set(compact('feedbacks'));
        $this->set('_serialize', ['feedbacks']);
    }

    /**
     * View method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feedback = $this->Feedbacks->get($id, [
            'contain' => ['Users', 'Recievers']
        ]);

        $this->set('feedback', $feedback);
        $this->set('_serialize', ['feedback']);
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
        $feedback = $this->Feedbacks->newEntity();
        if ($this->request->is('post')) {
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->data);
            $ExtraInfo->setCreatedBy($feedback,$current_user);
            $ExtraInfo->setModifiedBy($feedback,$current_user);
            $feedback->user_id=$current_user;

            if($feedback->reciever_id != 0){
                if ($this->Feedbacks->save($feedback)) {
                    $this->Flash->success(__('The {0} has been saved.', 'Feedback'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Feedback'));
                }
            }
            else{
                $this->Flash->error('You don\'t have any need to give a Feedback.. your feedback won\'t be recorded');
            }
        }
        //Here we get the type_id of the team leader for currently logged in user
        //than we get all those users who have type_id less than the type_id of the logged in user
        //Also those users must be a part of the team to which user belongs
        //In this way a user will be able to send the feedbacks to the users having better type (High ranking)
        $leader=$ExtraInfo->getTeamLeader($this,$current_user);
        $users=$this->getHigherMembersOfTeam($leader,$current_user,$currentUserType);
                    //        $users = $this->Feedbacks->Users->find('all')->where(['type_id <='=>$leaderType]);
        //done
        $recievers = $this->Feedbacks->Recievers->find('list', ['limit' => 200]);
        $this->set(compact('feedback', 'users', 'recievers'));
        $this->set('_serialize', ['feedback']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $current_user=$ExtraInfo->getCurrentUser($this);
        $currentUserType=$ExtraInfo->getCurrentType($this);
        $feedback = $this->Feedbacks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feedback = $this->Feedbacks->patchEntity($feedback, $this->request->data);
            $ExtraInfo->setModifiedBy($feedback,$current_user);
            if($feedback->reciever_id != 0){
                if ($this->Feedbacks->save($feedback)) {
                    $this->Flash->success(__('The {0} has been saved.', 'Feedback'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Feedback'));
                }
            }
            else{
                $this->Flash->error('You don\'t have any need to give a Feedback.. your feedback won\'t be recorded');
            }
        }//Here we get the type_id of the team leader for currently logged in user
        //than we get all those users who have type_id less than the type_id of the logged in user
        //Also those users must be a part of the team to which user belongs
        //In this way a user will be able to send the feedbacks to the users having better type (High ranking)
        $leader=$ExtraInfo->getTeamLeader($this,$current_user);
        $users=$this->getHigherMembersOfTeam($leader,$current_user,$currentUserType);
        //        $users = $this->Feedbacks->Users->find('all')->where(['type_id <='=>$leaderType]);
        //done
        $recievers = $this->Feedbacks->Recievers->find('list', ['limit' => 200]);
        $this->set(compact('feedback', 'users', 'recievers'));
        $this->set('_serialize', ['feedback']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Feedback id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feedback = $this->Feedbacks->get($id);
        if ($this->Feedbacks->delete($feedback)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Feedback'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Feedback'));
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
            $user = $this->Feedbacks->Users->find('all')->where(['id'=>$member->user_id ,'AND'=>['type_id <'=>$current_user_type]])->first();
            if($user != null)
            {
                $user=$user->toArray();
                $users[$user['id']]=$user['first_name'].' '.$user['last_name'];
            }
        }
        return $users;
    }
}
