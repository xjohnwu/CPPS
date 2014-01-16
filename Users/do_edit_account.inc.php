<?php
	include_once("User.php");
	$form = $_POST["edit"];

	$user = new User();
	$user->loadUserFromSessionId();
	
	if ($form["oldpass"] == "" || $user->verifyPassword($form["oldpass"]))
	{
		$user->setEmail($form["mail"]);
		if ($form["oldpass"] != "")
		{
			echo $form["pass"];
			$user->setPassword($form["pass"]);
		}
		$user->setFirstName($form["first_name"]);
		$user->setTitle($form["title"]);
		$user->setLastName($form["last_name"]);
		$user->setGender($form["gender"]);
		$user->setTel($form["tel"]);
		$user->setBirthday($form["birthday"]);
		$user->update();
		header("Location:msg.php?m=update_success");
	}
	else
	{
		echo "Old password is wrong..."; // Todo by Han: add AJAX to verify old password
	}
?>