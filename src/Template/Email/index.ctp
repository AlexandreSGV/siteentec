<?= $this->assign('title', 'email'); ?>
<div class="container" style="width:80%;padding-top: 89px; margin-bottom: 10px; ">
<?= $this->Flash->render()?>
<?php

 echo $this->Form->create($email);
 echo $this->Form->input('assunto');
 echo $this->Form->input('corpo');
 echo $this->Form->button('Enviar');
 echo $this->Form->end();

?>
</div>