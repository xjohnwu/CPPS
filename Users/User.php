<?php
include_once("Languages/settings.php");
include_once("Connections/CommonSql.php");
define("USER_ID", "userid");
define("DB_NAME", "users");

class User
{
	private $id;
	private $email;
	private $title;
	private $last_name;
	private $first_name;
	private $encrypted_password;
	private $gender;
	private $birthday;
	private $tel;
	private $reg_time;
	
	public function createEmpty()
	{
		$this->reg_time = date("Y-m-d H:i:s");	
	}

	public function loadUser($email, $password)
	{
		$sql = sprintf("select * from %s where email='%s'", DB_NAME, mysql_real_escape_string($email));
		$res = executeQuery($sql);
		$this->checkRow($res);
		$row = mysql_fetch_array($res);
		if (crypt($password, $row["password"]) != $row["password"])
		{
			header("Location:msg.php?m=login_error");
			exit;
		}
		$this->loadFromDb($row);
	}
	
	public function verifyPassword($password)
	{
		return crypt($password, $this->encrypted_password) == $this->encrypted_password;
	}
	
	public function loadUserFromSessionId()
	{
		if (session_id()=="") session_start();
		$this->id = $_SESSION[USER_ID];
		$sql = sprintf("select * from %s where id='%s'", DB_NAME, $this->id);
		$res = executeQuery($sql);
		$this->checkRow($res);
		$row = mysql_fetch_array($res);
		$this->loadFromDb($row);
	}
	
	private function checkRow($res)
	{
		if (mysql_num_rows($res) != 1)
		{
			header("Location:msg.php?m=login_error");
			exit;			
		}	
	}
	
	private function loadFromDb(array $row)
	{
		$this->id = $row["id"];
		$this->email = $row["email"];
		$this->encrypted_password = $row["password"];
		$this->title = $row["title"];
		$this->last_name = $row["last_name"];
		$this->first_name = $row["first_name"];
		$this->gender = $row["gender"];
		$this->birthday = $row["birthday"];
		$this->tel = $row["tel"];
		$this->reg_time = $row["reg_time"];
	}
	
	public function update()
	{
		$sql = sprintf("update %s set email='%s', title='%s', last_name='%s', first_name='%s', password='%s', gender='%s', birthday='%s', tel='%s' where id='%s'", DB_NAME, $this->email, $this->title, $this->last_name, $this->first_name, $this->encrypted_password, $this->gender, $this->birthday, $this->tel, $this->id);
		executeQuery($sql);
	}
	
	public function insert()
	{
		$sql = sprintf("insert into %s values (null, '%s', '%s', '%s', '%s', '%s', %s, '%s', '%s', '%s')", DB_NAME, $this->email, $this->title, $this->last_name, $this->first_name, $this->encrypted_password, $this->gender, $this->birthday, $this->tel, $this->reg_time);
		executeQuery($sql);
		$this->id = mysql_insert_id();
	}
	
	public function createSession()
	{
		if (session_id()=="") session_start();
		$_SESSION[USER_ID] = $this->getId();
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($title)
	{
		$this->title = mysql_real_escape_string($title);	
	}
	
	public function getLastName()
	{
		return $this->last_name;
	}
	
	public function setLastName($last_name)
	{
		$this->last_name = mysql_real_escape_string($last_name);
	}
	
	public function getFirstName()
	{
		return $this->first_name;
	}
	
	public function setFirstName($first_name)
	{
		$this->first_name = mysql_real_escape_string($first_name);
	}
	
	public function setPassword($password)
	{
		$this->encrypted_password = crypt($password);
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
	{
		$this->email = mysql_real_escape_string($email);
	}
	
	public function getGender()
	{
		return $this->gender;
	}
	
	public function setGender($gender)
	{
		$this->gender = mysql_real_escape_string($gender);
	}
	
	public function getBirthday()
	{
		return $this->birthday;
	}
	
	public function setBirthday($birthday)
	{
		$this->birthday = mysql_real_escape_string($birthday);
	}
	
	public function getTel()
	{
		return $this->tel;
	}
	
	public function setTel($tel)
	{
		$this->tel = mysql_real_escape_string($tel);
		if ($this->tel == '') $this->tel = NULL;
	}
	
	public function getRegTime()
	{
		return $this->reg_time;
	}
}
?>