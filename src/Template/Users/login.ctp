<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, entre com o seu e-mail e senha') ?></legend>
        <?= $this->Form->input('username',  array(
    'placeholder' => 'e-mail', 'label' => 'e-mail', 'name' => 'e-mail'));?>
        <?= $this->Form->input('password',  array(
    'placeholder' => 'senha', 'label' => 'senha')) ?>
    </fieldset>
<?= $this->Form->button(__('ENTRAR')); ?>
<?= $this->Form->end() ?>
</div>