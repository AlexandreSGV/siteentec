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
			->notEmpty('nome', 'Campo nome é obrigatório. ')
			->notEmpty('cpf', 'Campo CPF é obrigatório. ')
			->notEmpty('email', 'Campo E-mail é obrigatório. ')
			->notEmpty('sexo', 'Campo Sexo é obrigatório. ')
			->notEmpty('cep', 'Campo CEP é obrigatório. ')
			->notEmpty('estado', 'Campo Estado é obrigatório. ')
			->notEmpty('cidade', 'Campo Cidade é obrigatório. ')
			->notEmpty('bairro', 'Campo Bairro é obrigatório. ')
            ->notEmpty('password', 'Campo Senha é obrigatório. ')
            ->notEmpty('instrucao', 'Grau de Instrução é obrigatório. ')
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
				'message' => 'Este e-mail já está cadastrado.'
			])
			->add('cpf', 'unique', [
				'rule' => 'validateUnique', 'provider' => 'table',
				'message' => 'Este CPF já está cadastrado.'
			]);
    }
	

}
?>