<!-- src/Template/Users/activate.ctp -->
<?= $this->assign('title', 'Confirmar Inscri��o'); ?>
 <h1>Usu�rio Ativado</h1>
 
 <h1><?= h($user->id) ?></h1>
 
 <h1><?= h($user->activation_code) ?></h1>