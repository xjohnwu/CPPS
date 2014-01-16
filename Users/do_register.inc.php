<?php
	include("User.php");
	$form = $_POST["reg"];

	$user = new User();
	$user->createEmpty();
	$user->setEmail($form["mail"]);
	$user->setPassword($form["pass"]);
	$user->setTitle($form["title"]);
	$user->setLastName($form["last_name"]);
	$user->setFirstName($form["first_name"]);
	$user->setGender($form["gender"]);
	$user->setTel($form["tel"]);
	$user->setBirthday($form["birthday"]);
	$user->insert();
	$user->createSession();
	header("Location:msg.php?m=register_success");
?>