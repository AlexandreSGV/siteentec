<?php
// src/Controller/AtividadesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;


class AtividadesController extends AppController
{

	public function beforeFilter(Event $event)
	{
	parent::beforeFilter($event);
    	$this->Auth->allow(['add', 'view']);
	}

	public function manage()
	{
		
		$connection = ConnectionManager::get('default');
		$result = $connection->execute('SELECT atividades.id, atividades.titulo, atividades.tipo , users.nome FROM atividades INNER JOIN palestrantes on atividades.id_palestrante = palestrantes.id INNER JOIN users on palestrantes.user_id = users.id')->fetchAll('assoc');
		$this->set('atividades', $result);
	}

	public function view($id = null)
	{
		
		$connection = ConnectionManager::get('default');
		$result = $connection->execute('SELECT atividades.titulo, atividades.tipo , atividades.descricao, users.nome, palestrantes.ocupacao FROM atividades INNER JOIN palestrantes on atividades.id_palestrante = palestrantes.id INNER JOIN users on palestrantes.user_id = users.id WHERE atividades.id='.$id)->fetch('assoc');
		$this->set('atividade', $result);
	}

	public function add()
	{
		$atividade = $this->Atividades->newEntity();
		if ($this->request->is('post')) {			
			$atividade = $this->Atividades->patchEntity($atividade, $this->request->data);
			
			$this->Flash->error(__($atividade['id_palestrante'].' '.$atividade['tipo'].' '.$atividade['titulo'].' '.$atividade['descricao']));
			if ($this->Atividades->save($atividade)) {
				$this->Flash->default(__('Atividade adicionado com sucesso'));
				return $this->redirect(['action' => 'view', $atividade->id]);
			}
			$this->Flash->error(__('Incrição não realizada, verifique se preencheu o formulário corretamente!'));
		}
		
		$connection = ConnectionManager::get('default');
		$result = $connection->execute('SELECT palestrantes.id, users.nome FROM users INNER JOIN palestrantes ON (palestrantes.user_id = users.id)')->fetchAll('assoc');
		$palestrantesList =array();
		$palestrantesList[null]  = 'Selecione';
		foreach ($result as $row) {			
			$palestrantesList[$row['id']]  = $row['nome'] ;
		}
		$this->set('palestrantesList', $palestrantesList);
		$this->set('atividade', $atividade);
	}
	public function isAuthorized($atividade)
	{
		
		return parent::isAuthorized($atividade);
	}
	
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$atividade = $this->Atividades->get($id);
// 		if ($this->Atividades->delete($atividade)) {
			$this->Flash->success(__('O atividade de nº: {0} foi removida.', h($id)));
			return $this->redirect(['action' => 'manage']);
// 		}
	}
	
	

}