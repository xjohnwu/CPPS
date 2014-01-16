<?php
if(isset($_SESSION["userid"]))
{
	include_once("Users/User.php");
	$user = new User();
	$user->loadUserFromSessionId();
	echo sprintf("<div id=\"mini_login\">Welcome <a href=\"account.php\">%s %s</a>. <a href=\"Users/logout.php\">Not you?</a></div>", $user->getFirstName(), $user->getLastName());
}
else
{
?>
<div id="mini_login">
    <form action="registerandlogin.php"  method="post" id="mini_login">
	<?php
    $str = $_SERVER["PHP_SELF"];
    $sub = "registerandlogin.php";
    if (!(substr( $str, strlen( $str ) - strlen( $sub ) ) === $sub))
    {
    ?>
    <span>
    	<label for="edit-mail">Email</label>
    	<input type="text" name="login[mail]" id="login-mail"  size="10" value="" class="form-text required" />
    </span>
    <span>
   		<label for="edit-pass">Password</label>
	    <input type="password" name="login[pass]" id="login-pass"  size="10" class="form-text required" />
    </span>
    	<input type="submit" name="op" value="login"  class="form-submit" />
	    <a href="registerandlogin.php">Register</a>
	<?php
    }
    ?>
    </form>
</div>
<?php
	};