<?php

// in src/Form/EmailForm.php
namespace App\Form;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;


class EmailForm extends Form
{

	protected function _buildSchema(Schema $schema)
	{
		return $schema->addField('assunto', 'string')
		->addField('corpo', ['type' => 'text']);
	}

	protected function _buildValidator(Validator $validator)
	{
		return $validator->add('assunto', 'length', [
				'rule' => ['minLength', 5],
				'message' => 'Assunto é obrigatório'
		])->add('corpo', 'length', [
				'rule' => ['minLength', 5],
				'message' => 'Corpo do e-mail é obrigatório'
		]);
	}

	protected function _execute(array $data)
	{
		$email = new Email('default');
		$email->from(['entec.ifpe.igarassu@gmail.com' => 'EnTec 2016'])
		->emailFormat('html')
		->replyTo('entec.ifpe.igarassu@gmail.com', 'EnTec 2016')
		->subject('[EntTec 2016] '.$data['assunto']);
		$destinatarios = $data['destinatarios'];
		for($i = 0, $c = count($destinatarios); $i < $c; $i++)
			$email->addBcc($destinatarios[$i]['email'],$destinatarios[$i]['nome']);
		$email->send($data['corpo']);
		
		return true;
	}
}