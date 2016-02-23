<!-- File: src/Template/Users/login.ctp -->
<div class="container" style="width:60%;padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>
</div>