<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\I18n\Time;

class UsersController extends AppController
{

	
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
    	$this->Auth->allow(['add', 'logout', 'activate', 'login']);
    	$this->Auth->deny(['edit', 'index','view','delete','credenciamento']);
	}
	
	

	public function index()
	{
		$results = $this->Users->find()->select(['id', 'nome', 'created', 'ativo','role','credenciado', 'imp_certificado']);
		$this->set('users', $results);
		$counter = 0;
		foreach($results as $user)
		{
			if($user->ativo && $user->role !== 'admin' && $user->role !== 'supervisor'){
				$counter++;
			}
		}
		$this->set('count', $counter);
		
	}
	
	
	public function credenciamento()
	{
		$results = $this->Users->find()->select(['id', 'nome', 'ativo','credenciado', 'imp_certificado'])
									   
									   ;
// 		$this->set('users', $results);
		$this->paginate = array(
				'limit' => 600,
				'order' => array(
						'nome' => 'asc'
				)
		);
		$users = $this->paginate($results);		
		$this->set(compact('users'));
		$this->set('_serialize', ['users']);
		$counter = 0;
		$count_cred = 0;
		foreach($results as $user)
		{
			if($user->ativo && $user->role !== 'admin' && $user->role !== 'supervisor'){
				$counter++;
				if($user->credenciado) $count_cred++;
			}
		}
		$this->set('count', $counter);
		$this->set('count_cred', $count_cred);
	}
	
	
	
	public function export()
	{
		$users = $this->Users->find()->select(['id', 'nome', 'created', 'ativo','role']);
		
	    $_serialize = 'users';
	    $_csvEncoding = 'Windows-1252';
	    $_delimiter = ';';
// 	    $_dataEncoding = 'UTF-8';
	    $_header = ['Nº Inscrição', 'NOME','DATA INSCRIÇÃO','VALIDADO','PAPEL','ASSINATURA CREDENCIADO', 'RECEBEU CERTIFICADO'];
	    $this->response->download('lista_inscritos.csv'); // <= setting the file name
	    $this->viewBuilder()->className('CsvView.Csv');
	    $this->set(compact('users', '_serialize','_header','_csvEncoding','_delimiter'));
	}
	
	public function exportTotal()
	{
		$users = $this->Users->find()->select(['id', 'nome', 'created', 'role','estado','cidade','instituicao','instrucao','email','credenciado','imp_certificado']);
	
		$_serialize = 'users';
		$_csvEncoding = 'Windows-1252';
		$_delimiter = ';';
		$_header = ['Nº Inscrição', 'NOME','DATA INSCRIÇÃO','PAPEL','ESTADO','CIDADE','INSTITUIÇÃO','INSTRUÇÃO','E-MAIL','CREDENCIADO','VALIDADO'];
		$this->response->download('lista_inscritos_completa.csv'); // <= setting the file name
		$this->viewBuilder()->className('CsvView.Csv');
		$this->set(compact('users', '_serialize','_header','_csvEncoding','_delimiter'));
	}
	
	
	public function exportImpCertificados()
	{
		$users = $this->Users->find()->select(['id', 'nome'])->where(['credenciado' => 1,'imp_certificado' => 1]);
	
		$_serialize = 'users';
		$_csvEncoding = 'Windows-1252';
		$_delimiter = ';';
		$_header = ['Nº Inscrição', 'NOME'];
		$this->response->download('imprimir_certificados_'.Time::now()->format('Y-m-d H:i:s').'.csv'); // <= setting the file name
		$this->viewBuilder()->className('CsvView.Csv');
		$this->set(compact('users', '_serialize','_header','_csvEncoding','_delimiter'));
	}
	
	

	public function view($id = null)
	{
		//redirect do login sem id como parametro
		if($id === null){
			$user = $this->Users->get($this->Auth->user('id'));
			$this->set(compact('user'));
		}else{// redirect com id no get
			
			$user = $this->Users->get($id);
			$this->set(compact('user'));
		}
	}

	public function add()
	{
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			$user->email = strtolower($user->email);
			$user->username = $user->email;
			$user->role = "participante";
			$user->nome = strtoupper($user->nome);
			$user->activation_code = md5(time());
			$user->ativo = 0;
			$user->created = Time::now()->format('Y-m-d H:i:s');
			$user->modified = Time::now()->format('Y-m-d H:i:s');
			if ($this->Users->save($user)) {
				$this->Flash->default(__($user->nome.', a sua inscrição está pendente de validação. Em instantes será enviado um e-mail para '.$user->email.' com instruções para a validação. '));
				$email = new Email('default');
				$email->from(['entec.ifpe.igarassu@gmail.com' => 'EnTec 2016'])
				->emailFormat('html')
				->to(strtolower($user->email))
				->template('default','confirma_insc')
				->subject('[EnTec 2016] Inscrição pendente de validação')
				->viewVars(['nome' => $user->nome,'activation_link' => 'http://entec.ifpe.edu.br/users/activate/'.$user->id.'/'.$user->activation_code])
				->send();
				
				return $this->redirect(['action' => 'add']);
			}
			$this->Flash->error(__('Incrição não realizada, verifique os campos destacados em vermelho.'));
		}
		$this->set('user', $user);
	}
	
	
	public function edit($id = null) {
		$user = $this->Users->get ( $id );
		if ($this->request->is ( [
				'post',
				'put'
		] )) {
			$this->Users->patchEntity ( $user, $this->request->data );
			$this->Users->validator()->remove('password');
			$this->Users->validator()->remove('confirm_password');
			$user->modified = Time::now()->format('Y-m-d H:i:s');
			$user->nome = strtoupper($user->nome);
			$user->email = strtolower($user->email);
			$user->username = $user->email;
			if ($this->Users->save ( $user )) {
				$this->Flash->success ( __ ( 'Inscrição atualizada com sucesso.' ) );
				return $this->redirect ( [
						'action' => 'view', $user->id
				] );
			}
			$this->Flash->error ( __ ( 'Não foi possivel atualizar a inscrição.' ) );
		}
	
		$this->set ( 'user', $user );
	}
	
	
	
	function activate($user_id = null, $in_hash = null) {
		$user = $this->Users->get($user_id);
		
		
		if ($user->ativo == 1){
			$this->Flash->default(__('A sua inscrição já foi confirmada anteriormente.'));
		}else if ($this->Users->exists($user_id) && ($in_hash == $user->activation_code)){
			// Update the active flag in the database
			$this->Users->updateAll(['ativo' => 1], ['id' => $user_id]);
			
			$email = new Email('default');
			$email->from(['entec.ifpe.igarassu@gmail.com' => 'EnTec 2016'])
			->emailFormat('html')
			->to(strtolower($user->email))
			->template('default','insc_sucesso')
			->subject('[EnTec 2016] Inscrição confirmada')
			->viewVars(['nome' => $user->nome,'ninscricao' => $user->id])
			->send();			
			$this->Flash->success(__('A sua inscrição foi confirmada com sucesso, para alterar os seus dados realize login!'));
			
		}else {
			$this->Flash->error(__('Ocorreu algum erro no ativação, por favor, comunique a organização.'));
		}
		return $this->redirect('/users/login');
	}
	
	
	public function lembrarValidacaoEmail()
	{
		$usersLista = $this->Users->find()->select(['id', 'nome','email','activation_code'])
										  ->where(['ativo' => 0]);
		
		foreach($usersLista as $user)
		{
			$email = new Email('default');
			$email->from(['entec.ifpe.igarassu@gmail.com' => 'EnTec 2016'])
			->emailFormat('html')
			->to(strtolower($user->email))
			->template('default','lembrete_confirma_insc')
			->subject('[EnTec 2016] Inscrição pendente de validação')
			->viewVars(['nome' => $user->nome,'activation_link' => 'http://entec.ifpe.edu.br/users/activate/'.$user->id.'/'.$user->activation_code])
			->send();
		}
		$this->Flash->default(__('Foi enviado um e-mail de validação para os usuários não validados!'));
		return $this->redirect(['action' => 'index']);
		
	}
	
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('E-mail ou senha invalidos, tente novamente.'));
		}
	}
	
	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
	
	
	public function isAuthorized($user)
	{
		// O próprio usuário pode ver os seus dados
		if ($this->request->action === 'edit' ) {
			$userId = (int)$this->request->params['pass'][0];
			if ($userId === $user['id']) {
				return true;
			}
			if($user['role'] === 'admin'){
				return true;
			}
			
		}
		
		if ($this->request->action === 'view' ) {
			if(isset($this->request->params['pass'][0])){
				$userId = (int)$this->request->params['pass'][0];
				if ($userId === $user['id']) {
					return true;
				}
				if (strpos('admin supervisor', $user['role']) !== false){
					return true;
				}
			}else{
				return true;
			}
		}
		
		
		if (	$this->request->action === 'credenciamento' 
			||	$this->request->action === 'credenciarajax'
			||	$this->request->action === 'imprimircertajax'
			||	$this->request->action === 'index'
			||	$this->request->action === 'view') {
			if (strpos('admin supervisor', $user['role']) !== false){
				return true;
			}
		}
		return parent::isAuthorized($user);
	}
	
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$usr = $this->Users->get($id);
		if ($this->Users->delete($usr)) {
			$this->Flash->success(__('O usuário de nº: {0} foi removido.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
	
	public function credenciar($id)
	{
		
		if ($this->Users->exists($id)) {
			$usr = $this->Users->get($id);
			if($usr->credenciado){
				$this->Users->updateAll(['credenciado' => 0], ['id' => $id]);
			}else{
				$this->Users->updateAll(['credenciado' => 1], ['id' => $id]);
			}
			
			return $this->redirect($this->referer());
		}
	}
	
	public function certificadoImpresso($id)
	{
	
		if ($this->Users->exists($id)) {
			$usr = $this->Users->get($id);
			if($usr->imp_certificado){
				$this->Users->updateAll(['imp_certificado' => 0], ['id' => $id]);
			}else{
				$this->Users->updateAll(['imp_certificado' => 1], ['id' => $id]);
			}
				
			return $this->redirect($this->referer());
		}
	}
	
	public function validar($id)
	{
	
		if ($this->Users->exists($id)) {
			$usr = $this->Users->get($id);
			if($usr->ativo){
				$this->Users->updateAll(['ativo' => 0], ['id' => $id]);
			}else{
				$this->Users->updateAll(['ativo' => 1], ['id' => $id]);
			}
	
		}
	}
	
	

		
		public function credenciarajax($id){
			if ($this->Users->exists($id)) {
				$usr = $this->Users->get($id);
				if($usr->credenciado){
					$this->Users->updateAll(['credenciado' => 0], ['id' => $id]);
				}else{
					$this->Users->updateAll(['credenciado' => 1], ['id' => $id]);
				}
			}
		}
		
		public function imprimircertajax($id){
			if ($this->Users->exists($id)) {
				$usr = $this->Users->get($id);
				if($usr->imp_certificado){
					$this->Users->updateAll(['imp_certificado' => 0], ['id' => $id]);
				}else{
					$this->Users->updateAll(['imp_certificado' => 1], ['id' => $id]);
				}
			}
		}
		
		
		
}