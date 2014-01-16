<?php
	if(isset($_POST["op"]) && $_POST["op"] == "Update") {
		include("Users/do_edit_account.inc.php");
		exit;
	}

	session_start();
	if(!$_SESSION["userid"]) header("Location:register.php");
	include("Users/User.php");
	$id = $_SESSION["userid"];
	$user = new User();
	$user->loadUserFromSessionId();
	
include("include/header.php");
?>
<body>
<div id="wrap">
	<div>
        <h2 class="title"><?php echo $user->getFirstName(); ?></h2>
        <ul class="menu">
            <li class="leaf"><a href="Users/logout.php">log out</a></li>
        </ul>
    </div>
    <script>
	function check_form() {
		password = document.getElementById("edit-pass").value;
		password2 = document.getElementById("edit-pass2").value;
		mail = document.getElementById("edit-mail").value;
		emsg = "";
		if(password != password2) emsg += "两次输入密码不同. \n";
		var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
		if(!pattern.test(mail)) emsg += "邮件格式不正确. \n";
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
    <!-- begin content -->
    <div class="nofloat">
    <form action="account.php"  method="post" id="user_edit">
    <div class="form-item">
        <label for="edit-mail">Email: </label>
        <input type="text" maxlength="64" name="edit[mail]" id="edit-mail"  size="30" value="<?php echo $user->getEmail(); ?>" class="form-text required" />
    </div>
    <div class="form-item">
        <label for="edit-oldpass">Old Password</label>
     	<input type="password" maxlength="64" name="edit[oldpass]" id="edit-oldpass"  size="30" value="" />
     	<div class="description">Please leave it blank if you don't intend to change your password</div>
    </div>
    <div class="form-item">
        <label for="edit-pass">New Password <span class="form-required" title="This field is required.">*</span></label>
        <div><input type="password" maxlength="64" name="edit[pass]" id="edit-pass"  size="30" value="" class="form-text required" /></div>
    </div>
    <div class="form-item">
        <label for="edit-pass2">Confirm Password <span class="form-required" title="This field is required.">*</span></label>
        <div><input type="password" maxlength="64" name="edit[pass2]" id="edit-pass2"  size="30" value="" class="form-text required" /></div>
    </div>
    <div class="form-item">
        <label for="edit-title">Title</label>
        <div><input type="text" maxlength="30" name="edit[title]" id="edit-title"  size="30" value="<?php echo $user->getTitle(); ?>" /></div>
    </div>
    <div class="form-item">
        <label for="edit-firstname">First Name <span class="form-required" title="This field is required.">*</span></label>
        <div><input type="text" maxlength="64" name="edit[first_name]" id="edit-firstname"  size="30" value="<?php echo $user->getFirstName(); ?>" class="form-text required" /></div>
    </div>
    <div class="form-item">
        <label for="edit-lastname">Last Name <span class="form-required" title="This field is required.">*</span></label>
        <div><input type="text" maxlength="64" name="edit[last_name]" id="edit-lastname"  size="30" value="<?php echo $user->getLastName(); ?>" class="form-text required" /></div>
    </div>
    <div class="form-item">
        <label for="edit-gender">Gender: </label>
        <div>
            <input type="radio" name="edit[gender]" value="0" <?php if($user->getGender()==0) echo "checked=checked"; ?> />Secret
            <input type="radio" name="edit[gender]" value="1" <?php if($user->getGender()==1) echo "checked=checked"; ?> />Male
            <input type="radio" name="edit[gender]" value="2" <?php if($user->getGender()==2) echo "checked=checked"; ?> />Female
        </div>
    </div>
    <div class="form-item">
        <label for="edit-tel">Phone: </label>
        <div>
        	<input type="text" maxlength="64" name="edit[tel]" id="edit-tel"  size="30" value="<?php echo $user->getTel(); ?>" />
        </div>
    </div>
    <div class="form-item">
    	<label for="edit-birthday">Birthday: </label>
        <div>
        	<input type="text" maxlength="64" name="edit[birthday]" id="edit-birthday"  size="30" value="<?php echo $user->getBirthday(); ?>" />
        </div>
    </div>
    <input type='hidden' name='id' value='<?php echo $user->getId(); ?>' />
    <input type="submit" name="op" value="Update"  class="form-submit" onClick="return check_form();"/>
    </form>
    </div>
</div>
</body>
</html>
