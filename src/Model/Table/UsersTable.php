<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

	public function validationDefault(Validator $validator)
	{
		return $validator
			->notEmpty('nome', 'Campo nome � obrigat�rio. ')
			->notEmpty('cpf', 'Campo CPF � obrigat�rio. ')
			->notEmpty('email', 'Campo E-mail � obrigat�rio. ')
			->notEmpty('sexo', 'Campo Sexo � obrigat�rio. ')
			->notEmpty('cep', 'Campo CEP � obrigat�rio. ')
			->notEmpty('estado', 'Campo Estado � obrigat�rio. ')
			->notEmpty('cidade', 'Campo Cidade � obrigat�rio. ')
			->notEmpty('bairro', 'Campo Bairro � obrigat�rio. ')
            ->notEmpty('password', 'Campo Senha � obrigat�rio. ')
            ->notEmpty('confirm_password', 'Campo Confirma Senha � obrigat�rio. ')
            ->add('password',[
            		'match'=>[
            				'rule'=> ['compareWith','confirm_password'],
            				'message'=>'The passwords does not match!',
            		]
            ])
            ->add('confirm_password',[
            		'match'=>[
            				'rule'=> ['compareWith','password'],
            				'message'=>'The passwords does not match!',
            		]
            ])
            ->notEmpty('instrucao', 'Grau de Instrução � obrigat�rio. ')
            ->add('instrucao', 'inList', [
                'rule' => ['inList', ['medio', 'tecnico', 'superior']],
                'message' => 'Selecione um grau de instrucao. '
            ])
			->add('sexo', 'inList', [
                'rule' => ['inList', ['F', 'M']],
                'message' => 'Selecion um sexo. '
            ])
			->add('email', 'unique', [
				'rule' => 'validateUnique', 'provider' => 'table',
				'message' => 'Este e-mail j� est� cadastrado.'
			])
			->add('cpf', 'unique', [
				'rule' => 'validateUnique', 'provider' => 'table',
				'message' => 'Este CPF j� est� cadastrado.'
			]);
	}
	

}
