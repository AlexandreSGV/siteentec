<h1>Edit User</h1>
<?php
    echo $this->Form->create($user);
    echo $this->Form->input('nome');
    echo $this->Form->input('cpf') ;
    echo $this->Form->input('telefone');
    echo $this->Form->button(__('Save User'));
    echo $this->Form->end();
?>