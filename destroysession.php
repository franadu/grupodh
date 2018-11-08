<?php
	require ("funciones/funciones.php");
	logout();
	setcookie("username","",time()-100);
	setcookie("verify","",time()-100);
	header("location:home.php");
	exit;
 ?>
