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

<p>Para confirmar a sua inscrição no ENTEC clique no link abaixo:
<br><?= $activation_link ?>
<p>Consulte a nossa programação em http://entec.ifpe.edu.br</p>
<br>O seu número de inscrição é <b><?= $ninscricao ?></b></p>
<br>No ato do credenciamento, apresente um documento com foto e o número da sua inscrição.
<p>Aproveite a conferência!<p>
<hr style="border:none;color:#909090;background-color:#b0b0b0;min-height:1px;width:99%">
<p>I Encontro de Tecnologia da Informação do IFPE
<br>Dias 25 e 26 de Fevereiro
<br>Igarassu - PE
<br>http://entec.ifpe.edu.br<p>
</body>
</html>
