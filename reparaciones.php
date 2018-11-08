<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<?php require 'html/head.php'; ?>
		<meta charset="utf-8">
		<title>Estamos en reparaciones</title>
	</head>
	<body>
		<?php require 'html/header.php'; ?>
		<main class="reparaciones">
			<h1>Ooops</h1>
			<p>El sitio esta siendo reparado vuelva pronto</p>
			<p><?php  if(isset($_GET["error"])) { echo $_GET["error"];} ?></p>
		</main>
		<?php require 'html/footer.php'; ?>
	</body>
</html>
