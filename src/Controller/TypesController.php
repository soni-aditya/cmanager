<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Types Controller
 *
 * @property \App\Model\Table\TypesTable $Types
 *
 * @method \App\Model\Entity\Type[] paginate($object = null, array $settings = [])
 */
class TypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $types = $this->paginate($this->Types);

        $this->set(compact('types'));
        $this->set('_serialize', ['types']);
    }

    /**
     * View method
     *
     * @param string|null $id Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $type = $this->Types->get($id, [
            'contain' => ['Menus', 'Users']
        ]);

        $this->set('type', $type);
        $this->set('_serialize', ['type']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $type = $this->Types->newEntity();
        if ($this->request->is('post')) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            $current_user=$ExtraInfo->getCurrentUser($this);
            $ExtraInfo->setCreatedBy($type,$current_user);
            $ExtraInfo->setModifiedBy($type,$current_user);
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The {0} has been saved.', 'Type'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Type'));
            }
        }
        $menus = $this->Types->Menus->find('list', ['limit' => 200]);
        $this->set(compact('type', 'menus'));
        $this->set('_serialize', ['type']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ExtraInfo=$this->loadComponent('Extra_info');
        $type = $this->Types->get($id, [
            'contain' => ['Menus']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $type = $this->Types->patchEntity($type, $this->request->getData());
            $current_user=$ExtraInfo->getCurrentUser($this);
            $ExtraInfo->setModifiedBy($type,$current_user);
            if ($this->Types->save($type)) {
                $this->Flash->success(__('The {0} has been saved.', 'Type'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Type'));
            }
        }
        $menus = $this->Types->Menus->find('list', ['limit' => 200]);
        $this->set(compact('type', 'menus'));
        $this->set('_serialize', ['type']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type = $this->Types->get($id);
        if ($this->Types->delete($type)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Type'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Type'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
