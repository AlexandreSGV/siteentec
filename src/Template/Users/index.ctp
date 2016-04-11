<!-- src/Template/Users/index.ctp -->
<?= $this->assign('title', 'Confirmar Inscrição'); ?>

<div class="container" style="padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
<?= $this->Flash->render('auth') ?>

<h2>Inscritos <small> Total válidas: <?= $count ?></small></h2> 
<div  class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1" style="padding: 0;">

	<div  style="width:100%;  text-align: center; background-color: #ddd;">
		<?php echo $this->Html->link('<i class="fa fa-file-excel-o fa-2x"> Certificados Participante</i>',array('controller'=>'users','action'=>'certificadoParticipante'), array('class'=>'btn btn-default btn-sm col-xs-4', 'escape' => false));?>
		<?php echo $this->Html->link('<i class="fa fa-file-excel-o fa-2x"> Certificados Minicursos</i>',array('controller'=>'users','action'=>'certificadoOuvinteMinicurso'), array('class'=>'btn btn-default btn-sm col-xs-4', 'escape' => false));?> 	
	</div>	

		<div style="width: 100%; text-align: center; ">
			<div style="width: 16%;float: left;"><i class="fa fa-fw fa-search"></i><br>Visualizar</div>
			<div style="width: 16%;float: left;"><i class="fa fa-fw fa-pencil-square-o"></i><br>Editar </div>
			<div style="width: 16%;float: left;"><i class="fa fa-fw fa-trash"> </i><br>Remover</div>
			<div style="width: 16%;float: left;"><i class="fa fa-fw fa-check"> </i><br>Email validado</div>
			<div style="width: 16%;float: left;"><i class="fa fa-fw fa-flag-checkered"> </i><br>Credenciado</div>
			<div style="width: 16%;float: left;"><i class="fa fa-fw fa-print"> </i><br>Imprimir certificado</div>
		</div>

	<table style="width: 100%;"> 
	
	
	
	
			<col style="width: 5% ;"/>
			<col style="width: 40% ;"/>
			<col style="width: 11% ;"/>
			<col style="width: 15% ;"/>
			<col style="width: 10% ;"/>
			<col style="width: 10% ;"/>
			<col style="width: 10% ;"/>
	<tr>
			<th >Nº</th>
			<th >Nome</th>
			<th >Início</th>
			<th  >Ações</th>
			<th style="text-align:center;">Status</th>
			<th style="text-align:center;">Creden.</th>
			<th style="text-align:center;">Imp.Cer.</th>
	</tr>

    <?php foreach ($users as $user): ?>
    <tbody style="width: 100%;">
    <tr style="border: 1px solid #ddd;">
		<td><?= $user->id ?></td>
		<td>
            <?= $this->Html->link($user->nome, ['action' => 'view', $user->id])?>
            <span class="soon"> 
            <?php 
        	if ($user->role === 'admin') {
        		echo ' <i class="fa fa-lg fa-fw fa-cogs" style> </i>';
        	}else if ($user->role === 'palestrante') {
        		echo ' <i class="fa fa-lg fa-graduation-cap"> </i>';
        	} else if ($user->role === 'supervisor') {
        		echo ' <i class="fa fa-lg fa-fw fa-cog"> </i>';
        	}
        	?>
        	</span>
        </td>
		<td >
           <?= $user->created?>
        </td>
		<td>
		
			<?= $this->Html->link('<i class="fa fa-lg fa-fw fa-search"></i>', ['action' => 'view', $user->id], array ('escape' => false))?>
		<?php 
		$loguser = $this->request->session ()->read ( 'Auth.User' );
		if (strpos('admin', $loguser ['role']) !== false) {?>
			<?= $this->Html->link('<i class="fa fa-lg fa-fw fa-pencil-square-o"></i>', ['action' => 'edit', $user->id], array ('escape' => false))?>
			<?=$this->Form->postLink ('<i class="fa fa-lg fa-fw fa-trash"></i>' , array ('action' => 'delete',$user->id ), array ('escape' => false,'confirm' => __ ( 'Você tem certeza que deseja remover permanentemente a inscrição Nº' . $user->id . ' ?' ) ) );?>
		<?php }?>		
        </td>
		
        
        <td style="text-align:center;">
        	<div  style="<?php echo $user->ativo ? 'background-color:#b3ffb3;':'background-color:#ddd;';?>  width: 40px; height: 40px; line-height: 40px; margin:auto; border: 0px; border-radius: 6px;font-size: 1.5em; text-align:center;">
        	 <?=$this->Form->postLink ('<i class="fa fa-check"></i>' , array ('action' => 'validar',$user->id ), array ('style'=> $user->ativo ? 'color:#555;':'color:#999;' ,'escape' => false,'confirm' => __ ( 'Validar ' . $user->nome . ' ?' ) ) );?>
        	 </div>
       </td>
        <td style="text-align:center;">
        <div  style="<?php echo $user->credenciado ? 'background-color:#b3ffb3;':'background-color:#ddd;';?>  width: 40px; height: 40px; line-height: 40px; margin:auto; border: 0px; border-radius: 6px;font-size: 1.5em; text-align:center;">
        	 <?=$this->Form->postLink ('<i class="fa   fa-flag-checkered"></i>' , array ('action' => 'credenciar',$user->id ), array ('style'=> $user->credenciado ? 'color:#555;':'color:#999;','escape' => false,'confirm' => __ ( 'Credenciar ' . $user->nome . ' ?' ) ) );?>
        	 </div>
       </td>
        <td >
        	<div  style="<?php echo $user->imp_certificado ? 'background-color:#b3ffb3;':'background-color:#ddd;';?>  width: 40px; height: 40px; line-height: 40px; margin:auto; border: 0px; border-radius: 6px;font-size: 1.5em; text-align:center;">
        	<?=$this->Form->postLink ('<i class="fa  fa-print"></i>' , array ('action' => 'certificadoImpresso',$user->id ), array ('style'=> $user->imp_certificado ? 'color:#555;':'color:#999;', 'escape' => false,'confirm' => __ ( 'Imprimir Certificado de' . $user->nome . ' ?' ) ) );?>
        	</div>
        </td>
	</tr>
    <?php endforeach; ?>
    </tbody>
	
	
