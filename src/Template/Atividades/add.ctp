<!-- src/Template/Atividades/add.ctp -->
<?= $this->assign('title', 'Inserir Ativiadadee'); ?>
<div class="atividades form">
<?= $this->Form->create($atividade)?>

    <fieldset>
		<legend>Dados da Atividade: </legend>
		<div class="input text required">
        <?= $this->Form->label('palestrante_id', 'Palestrante')?>
        <?= $this->Form->select('palestrante_id', $palestrantesList, array())?>
        </div>
        <div class="input text required">
        <?= $this->Form->label('tipo', 'Tipo')?>
        <?=$this->Form->select ( 'tipo', ['empty' => '(selecione)', 'Palestra' => 'Palestra','Minicurso' => 'Minicurso','Oficina' =>'Oficina'  ] );?>
        </div>
        <?= $this->Form->input('titulo')?>
        <?= $this->Form->input('descricao', array('type' => 'textarea')) ?>
        
        
 		
	</fieldset>
<?= $this->Form->button(__('ENVIAR')); ?>
<?= $this->Form->end()?>
</div>