<!-- src/Template/Palestantes/add.ctp -->
<?= $this->assign('title', 'Inserir Palestrante'); ?>
<div class="palestrantes form">
<?= $this->Form->create($palestrante,array('type' => 'file')) ?>

    <fieldset>
        <legend>Dados pessoais: </legend>
        <?= $this->Form->input('perfil') ?>
        
        <?= $this->Form->input('foto',array('type'=>'file')) ?>
        
        <?= $this->Form->input('ocupacao') ?>
	</fieldset>
<?= $this->Form->button(__('ENVIAR')); ?>
<?= $this->Form->end() ?>
</div>