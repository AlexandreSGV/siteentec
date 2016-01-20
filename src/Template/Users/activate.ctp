<!-- src/Template/Users/activate.ctp -->
<?= $this->assign('title', 'Confirmar Inscrição'); ?>
 <h1>Usuário Ativado</h1>
 
 <h1><?= h($user->id) ?></h1>
 
 <h1><?= h($user->activation_code) ?></h1>