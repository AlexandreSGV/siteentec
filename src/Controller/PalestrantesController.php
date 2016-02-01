<?php
// src/Controller/PalestrantesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

class PalestrantesController extends AppController
{

	public function beforeFilter(Event $event)
	{
	parent::beforeFilter($event);
    	$this->Auth->allow(['add']);
	}

	public function index()
	{
		$this->set('palestrantes', $this->Palestrantes->find('all'));
	}

	public function view($id = null)
	{
		$this->set(compact('palestrante'));
		$palestrante = $this->Palestrantes->get($id);
	}

	public function add()
	{
		$palestrante = $this->Palestrantes->newEntity();
		if ($this->request->is('post')) {
			
			
			if (is_uploaded_file($this->request->data['foto']['tmp_name']))
			{
				$filename = $this->request->data['foto']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				while (true) {
					$filename = uniqid(rand(), true) .'.'. $ext;
					if (!'../imagestore/'. $filename) break;
				}
				
				move_uploaded_file(
						$this->request->data['foto']['tmp_name'],
						'../imagestore/' . $filename
						);
				
				
				
				// store the filename in the array to be saved to the db
				$this->request->data['foto'] = $filename;
			}
			$palestrante = $this->Palestrantes->patchEntity($palestrante, $this->request->data);
			
			
			if ($this->Palestrantes->save($palestrante)) {
				$this->Flash->default(__('Palestrante adicionado com sucesso'));
				return $this->redirect(['action' => 'add']);
			}
			$this->Flash->error(__('Incrição não realizada, verifique se preencheu o formulário corretamente!'));
		}
		$this->set('palestrante', $palestrante);
	}
	public function isAuthorized($palestrante)
	{
		// O próprio usuário pode ver os seus dados
		if ($this->request->action === 'view') {
			$palestranteId = $this->Auth->palestrante('id');
			if ($palestranteId === $palestrante['id']) {
				return true;
			}
		}
		return parent::isAuthorized($palestrante);
	}
	
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$usr = $this->Palestrantes->get($id);
// 		if ($this->Palestrantes->delete($usr)) {
			$this->Flash->success(__('O palestrante de nº: {0} foi removido.', h($id)));
			return $this->redirect(['action' => 'index']);
// 		}
	}
	
	

}