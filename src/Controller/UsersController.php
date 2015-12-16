<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow(['add', 'logout', 'edit']);
	}

     public function index()
     {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
			$user->username = $user->email;
			$user->role = "participante";
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario cadastrado com sucesso.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Não foi possível realizar a inscrição, verique o formulário.'));
        }
        $this->set('user', $user);
    }
	
	public function edit($id = null)
	{
		
		$user = $this->Users->get($this->Auth->user('id'));
		if ($this->request->is(['post', 'put'])) {
			$this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__('Your user has been updated.'));
				return $this->redirect(['action' => 'edit']);
			}
			$this->Flash->error(__('Unable to update your user.'));
		}

		$this->set('user', $user);
	}
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Usuário ou senha invalidos, tente novamente.'));
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

}
?>