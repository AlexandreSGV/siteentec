<!-- src/Template/Palestrantes/view.ctp -->
<?= $this->assign('title', 'Visualizar Palestrantes'); ?>


		<h1><b>  <?= $atividade['tipo'].' - '.$atividade['titulo'] ?> </b></h1>
		<h3><b>  <?= $atividade['nome'] ?> </b></h3>
		<h5>  <?= $atividade['ocupacao'] ?> </h5>
		<p>  <b>Descrição: </b><br> <?= $atividade['descricao'] ?> </p> 
