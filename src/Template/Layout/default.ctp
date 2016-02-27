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
$cakeDescription = 'ENTEC - Encontro de Tecnologia da Informação do IFPE';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset()?>
    <meta name="viewport"
	content="width=device-width, initial-scale=1.0">
<title>
        <?= $cakeDescription ?>
        [<?= $this->fetch('title')?>]
    </title>
    <?= $this->Html->meta('icon')?>


    <?= $this->Html->css('pingendo-bootstrap.css')?>
    <?= $this->Html->css('font-awesome.min.css')?>
    <!-- <?= $this->Html->css('base.css')?> -->
    <!-- <?= $this->Html->css('cake.css')?> -->
    <!-- <?= $this->Html->css('main.css')?> -->
    <?= $this->Html->script('jquery.min.js'); ?>
    <?= $this->Html->script('scrollTo/jquery.scrollTo.min.js'); ?>
    <?= $this->Html->script('bootstrap.min.js'); ?>


    <?= $this->fetch('meta')?>
    <?= $this->fetch('css')?>
    <?= $this->fetch('script')?>
</head>
<body data-spy="scroll" data-target=".navbar">
	<!--<div class="cover" style="opacity: 1;">-->
	<div class="navbar navbar-fixed-top navbar-inverse">



		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#navbar-ex-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<!-- <a class="navbar-brand"><img height="20" alt="Brand"
					src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAA81BMVEX///9VPnxWPXxWPXxWPXxWPXxWPXxWPXz///9hSYT6+vuFc6BXPn37+vz8+/z9/f2LeqWMe6aOfqiTg6uXiK5bQ4BZQX9iS4VdRYFdRYJfSINuWI5vWY9xXJF0YJR3Y5Z4ZZd5ZZd6Z5h9apq0qcW1qsW1q8a6sMqpnLyrn76tocCvpMGwpMJoUoprVYxeRoJjS4abjLGilLemmbrDutDFvdLPx9nX0eDa1OLb1uPd1+Td2OXe2eXh3Ofj3+nk4Orl4evp5u7u7PLv7fPx7/T08vb08/f19Pf29Pj39vn6+fuEcZ9YP35aQn/8/P1ZQH5fR4PINAOdAAAAB3RSTlMAIWWOw/P002ipnAAAAPhJREFUeF6NldWOhEAUBRvtRsfdfd3d3e3/v2ZPmGSWZNPDqScqqaSBSy4CGJbtSi2ubRkiwXRkBo6ZdJIApeEwoWMIS1JYwuZCW7hc6ApJkgrr+T/eW1V9uKXS5I5GXAjW2VAV9KFfSfgJpk+w4yXhwoqwl5AIGwp4RPgdK3XNHD2ETYiwe6nUa18f5jYSxle4vulw7/EtoCdzvqkPv3bn7M0eYbc7xFPXzqCrRCgH0Hsm/IjgTSb04W0i7EGjz+xw+wR6oZ1MnJ9TWrtToEx+4QfcZJ5X6tnhw+nhvqebdVhZUJX/oFcKvaTotUcvUnY188ue/n38AunzPPE8yg7bAAAAAElFTkSuQmCC"></a> -->
			</div>
			<div class="collapse navbar-collapse" id="navbar-ex-collapse">

				<ul class="nav navbar-nav navbar-right">

					<li>
					<?php
					echo $this->Html->link ( '<i class="fa fa-home fa-lg"></i>' . ' Home', ($this->fetch ( 'title' ) === 'home') ? '#home' : '/#home', array (
							'escape' => false,
							'id' => 'home-link'
					) );
					?>
					</li>
					<!-- <li>
					<?php
					echo $this->Html->link ( '<i class="fa fa-lg fa-list-alt"></i>' . ' Programa', ($this->fetch ( 'title' ) === 'home') ? '#program' : '/#program', array (
							'escape' => false,
							'id' => 'program-link'
					) );
					?>
					</li> -->
<!-- 					<li> -->
					<?php
