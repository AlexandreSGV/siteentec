<!-- src/Template/Users/add.ctp -->
<?= $this->assign('title', 'Inscrições'); ?>
<div class="container" style="width:60%;padding-top: 89px; margin-bottom: 10px; ">
	<?= $this->Flash->render()?>
	<h2>Inscrição:</h2>
	<div class="users form" >
<?= $this->Form->create($user,array('class' => 'form-group'))?>
    <fieldset>
			<legend>Dados pessoais: </legend>
        <?= $this->Form->input('nome', array('class' => 'form-control'))?>
        <?= $this->Form->input('cpf', array('class' => 'form-control'))?>
        <?= $this->Form->input('telefone', array('class' => 'form-control'))?>
        <?=$this->Form->input ( 'sexo', [ 'options' => [ '' => ' - - - ','F' => 'Feminino','M' => 'Masculino' ],'class' => 'form-control' ] )?>
		
		<?=$this->Form->input ( 'nascimento', array ('label' => 'Date de Nascimento: ','dateFormat' => 'DMY','minYear' => date ( 'Y' ) - 90,'maxYear' => date ( 'Y' ) - 12 ) )?>
        <?=$this->Form->input ( 'email', array ('class' => 'form-control','id' => 'email' ) )?>
        <?= $this->Form->input('password', array('class' => 'form-control'))?>
        <?= $this->Form->input('confirm_password',array('type'  =>  'password','class' => 'form-control'))?>
	</fieldset>
		<fieldset>
			<legend>Endereço: </legend>
        <?= $this->Form->input('cep', array('class' => 'form-control'))?>
        <?= $this->Form->input('estado', array('class' => 'form-control'))?>
        <?= $this->Form->input('cidade', array('class' => 'form-control'))?>
        <?= $this->Form->input('bairro', array('class' => 'form-control'))?>
        <?= $this->Form->input('logradouro', array('class' => 'form-control'))?>
        <?= $this->Form->input('numero', array('class' => 'form-control'))?>
        <?= $this->Form->input('complemento', array('class' => 'form-control'))?>
	</fieldset>
		<fieldset>
			<legend>Outros: </legend>
		<?= $this->Form->input('instituicao', array('class' => 'form-control'))?>
		<?=$this->Form->input ( 'instrucao', [ 'options' => [ '' => ' - - - ','medio' => 'Médio','tecnico' => 'Tecnico','superior' => 'Superior' ],'class' => 'form-control' ] )?>
	</fieldset>
<?= $this->Form->button(__('ENVIAR'), ['class'=>'btn btn-default']); ?>
<?= $this->Form->end()?>
</div>
</div>
