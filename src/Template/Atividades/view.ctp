<!-- src/Template/Palestrantes/view.ctp -->
<?= $this->assign('title', 'Visualizar Palestrantes'); ?>

<div class="container" style="width:80%;padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
		<h1><b>  <?= $atividade['tipo'].' - '.$atividade['titulo'] ?> </b></h1>
		<h3><b>  <?= $atividade['nome'] ?> </b></h3>
		<h5>  <?= $atividade['ocupacao'] ?> </h5>
		<p>  <b>Descrição: </b><br> <?= $atividade['descricao'] ?> </p> 
</div>