// 					echo $this->Html->link ( '<i class="fa fa-book fa-lg"></i>' . ' Mostra Acadêmica', ($this->fetch ( 'title' ) === 'home') ? '#academic' : '/#academic', array (
// 							'escape' => false,
// 							'id' => 'academic-link'
// 					) );
// 					?>
<!-- 					</li> -->

					<li>
					<?php
					echo $this->Html->link ( '<i class="fa fa-lg fa-map-marker"></i>' . ' Local', ($this->fetch ( 'title' ) === 'home') ? '#where' : '/#where', array (
							'escape' => false,
							'id' => 'where-link'
					) );
					?>
					</li>
					<!-- <li>
					<?php
					echo $this->Html->link ( '<i class="fa fa-group fa-lg"></i>' . ' Organização', ($this->fetch ( 'title' ) === 'home') ? '#people' : '/#people', array (
							'escape' => false,
							'id' => 'people-link'
					) );
					?>
					</li> -->

					<!-- 					<li><a href="#insc" id="insc-link"><i class="fa fa-lg fa-pencil"></i> -->
					<!-- 							Inscrições</a></li> -->
					<!-- $this->Html->italic('',['class' => 'fa fa-lg fa-pencil']) -->
					<!-- <li><?php
					echo $this->Html->link ( '<i class="fa fa-lg fa-pencil"></i>' . 'Inscrições', [
							'controller' => 'users',
							'action' => 'add'
					], array (
							'escape' => false,
							'id' => 'insc-link'
					) );
					?></li> -->


				</ul>
			</div>
		</div>
	</div>




					<?= $this->fetch('content')?>
			<footer class="bg-success">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h1>I ENTEC</h1>
					<p>
						Instituto Federal de Pernambuco <br>Campus Igarassu <br>Sede
						Provisória Faculdade de Igarassu (Facig) – Avenida Alfredo
						Bandeira de Melo S/N, BR-101 Norte, Km 44, Igarassu-PE
					</p>
				</div>
				<div class="col-sm-6">
					<p class="text-info text-right">
						<br> <br>
					</p>
					<div class="row">
						<div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
							<a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
							<a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
							<a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
							<a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 hidden-xs text-right">
							<a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
							<a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
							<a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
							<a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div id="entrarDiv" class="container">
		<div class="row">
			<div class="col-md-12 text-right">

			<?php

			$loguser = $this->request->session ()->read ( 'Auth.User' );
			if (strpos('admin supervisor', $loguser ['role']) !== false) {
				?>
		<ul id="menuadmin">
			<li><a href="#"><i class="fa fa-arrow-up"></i> Administrar</a>
				<ul>
					<li><?php echo $this->Html->link ( "Gerenciar inscrições", array ( 'controller' => 'users', 'action' => 'index' ) );?></li>
					<?php if (strpos('admin', $loguser ['role']) !== false) {?>
					<li><?php echo $this->Html->link ( "Gerenciar Atividades", array ( 'controller' => 'atividades', 'action' => 'manage' ) );?></li>
					<li><?php echo $this->Html->link ( "Cadastrar Atividades", array ( 'controller' => 'atividades', 'action' => 'add' ) );?></li>
					<li><?php echo $this->Html->link ( "Gerenciar palestrantes", array ( 'controller' => 'palestrantes', 'action' => 'manage' ) );?></li>
					<li><?php echo $this->Html->link ( "Cadastrar palestrantes", array ( 'controller' => 'palestrantes', 'action' => 'add' ) );?></li>
					<li><?php echo $this->Html->link ( "Envio de e-mails", array ( 'controller' => 'email', 'action' => 'index' ) );?></li>
					<?php }?>
				</ul></li>
		</ul>

			<?php
			}

			if ($loguser) {
				$user = $loguser ['nome'] . ' (' . $loguser ['username'] . ') ';

				echo $this->Html->link ( '<i class="fa fa-user fa-lg"></i> ' .$user, array (
						'controller' => 'users',
						'action' => 'view',
						$loguser ['id']
				), array('escape' => false) );

				echo $this->Html->link ( '<i class="fa fa-sign-out fa-lg"></i>' . 'Sair', array (
						'controller' => 'users',
						'action' => 'logout'
				), array ('escape' => false ) );
			} else {

				echo $this->Html->link ( '<i class="fa fa-sign-in fa-lg"></i>' . ' Entrar', array (
						'controller' => 'users',
						'action' => 'login'
				), array (
						'escape' => false
				) );
			}
			?>
			 </div>
		</div>
	</div>

	<script type="text/javascript">
    $(document).ready(function() {

      function registerScroll(trigger, target, time) {
        $(trigger).on("click", function(event) {
          $('body').scrollTo(target, time, "easeInOutExpo");
          event.preventDefault();
          $(this).blur();
        });
      }

      <?php
      if ($this->fetch('title') === 'home') {
      ?>
	      registerScroll("#home-link",     "#home",     400);
	      registerScroll("#program-link",  "#program",  400);
	      registerScroll("#academic-link", "#academic", 400);
	      registerScroll("#where-link",    "#where",    1000);
	      registerScroll("#people-link",   "#people",   400);
	  <?php
		}
	  ?>

    });
  </script>
</body>
</html>
