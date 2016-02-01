<!-- src/Template/Users/index.ctp -->
<?= $this->assign('title', 'Confirmar Inscrição'); ?>



<h1>Inscritos</h1>
<table>
	<tr>
		<th width="10%">Nº</th>
		<th width="45%">Nome</th>
		<th width="18%">Data Inscrição</th>
		<th width="18%">Ações</th>
		<th width="9%">Status</th>
	</tr>

    <?php foreach ($users as $user): ?>
    <tr>
		<td><?= $user->id ?></td>
		<td>
            <?= $this->Html->link($user->nome, ['action' => 'view', $user->id])?>
        </td>
		<td>
           <?= date('d/m/Y H:i:s', strtotime($user->created))?>
        </td>
		<td>
			<?=$this->Form->postLink ( $this->Html->image ( 'delete_icon_24.png', array ('alt' => __ ( 'Deletar' ) ) ), array ('action' => 'delete',$user->id ), array ('escape' => false,'confirm' => __ ( 'Você tem certeza que deseja remover permanentemente a inscrição Nº' . $user->id . ' ?' ) ) );?>		
			<?=$this->Html->image ( 'view_icon_24.png', [ 'alt' => 'Visualizar' , 'url' => ['controller' => 'Users', 'action' => 'view', $user->id]]);?>
        </td>
		<td>
            <?php
					
					if ($user->ativo) {
						echo $this->Html->image ( 'verify_true_24.png', [ 
								'alt' => 'Verificado' 
						] );
					} else {
						echo $this->Html->image ( 'verify_false_24.png', [ 
								'alt' => 'Não Verificado' 
						] );
					}
					?>
        </td>
	</tr>
    <?php endforeach; ?>

</table>