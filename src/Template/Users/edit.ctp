<!-- src/Template/Users/edit.ctp -->
<?= $this->assign('title', 'Atualiza Inscrições'); ?>
<div class="container section" style="width:60%;padding-top: 89px; margin-bottom: 10px;">
<?= $this->Flash->render()?>
<div class="users form">
   <?= $this->Form->create($user)?>
    <fieldset>
		<legend>Dados pessoais: </legend>
        <?= $this->Form->input('nome', array('class' => 'form-control'))?>
        
        <div class="my-form-inline">
				<div style="min-width: 210px; width: 30%;">
        <?=$this->Form->input ( 'sexo', array ('options' => [ 'empty' => 'Selecione','Feminino' => 'Feminino' , 'Masculino' => 'Masculino'] ))?>
        </div>
				<div style="min-width: 280px; width: 40%;">
		
		<?=$this->Form->input ( 'nascimento', array ('label' => 'Date de Nascimento: (Dia/Mês/Ano) ','dateFormat' => 'DMY','minYear' => date ( 'Y' ) -90,'maxYear' => date ( 'Y' ) - 10,'class' => 'form-control','monthNames' => [ '01' => 'Janeiro','02' => 'Fevereiro','03' => 'Março','04' => 'Abril','05' => 'Maio','06' => 'Junho','07' => 'Julho','08' => 'Agosto','09' => 'Setembro','10' => 'Outubro','11' => 'Novembro','12' => 'Dezembro' ] ) )?>
		</div>
				<div style="min-width: 210px; width: 30%;">
		<?= $this->Form->input('telefone', array('class' => 'form-control'))?>
        </div>
			</div>
        
		</fieldset>
		<fieldset>
			<legend>Endereço: </legend>
			
      
        
        <div class="my-form-inline">
        	<div style="min-width: 140px; width: 21%;">
	       	<?= $this->Form->input('cep', array('class' => 'form-control'))?>
	       </div>
				<div style="min-width: 180px; width: 25%;">
	       	<?=$this->Form->input ( 'estado', array ('options' => [ 'empty' => 'Selecione','Acre' => 'Acre','Alagoas' => 'Alagoas','Amapá' => 'Amapá','Amazonas' => 'Amazonas','Bahia' => 'Bahia','Ceará' => 'Ceará','Distrito Federal' => 'Distrito Federal','Espírito Santo' => 'Espírito Santo','Goiás' => 'Goiás','Maranhão' => 'Maranhão','Mato Grosso' => 'Mato Grosso','Mato Grosso do Sul' => 'Mato Grosso do Sul','Minas Gerais' => 'Minas Gerais','Pará' => 'Pará','Paraíba' => 'Paraíba','Paraná' => 'Paraná','Pernambuco' => 'Pernambuco','Piauí' => 'Piauí','Rio de Janeiro' => 'Rio de Janeiro','Rio Grande do Norte' => 'Rio Grande do Norte','Rio Grande do Sul' => 'Rio Grande do Sul','Rondônia' => 'Rondônia','Roraima' => 'Roraima','Santa Catarina' => 'Santa Catarina','São Paulo' => 'São Paulo','Sergipe' => 'Sergipe','Tocantins' => 'Tocantins' ] ) )?>
	       </div>
				<div style="min-width: 160px; width: 22%;">
	        	<?= $this->Form->input('cidade', array('class' => 'form-control'))?>
	        </div>
				<div style="min-width: 160px; width: 22%;">
	        	<?= $this->Form->input('bairro', array('class' => 'form-control'))?>
	        </div>
			</div>
			<div class="my-form-inline">
				<div style="width: 350px; width: 65%; max-width: 100%">
	        <?= $this->Form->input('logradouro', array('label' => "Nome da Rua", 'class' => 'form-control'))?>
	        </div>
				<div style="min-width: 100px; width: 17%;">
	        <?= $this->Form->input('numero', array('label' => "Número",'class' => 'form-control'))?>
	        </div>
				<div style="min-width: 100px; width: 17%;">
	        <?= $this->Form->input('complemento', array('class' => 'form-control'))?>
	        </div>
			</div>



		</fieldset>
		<fieldset>
			<legend>Formação e Informações Profissionais: </legend>
			<div class="my-form-inline">
				<div style="min-width: 210px; width: 23%;">
					<?=$this->Form->input ( 'instrucao', array ('options' => [ 'empty' => 'Selecione','Fundamental Incompleto' => 'Fundamental Incompleto' , 'Fundamental Completo' => 'Fundamental Completo' , 'Médio Incompleto' => 'Médio Incompleto' , 'Médio Completo' => 'Médio Completo' , 'Técnico Incompleto' => 'Técnico Incompleto' , 'Técnico Completo' => 'Técnico Completo' , 'Superior Incompleto' => 'Superior Incompleto' , 'Superior Completo' => 'Superior Completo' , 'Mestrado Incompleto' => 'Mestrado Incompleto' , 'Mestrado Completo' => 'Mestrado Completo' , 'Doutorado Incompleto' => 'Doutorado Incompleto' , 'Doutorado Completo' => 'Doutorado Completo' ] ) )?>
				</div>
				<div style="min-width: 240px; width: 67%;">
					<?= $this->Form->input('instituicao', array('label' => 'Instituição de Ensino ou Empresa: ','class' => 'form-control'))?>
				</div>
			</div>
		</fieldset>
		<?php 
		$loguser = $this->request->session ()->read ( 'Auth.User' );
			
		if (strpos('admin', $loguser ['role']) !== false) {
			?>	
		<fieldset>
			<legend>Dados Administrativos: </legend>
			<div class="my-form-inline">
				<div style="min-width: 240px; width: 30%;">
					<?=$this->Form->input ( 'role', array ('options' => ['label' => 'Papel', 'participante' => 'participante' ,'admin' => 'admin' , 'palestrante' => 'palestrante','supervisor' => 'supervisor'] ))?>
				</div>
				<div style="min-width: 240px; width: 30%;">
					<?= $this->Form->input('ativo',['type' => 'checkbox', 'label' => 'Usuário verificado']); ?>
				</div>
			</div>
		</fieldset>
		
		<?php }?>
		
<?= $this->Form->button(__('<i class="fa fa-paper-plane-o"></i> ENVIAR'), ['class'=>'form-control', 'escape' => false]); ?>
<?= $this->Form->end()?> 
</div>
</div>