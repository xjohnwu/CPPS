<?php
	require_once("Connections/cpps.php");
	require_once("Users/User.php");
	$form = $_POST["login"];
	$email = $form["mail"];
	$password = $form["pass"];
	$user = new User();
	$user->loadUser($email, $password);
	$user->createSession();
	header("Location:index.php");
?>