<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[] paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Teams']
        ]);

        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            $current_user=$ExtraInfo->getCurrentUser($this);
            $ExtraInfo->setCreatedBy($project,$current_user);
            $ExtraInfo->setModifiedBy($project,$current_user);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The {0} has been saved.', 'Project'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Project'));
            }
        }
        $this->set(compact('project'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            $current_user=$ExtraInfo->getCurrentUser($this);
            $ExtraInfo->setModifiedBy($project,$current_user);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The {0} has been saved.', 'Project'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Project'));
            }
        }
        $this->set(compact('project'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Project'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Project'));
        }
        return $this->redirect(['action' => 'index']);
    }
    public function reportJson(){
        $this->viewBuilder()->setLayout('');
        $connection=ConnectionManager::get('default');
        $query_one="SELECT COUNT(id) FROM projects";
        $result_one=$connection->execute($query_one)->fetch('assoc');
        $total_projects=$result_one['COUNT(id)'];
        $this->set(compact('total_projects'));
        $this->set('_serialize', ['total_projects']);
    }
    public function info(){
        $ExtraInfo=$this->loadComponent('Extra_info');
        $current_user=$ExtraInfo->getCurrentUser($this);

        $UserProjects=[];
        $model=$this->loadModel('Teams');
        $teams=$model->find('all')->where(['user_id'=>$current_user])->contain('Leaders');
        foreach ($teams as $team){
            $project=[];
            $team_leader=$team->leader->first_name.' '.$team->leader->last_name;
            $leader_id=$team->leader->id;
            $project_id=$team->project_id;

            $team_members=$this->getTeamInfo($leader_id,$model);
            $this->getProjectInfo($project_id);
        }
        die();
    }
    protected function getTeamInfo($leader,$model){
        $team=$model->find('all')->where(['leader_id'=>$leader])->contain('Users');
        $members=[];
        foreach ($team as $t){
            $member_name=$t->user->first_name.' '.$t->user_last_name;
            array_push($members,$member_name);
        }
//        debug($members);
    }
    protected function getProjectInfo($id){
        $project_info=$this->Projects->get($id);
        debug($project_info);
    }
}
