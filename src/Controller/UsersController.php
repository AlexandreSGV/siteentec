<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

class UsersController extends AppController
{

	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
    $this->Auth->allow(['add', 'logout', 'mail', 'activate']);
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
			$user->activation_code = md5(time());
			$user->ativo = 0;
			if ($this->Users->save($user)) {
				$this->Flash->default(__($user->nome.', a sua inscrição está pendente de validação. Em instantes você receberá um e-mail com instruções para a validação.'));
				$email = new Email('default');
				$email->from(['entec.ifpe.igarassu@gmail.com' => 'EnTec 2016'])
				->emailFormat('html')
				->to($user->email)
				->template('confirma_insc','confirma_insc')
				->subject('[EnTec 2016] Inscrição pendente de validação')
				->viewVars(['nome' => $user->nome,'ninscricao' => $user->id,'activation_link' => 'http://localhost/siteentec/users/activate/'.$user->id.'/'.$user->activation_code])
				->send();
				
				return $this->redirect(['action' => 'add']);
			}
			$this->Flash->error(__('Incrição não realizada, verifique se preencheu o formulário corretamente!'));
		}
		$this->set('user', $user);
	}
	
	
	function activate($user_id = null, $in_hash = null) {
		$user = $this->Users->get($user_id);
		
		
		if ($user->ativo == 1){
			$this->Flash->default(__('A sua inscrição já foi confirmada anteriormente.'));
		}else if ($this->Users->exists($user_id) && ($in_hash == $user->activation_code)){
			// Update the active flag in the database
			$this->Users->updateAll(['ativo' => 1], ['id' => $user_id]);
			
			
			$this->Flash->success(__('A sua inscrição foi confirmado com sucesso!'));
			
		}else {
			$this->Flash->error(__('Ocorreu algum erro no ativação, por favor, comunique a organização.'));
		}
	
		// Activation failed, render '/views/user/activate.ctp' which should tell the user.
		$this->set(compact('user'));
	}
	
	//função de teste de envio de emails....
	public function mail()
	{
		$email = new Email('default');
		$email->from(['entec.ifpe.igarassu@gmail.com' => 'ENTEC'])
		->emailFormat('html')
		->to('strapacao@gmail.com')
		->template('inscricao','inscricao')
		->subject('[ENTEC 2016]Inscrição Realizada')
		->viewVars(['nome' => "Alexandre",'ninscricao' => 123456,])		
		->send();
		
		return $this->redirect('/');
	}
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}
	
	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

}