<!-- src/Template/Palestantes/add.ctp -->
<?= $this->assign('title', 'Inserir Palestrante'); ?>
<div class="container" style="width:80%;padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
<div class="palestrantes form">
<?= $this->Form->create($palestrante,array('type' => 'file')) ?>

    <fieldset>
        <legend>Dados pessoais: </legend>
        <div class="input text required">
        <?= $this->Form->label('user_id', 'Usuário Associado') ?>
        <?= $this->Form->select('user_id', $usersList, array()) ?>
        </div>
        <?= $this->Form->input('ocupacao') ?>
        <?= $this->Form->input('foto',array('type'=>'file')) ?>
        <?= $this->Form->input('perfil', array('type' => 'textarea')) ?>
 		
	</fieldset>
<?= $this->Form->button(__('ENVIAR')); ?>
<?= $this->Form->end() ?>
</div>
</div>