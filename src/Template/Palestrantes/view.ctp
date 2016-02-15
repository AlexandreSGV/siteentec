<!-- src/Template/Palestrantes/view.ctp -->
<?= $this->assign('title', 'Visualizar Palestrantes'); ?>

<form>
	<fieldset>
		<legend>Dados do palestrante: </legend>
		 <?= $this->Html->image('/imagestore/'.$palestrante->foto, array("class" => "imagemPerfil"))  ?>
		<br> <b>Nome : </b> <?= h($user['nome'])?>
		<br> <b>Ocupação : </b> <?= h($palestrante->ocupacao)?>
		<br> <b>Perfil : </b> <?= h($palestrante->perfil)?>
		  
	</fieldset>
</form>