</table>
<div  style="width:100%;  text-align: center; background-color: #ddd;">
	
	
		
		<?php echo $this->Html->link('<i class="fa fa-file-excel-o fa-2x"> Todos Inscritos</i>',array('controller'=>'users','action'=>'exportTotal'), array('class'=>'btn btn-default btn-sm col-xs-4', 'target'=>'_blank','escape' => false));?>
		<?php echo $this->Html->link('<i class="fa fa-file-excel-o fa-2x"> Certificado Participante</i>',array('controller'=>'users','action'=>'exportImpCertificados'), array('class'=>'btn btn-default btn-sm col-xs-4', 'target'=>'_blank','escape' => false));?>
		<?php echo $this->Html->link('<i class="fa fa-file-excel-o fa-2x"> Certificado Minicurso</i>',array('controller'=>'userminicursos','action'=>'exportMinicursosCertificado'), array('class'=>'btn btn-default btn-sm col-xs-4', 'target'=>'_blank','escape' => false));?>
		
	</div>	
<div  style="width:100%;  text-align: center; background-color: #ddd;">
		<?php 
// 		if (strpos('admin', $loguser ['role']) !== false) {
// 			echo $this->Html->link('<i class="fa fa-envelope fa-lg"> Enviar e-mail de validação para todos os usuários não validados</i>',array('controller'=>'users','action'=>'lembrarValidacaoEmail'), array('escape' => false, 'confirm' => __ ( 'Deseja enviar um e-mail para cada usuário não validado? (use com moderação!)' )));
// 		}
		?>
		
</div>
</div>
</div>