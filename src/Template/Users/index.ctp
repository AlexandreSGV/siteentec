<!-- src/Template/Users/index.ctp -->
<?= $this->assign('title', 'Confirmar Inscrição'); ?>

<div class="container" style="width:80%;padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
<h1>Inscritos</h1>
<table>
	<tr>
		<th width="10%">Nº</th>
		<th width="45%">Nome</th>
		<th width="15%">Data Inscrição</th>
		<th width="15%">Ações</th>
		<th width="15%">Status</th>
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
						echo '<i class="fa fa-lg fa-fw  fa-check">Verificado</i>';
					} else {
						echo '<i class="fa fa-lg fa-fw  fa-times">Pendente</i>';
					}
					?>
        </td>
	</tr>
    <?php endforeach; ?>

</table>
</div>