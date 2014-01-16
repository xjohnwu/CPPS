<?php
include("Languages/settings.php");

switch($_GET["m"])
{
	case "register_success":
		$msg=register_success_msg;
		$href="<a href='index.php'>".back_msg."</a>";
		break;

	case "update_success":
		$msg=update_success_msg;
		$href="<a href='account.php'>".back_msg."</a>";
		break;
		
	case "upload_success":
		$msg=upload_success_msg;
		$href="<a href='account.php'>"."back_msg"."</a>";
		break;

	case "del_success":
		$msg=del_success_msg;
		$href="<a href='admin.php'>"."back_msg"."</a>";
		break;
		
	case "change_password_success":
		$msg=change_password_msg;
		$href="<a href='index.php'>"."back_msg"."</a>";
		break;
	
	case "login_error":
		$msg=login_error_msg;
		$href="<a href='Users/logout.php'>".back_msg."</a>";
		break;
}
echo $msg.$href;