<!-- File: src/Template/Users/login.ctp -->
<div class="container" style="width:60%;padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, entre com seu e-mail e senha: ') ?></legend>
        <?= $this->Form->input('username',['label' => 'E-mail']) ?>
        <?= $this->Form->input('password',['label' => 'Senha']) ?>
    </fieldset>
<?= $this->Form->button(__('Entrar')); ?>
<?= $this->Form->end() ?>
</div>
</div>