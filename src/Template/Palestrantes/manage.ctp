<!-- src/Template/Palestrantes/manage.ctp -->
<?= $this->assign('title', 'Gerenciar Palestrantes'); ?>

<h1>Inscritos</h1>
<table>
	<tr>
		<th width="45%">Nome</th>
		<th width="18%">Ocupacao</th>
		<th width="18%">Ações</th>
	</tr>

    <?php foreach ($palestrantes as $palest): ?>
    <tr>
		<td><?= $palest['nome'] ?></td>
		<td><?= $palest['ocupacao'] ?></td>
		<td>
			<?=$this->Form->postLink ( $this->Html->image ( 'delete_icon_24.png', array ('alt' => __ ( 'Deletar' ) ) ), array ('action' => 'delete',$palest['id'] ), array ('escape' => false,'confirm' => __ ( 'Você tem certeza que deseja remover permanentemente a inscrição Nº' . $palest['id'] . ' ?' ) ) );?>		
			<?=$this->Html->image ( 'view_icon_24.png', [ 'alt' => 'Visualizar' , 'url' => ['controller' => 'Atividades', 'action' => 'view', $palest['id']]]);?>
        </td>
	</tr>
	
    <?php endforeach; ?>

</table>