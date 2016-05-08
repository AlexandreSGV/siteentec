<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;


class UsersTable extends Table
{

	public function validationDefault(Validator $validator)
	{
		$validator
			->notEmpty('nome', 'Campo nome � obrigat�rio. ')
			->notEmpty('sexo', 'Campo Sexo � obrigat�rio. ')
			->notEmpty('cep', 'Campo CEP � obrigat�rio. ')
			->notEmpty('estado', 'Campo Estado � obrigat�rio. ')
			->notEmpty('nascimento', 'Campo Data de Nascimento. ')
			->notEmpty('cidade', 'Campo Cidade � obrigat�rio. ')
			->notEmpty('bairro', 'Campo Bairro � obrigat�rio. ')
            ->notEmpty('password', 'Campo Senha � obrigat�rio. ')
            ->notEmpty('confirm_password', 'Campo Confirma Senha � obrigat�rio. ')
            ->add('password',[
            		'match'=>[
            				'rule'=> ['compareWith','confirm_password'],
            				'message'=>'As senhas não conferem!',
            		],
            		'minLength' => [
			            'rule' => ['minLength', 6],
			            'last' => true,
			            'message' => 'A senha deve ter no mínimo 6 caracteres'
			        ]
            ])
            ->add('confirm_password',[
            		'match'=>[
            				'rule'=> ['compareWith','password'],
            				'message'=>'As senhas não conferem!',
            		]
            ])
            ->notEmpty('instrucao', 'Grau de Instrução � obrigat�rio. ')
			
			->requirePresence('email', 'create')
			->notEmpty('email')
			->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Este e-mail já está cadastrado.']);
			return $validator;
	}
	
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->isUnique(['username']));
		$rules->add($rules->isUnique(['email']));
		return $rules;
	}
	

}
