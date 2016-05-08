<?php

// In a controller
namespace App\Controller;

use App\Controller\AppController;
use App\Form\EmailForm;
use Cake\Datasource\ConnectionManager;

class EmailController extends AppController {
	public function index() {
		
		$email = new EmailForm ();
		if ($this->request->is ( 'post' )) {
			$connection = ConnectionManager::get('default');
			$results = $connection->execute('SELECT nome, email FROM users')->fetchAll('assoc');
			$this->request->data['corpo'] = $this->request->data['corpo']; 
			$this->request->data['destinatarios'] = $results;
			if ($email->execute ( $this->request->data )) {
				$this->Flash->success ( 'E-mail enviado com sucesso!' );
				return $this->redirect ( [ 
						'action' => 'index' 
				] );
			} else {
				$this->Flash->error ( 'Aconteceu algum problema, verifique se preencheu todos os campos corretamente!' );
			}
		}
		
		if ($this->request->is ( 'get' )) {
			// Values from the User Model e.g.
			$this->request->data ['assunto'] = '';
			$this->request->data ['corpo'] = '';
		}
		
		$this->set ( 'email', $email );
	}
	public function isAuthorized($user) {
		// O próprio usuário pode ver os seus dados
		if ($this->request->action === 'index') {
			if (isset ( $user ['role'] ) && $user ['role'] === 'admin') {
				return true;
			}
		}
		return parent::isAuthorized ( $user );
	}
}