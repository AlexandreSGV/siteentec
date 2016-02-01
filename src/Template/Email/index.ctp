<?= $this->assign('title', 'email'); ?>

<?php

 echo $this->Form->create($email);
 echo $this->Form->input('assunto');
 echo $this->Form->input('corpo');
 echo $this->Form->button('Enviar');
 echo $this->Form->end();

?>
