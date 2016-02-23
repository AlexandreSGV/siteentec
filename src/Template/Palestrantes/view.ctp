<!-- src/Template/Palestrantes/view.ctp -->
<?= $this->assign('title', 'Visualizar Palestrantes'); ?>
<div class="container" style="width:80%;padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
<form>
	<fieldset>
		<legend>Dados do palestrante: </legend>
		 <?= $this->Html->image('/imagestore/'.$palestrante->foto, array("class" => "imagemPerfil"))  ?>
		<br> <b>Nome : </b> <?= h($user['nome'])?>
		<br> <b>Ocupação : </b> <?= h($palestrante->ocupacao)?>
		<br> <b>Perfil : </b> <?= h($palestrante->perfil)?>
		  
	</fieldset>
</form>
</div>