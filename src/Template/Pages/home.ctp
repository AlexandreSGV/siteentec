<?= $this->assign('title', 'home'); ?>


<h5>HOME</h5>
<p>O I Encontro de Tecnologia da Informação do IFPE - EnTec 2015 é um evento promovido pelo Campus Igarassu do Instituto Federal de Pernambuco como ação do Curso Técnico em Informática para Internet. Trata-se de uma iniciativa para apresentar ao corpo discente do Instituto, em especial aos alunos da área de Tecnologia da Informação e Comunicação, os atuais desafios impostos aos profissionais da área de tecnologia. As discussões incluirão abordagens sobre competências, habilidades e tecnologias empregadas hoje no mercado, com destaques especiais para particularidades do cenário pernambucano.</p>






<?php echo $this->Html->link('Enviar e-mail de testes',array('controller' => 'users','action' => 'mail'));?>
