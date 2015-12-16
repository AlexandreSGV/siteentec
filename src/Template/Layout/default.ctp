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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('main.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<div id="d1">
		<div id="entrarDiv">
			
			
			<?php
			if ($this->request->session())
			{
				echo "logado!!";
			}else{
				echo "nao logado!!";
			}
			echo $this->Html->image('user_icon.png', ['alt' => 'CakePHP']);
			echo $this->Html->link('Entrar',array('controller' => 'users','action' => 'login'));
			
			?>
			 </div>
		<nav id="menu">
			<ul>
				
				<li><a href="...">HOME</a></li>
				<li><a href="...">SOBRE</a></li>
				<li><?php
					if($this->fetch('title') === 'Inscrições') 
						echo "<span>INSCRIÇÕES</span>";
					else echo $this->Html->link('INSCRIÇÕES',array('controller' => 'users','action' => 'add'));?></li>
				<li><a href="...">PROGRAMAÇÃO</a></li>
				<li><a href="...">PALESTRANTES</a></li>
				<li>
				<?php 
					if($this->fetch('title') === 'local') echo "<span>LOCAL</span>";
					else echo $this->Html->link('LOCAL', array('controller' => 'pages','local'));
				?>
				</li>
				<li><a href="...">COORDENAÇÃO</a></li>
				<li><a href="...">CONTATO</a></li>		
			</ul>		
		</nav>
	</div>
	<div class="gridContainer">
		
		<div id="container">

			<div id="content">
				<?= $this->Flash->render() ?>

				<div class="row">
					<?= $this->fetch('content') ?>
				</div>
			</div>
			<footer>
			</footer>
		</div>
	</div>
</body>
</html>
