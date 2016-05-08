<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?= $this->fetch('title') ?></title>
</head>
<body>
<p><?= $nome ?>,</p>

<p>por algum motivo a sua inscrição no ENTEC ainda não foi validada. 
<br>Para confirmar a sua presença CLIQUE no link abaixo que a validação será automática!</p>
<br>
Clique no link: <h4><b><?= $activation_link ?></b></h4>
<br>
<br>
Caso tenha problemas envie um e-mail para: contatoentec@igarassu.ifpe.edu.br
<br>
<hr style="border:none;color:#909090;background-color:#b0b0b0;min-height:1px;width:99%">
<p>I Encontro de Tecnologia da Informação do IFPE - EnTec 2016
<br>Dias 6 e 7 de Abril de 2016
<br>Igarassu - PE
<br>http://entec.ifpe.edu.br<p>
</body>
</html>
