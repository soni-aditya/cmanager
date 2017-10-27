<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenusTypes Controller
 *
 * @property \App\Model\Table\MenusTypesTable $MenusTypes
 *
 * @method \App\Model\Entity\MenusType[] paginate($object = null, array $settings = [])
 */
class MenusTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Menus', 'Types']
        ];
        $menusTypes = $this->paginate($this->MenusTypes);

        $this->set(compact('menusTypes'));
        $this->set('_serialize', ['menusTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Menus Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menusType = $this->MenusTypes->get($id, [
            'contain' => ['Menus', 'Types']
        ]);

        $this->set('menusType', $menusType);
        $this->set('_serialize', ['menusType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $menusType = $this->MenusTypes->newEntity();
        if ($this->request->is('post')) {
            $menusType = $this->MenusTypes->patchEntity($menusType, $this->request->data);
            $current_user=$ExtraInfo->getCurrentUser($this);
            $ExtraInfo->setCreatedBy($menusType,$current_user);
            $ExtraInfo->setModifiedBy($menusType,$current_user);
            if ($this->MenusTypes->save($menusType)) {
                $this->Flash->success(__('The {0} has been saved.', 'Menus Type'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Menus Type'));
            }
        }
        $menus = $this->MenusTypes->Menus->find('list', ['limit' => 200]);
        $types = $this->MenusTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('menusType', 'menus', 'types'));
        $this->set('_serialize', ['menusType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menus Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $menusType = $this->MenusTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menusType = $this->MenusTypes->patchEntity($menusType, $this->request->data);
            $current_user=$ExtraInfo->getCurrentUser($this);
            $ExtraInfo->setModifiedBy($menusType,$current_user);
            if ($this->MenusTypes->save($menusType)) {
                $this->Flash->success(__('The {0} has been saved.', 'Menus Type'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Menus Type'));
            }
        }
        $menus = $this->MenusTypes->Menus->find('list', ['limit' => 200]);
        $types = $this->MenusTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('menusType', 'menus', 'types'));
        $this->set('_serialize', ['menusType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menus Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menusType = $this->MenusTypes->get($id);
        if ($this->MenusTypes->delete($menusType)) {
            $this->deleteAssocMenu($menusType);
            //$this->Flash->success(__('The {0} has been deleted.', 'Menus Type'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Menus Type'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function deleteAssocMenu($menusType){
        $menusModel=$this->loadModel('Menus');
        $entity=$menusModel->get($menusType->menu_id);
        if($menusModel->delete($entity)){
            $this->Flash->success(__('The {0} has been deleted.And its associated menu is also been deleted', 'Menus Type'));
        }
        else{
            $this->MenusTypes->save($menusType);
            $this->Flash->error(__('The associated menu could not be deleted please try again'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
