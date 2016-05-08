<!-- src/Template/Atividades/add.ctp -->
<?= $this->assign('title', 'Inserir Ativiadadee'); ?>
<div class="container"
	style="width: 80%; padding-top: 89px; margin-bottom: 10px;">
	<?= $this->Flash->render()?>
	<div class="atividades form">
<?= $this->Form->create($atividade)?>

    <fieldset>
			<legend>Dados da Atividade: </legend>
			<div class="input text required">
        <?= $this->Form->label('palestrante_id', 'Palestrante')?>
        <?= $this->Form->select('id_palestrante', $palestrantesList, array())?>
        </div>
			<div class="input text required">
        <?= $this->Form->label('tipo', 'Tipo')?>
        <?=$this->Form->select ( 'tipo', ['empty' => '(selecione)', 'Palestra' => 'Palestra','Minicurso' => 'Minicurso','Oficina' =>'Oficina'  ] );?>
        </div>
        
        <?=$this->Form->input ( 'horario', array ('label' => 'Data e Hora de Início da Atividade: (Dia/Mês/Ano - Hora:Minuto) ','dateTime' => 'DMY','minYear' => date ( 'Y' ),'maxYear' => date ( 'Y' ) + 1,'class' => 'form-control','hour' => [ 'class' => 'foo-class',[ 'before' => 'asdad' ] ],'minute' => [ 'class' => 'bar-class',array ('interval' => 15 ) ],'monthNames' => [ '01' => 'Janeiro','02' => 'Fevereiro','03' => 'Março','04' => 'Abril','05' => 'Maio','06' => 'Junho','07' => 'Julho','08' => 'Agosto','09' => 'Setembro','10' => 'Outubro','11' => 'Novembro','12' => 'Dezembro' ] ) )?>
     	
   		 <?=$this->Form->input ( 'horariofim', array ( 'label' => 'Hora de Fim : ','type' => 'time','interval' => 5,'hour' => [ 'class' => 'foo-class' ],'minute' => [ 'class' => 'bar-class' ] ) )?>
    
    	
        <?= $this->Form->input('local')?>
        <?= $this->Form->input('titulo')?>
        <?= $this->Form->input('descricao', array('type' => 'textarea'))?>
        
        
 		
	</fieldset>
<?= $this->Form->button(__('ENVIAR')); ?>
<?= $this->Form->end()?>
</div>
</div>