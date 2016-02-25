<!-- src/Template/Users/index.ctp -->
<?= $this->assign('title', 'Confirmar Inscrição'); ?>

<div class="container" style="width:90%;padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
<?= $this->Flash->render('auth') ?>
<h1>Inscritos</h1>
<table>
	<tr>
		<td width="100%" colspan="6" style="border: 1px solid #ddd;">
		<div style="width: 100%; text-align: center;">
			<div style="width: 19%;float: left;"><i class="fa fa-fw fa-trash"> Remover</i> </div>
			<div style="width: 19%;float: left;"><i class="fa fa-fw fa-search"> Visualizar</i> </div>
			<div style="width: 19%;float: left;"><i class="fa fa-fw fa-pencil-square-o"> Editar</i> </div>
			<div style="width: 19%;float: left;"><i class="fa fa-fw fa-check"> Validado</i> </div>
			<div style="width: 19%;float: left;"><i class="fa fa-fw fa-times"> Pendente</i> </div>
		</div>
		</td>
	</tr>
	<tr>
		<th width="5%">Nº</th>
		<th width="40%">Nome</th>
		<th width="11%">Data Inscrição</th>
		<th width="15%" >Ações</th>
		<th width="8%">Status</th>
		<th width="13%">Papel</th>
	</tr>

    <?php foreach ($users as $user): ?>
    <tr>
		<td><?= $user->id ?></td>
		<td>
            <?= $this->Html->link($user->nome, ['action' => 'view', $user->id])?>
        </td>
		<td>
           <?= $user->created?>
        </td>
		<td>
			<?=$this->Form->postLink ('<i class="fa fa-lg fa-fw fa-trash"></i>' , array ('action' => 'delete',$user->id ), array ('escape' => false,'confirm' => __ ( 'Você tem certeza que deseja remover permanentemente a inscrição Nº' . $user->id . ' ?' ) ) );?>		
			<?= $this->Html->link('<i class="fa fa-lg fa-fw fa-search"></i>', ['action' => 'view', $user->id], array ('escape' => false))?>
			<?= $this->Html->link('<i class="fa fa-lg fa-fw fa-pencil-square-o"></i>', ['action' => 'edit', $user->id], array ('escape' => false))?>
        </td>
		<td>
            <?php
					
					if ($user->ativo) {
						echo '<i class="fa fa-lg fa-fw  fa-check"></i>';
					} else {
						echo '<i class="fa fa-lg fa-fw  fa-times"></i>';
					}
					?>
        </td>
        <td>
        	<?php 
        	if ($user->role === 'admin') {
        		echo '<i class="fa fa-lg fa-fw fa-cogs"></i>';
        	}else if ($user->role === 'participante') {
        		echo '<i class="fa fa-lg fa-fw fa-user"></i>';
        	}else if ($user->role === 'palestrante') {
        		echo '<i class="fa fa-lg fa-graduation-cap"></i>';
        	} else if ($user->role === 'supervisor') {
        		echo '<i class="fa fa-lg fa-fw fa-cog"></i>';
        	}
        	echo $user->role;
        	?>
        </td>
	</tr>
    <?php endforeach; ?>

</table>

<?php echo $this->Html->link('<i class="fa fa-file-excel-o fa-lg"> Exportar para planilha (CSV)</i>',array('controller'=>'users','action'=>'export'), array('target'=>'_blank','escape' => false));?>
</div>