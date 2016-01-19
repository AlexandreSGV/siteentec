<!-- src/Template/Users/add.ctp -->
<?= $this->assign('title', 'Inscrições'); ?>
<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend>Dados pessoais: </legend>
        <?= $this->Form->input('nome') ?>
        <?= $this->Form->input('cpf') ?>
        <?= $this->Form->input('telefone') ?>
        <?= $this->Form->input('sexo', [
            'options' => ['' => ' - - - ','F' => 'Feminino','M' => 'Masculino']
        ]) ?>
		
		<?= $this->Form->input('nascimento', array(
    'label' => 'Date de Nascimento',
    'dateFormat' => 'DMY',
    'minYear' => date('Y') - 90,
    'maxYear' => date('Y') - 12 )) ?>
        <?= $this->Form->input('email') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('confirm_password',array('type'  =>  'password'))?>
	</fieldset>
	<fieldset>
		<legend>Endereço: </legend>
        <?= $this->Form->input('cep') ?>
        <?= $this->Form->input('estado') ?>
        <?= $this->Form->input('cidade') ?>
        <?= $this->Form->input('bairro') ?>
        <?= $this->Form->input('logradouro') ?>
        <?= $this->Form->input('numero') ?>
        <?= $this->Form->input('complemento') ?>
	</fieldset>
	<fieldset>
		<legend>Outros: </legend>
		<?= $this->Form->input('instituicao') ?>
		<?= $this->Form->input('instrucao', [
            'options' => ['' => ' - - - ','medio' => 'Médio','tecnico' => 'Tecnico','superior' => 'Superior']
        ]) ?>
	</fieldset>
<?= $this->Form->button(__('ENVIAR')); ?>
<?= $this->Form->end() ?>
</div>