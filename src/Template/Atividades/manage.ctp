<!-- src/Template/Atividades/manage.ctp -->
<?= $this->assign('title', 'Gerenciar Atividades'); ?>

<h1>Inscritos</h1>
<table>
	<tr>
		<th width="45%">Titulo</th>
		<th width="18%">Tipo</th>
		<th width="18%">Palestrante</th>
		<th width="18%">Ações</th>
	</tr>

    <?php foreach ($atividades as $atv): ?>
    <tr>
		<td><?= $atv['titulo'] ?></td>
		<td><?= $atv['tipo'] ?></td>
		<td><?= $atv['nome'] ?></td>
		<td>
			<?=$this->Form->postLink ( $this->Html->image ( 'delete_icon_24.png', array ('alt' => __ ( 'Deletar' ) ) ), array ('action' => 'delete',$atv['id'] ), array ('escape' => false,'confirm' => __ ( 'Você tem certeza que deseja remover permanentemente a inscrição Nº' . $atv['id'] . ' ?' ) ) );?>		
			<?=$this->Html->image ( 'view_icon_24.png', [ 'alt' => 'Visualizar' , 'url' => ['controller' => 'Atividades', 'action' => 'view', $atv['id']]]);?>
        </td>
	</tr>
	
    <?php endforeach; ?>

</table>