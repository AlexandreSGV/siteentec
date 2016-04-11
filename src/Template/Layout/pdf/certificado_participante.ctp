
<style>
html{
	margin: 0px;

}
body{
	width:100%; 
	height:100%;
	left: 0px; 
	top: 0px;
	position:fixed;
	background-image: url('img/certificado_fundo.png');background-size: 100%;padding: 0px;
 	margin: 0px; 
}
#texto{
	text-align: justify;
	left: 7%;
	top: 35%;
	width: 86%;
	position:fixed;
	font-size: 26px;
	line-height: 40px;
	font-family: Calibri,sans-serif;
}


#incricao{
	
	text-align: center;
	left: 40%;
	top: 3%;
	width: 20%;
	position:fixed;
	font-size: 18px;
	font-family: Calibri,sans-serif;
}
</style>

<html >
<body>

<div id="incricao">
Inscrição Nº <b><?= $user->id ?></b>
</div>

<div id="texto">
Certificamos que <b><?= $user->nome ?></b> participou como ouvinte do I Encontro de Tecnologia da Informação do IFPE, com carga horária de 16 horas, realizado nos dias 6 e 7 de abril de 2016, promovido pelo Instituto Federal de Pernambuco - Campus Igarassu.

</div>
</body>
</html>