<?php
if(isset($_SESSION["userid"]))
{
	header("Location:index.php");
}
else if(isset($_POST["op"]))
{
	if ($_POST["op"] == "login")
	{
		include("Users/do_login.php");
	}
	else if ($_POST["op"] == "register")
	{
		include("Users/do_register.inc.php");
	}
	exit;
}
include("include/header.php");
?>
<body>
<script>
	function check_form() {
		password = document.getElementById("reg-pass").value;
		password2 = document.getElementById("reg-pass2").value;
		mail = document.getElementById("reg-mail").value;
		firstname = document.getElementById("reg-firstname").value;
		lastname = document.getElementById("reg-lastname").value;
		emsg = "";
		var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		if(!pattern.test(mail)) emsg += "Invalid email address. \n";
		if(password == "") emsg += "Please enter your password. \n";
		else if(password != password2) emsg += "The passwords you entered do not match. \n";
		if(firstname == "") emsg += "Please enter your first name. \n";
		if(lastname == "") emsg += "Please enter your last name. \n";
		if(emsg != "" ) {
			emsg = "------------------------------------------\n\n"+emsg;
			emsg = emsg+"\n------------------------------------------";
			alert(emsg);
			return false;
		}else {
			return true;
		}
	}
</script>
    <div id="wrap">
        <?php include("include/title.php") ?>
        <div id="main">
        	<div id="login">
               	<h3>Login</h3>
                <!-- begin content -->
                <form action="registerandlogin.php" method="post" id="user_login">
                    <div>
                        <div class="form-item">
                         <label for="login-mail">Email</label>
                         <input type="text" maxlength="60" name="login[mail]" id="login-mail"  size="30" class="form-text required" />
                        </div>
                        <div class="form-item">
                         <label for="login-pass">Password</label>
                         <input type="password" maxlength="" name="login[pass]" id="login-pass"  size="30" class="form-text required" />
                        </div>
                        <input type="submit" name="op" value="login"  class="form-submit" />
                    </div>
                </form>
            </div>
            <!-- begin content -->
            <div id="register">
            	<h3>Register</h3>
                <form action="registerandlogin.php" method="post" id="user_register">
                <div>
                    <div class="form-item">
                        <label for="reg-mail">Email <span class="form-required" title="This field is required.">*</span></label>
                        <div><input type="text" maxlength="64" name="reg[mail]" id="reg-mail"  size="30" value="" class="form-text required" /></div>
                    </div>
                    <div class="form-item">
                        <label for="reg-pass">Password <span class="form-required" title="This field is required.">*</span></label>
                        <div><input type="password" maxlength="64" name="reg[pass]" id="reg-pass"  size="30" value="" class="form-text required" /></div>
                    </div>
                    <div class="form-item">
                        <label for="reg-pass2">Confirm Password <span class="form-required" title="This field is required.">*</span></label>
                        <div><input type="password" maxlength="64" name="reg[pass2]" id="reg-pass2"  size="30" value="" class="form-text required" /></div>
                    </div>
                    <div class="form-item">
                        <label for="reg-title">Title</label>
                        <div><input type="text" maxlength="20" name="reg[title]" id="reg-title"  size="30" value=""/></div>
                    </div>                    
                    <div class="form-item">
                        <label for="reg-firstname">First Name <span class="form-required" title="This field is required.">*</span></label>
                        <div><input type="text" maxlength="64" name="reg[first_name]" id="reg-firstname"  size="30" value="" class="form-text required" /></div>
                    </div>
                    <div class="form-item">
                        <label for="reg-lastname">Last Name <span class="form-required" title="This field is required.">*</span></label>
                        <div><input type="text" maxlength="64" name="reg[last_name]" id="reg-lastname"  size="30" value="" class="form-text required" /></div>
                    </div>
                    <div class="form-item">
                        <label for="reg-gender">Gender: </label>
                        <div>
                            <input type="radio" name="reg[gender]" value="0" checked=checked />Secret
                            <input type="radio" name="reg[gender]" value="1" />Male
                            <input type="radio" name="reg[gender]" value="2" />Female
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="reg-tel">Phone: </label>
                        <div>
                            <input type="text" maxlength="64" name="reg[tel]" id="reg-tel"  size="30" value="" />
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="reg-birthday">Birthday: </label>
                        <div>
                            <input type="text" maxlength="64" name="reg[birthday]" id="reg-birthday"  size="30" value="" />
                        </div>
                    </div>
                    <input type="submit" name="op" value="register" class="form-submit" onClick="return check_form();"  />
                </div>
                </form>
            </div>
        </div>
       	<?php include("include/sidebar.php") ?>
        <?php include("include/footer.php")?>
    </div>
</body>
</html>