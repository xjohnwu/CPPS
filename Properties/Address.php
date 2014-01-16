<?php

include_once("../Connections/CommonSql.php");
define("ADDRESS_ID", "address_id");

class Address
{
	private $id;
	private $address1;
	private $address2;
	private $town;
	private $county;
	private $postcode;
	private $country;
	private $lat;
	private $lng;
	private $db_name="addresses_uk";
	
	public function loadFromId($id)
	{
		$this->id = $id;
		$sql = sprintf("select * from %s where id=%d", $this->db_name, $this->id);
		$res = executeQuery($sql);
		$row = mysql_fetch_array($res);
		$this->loadFromDb($row);
	}
	
	private function loadFromDb(array $row)
	{
		$this->id = $row["id"];
		$this->address1 = $row["address1"];
		$this->address2 = $row["address2"];
		$this->town = $row["town"];
		$this->county = $row["county"];
		$this->postcode = $row["postcode"];
		$this->country = $row["country"];
		$this->lat = $row["lat"];
		$this->lng = $row["lng"];		
	}
	
	public function update()
	{
		$sql = sprintf("update %s set address1='%s', address2='%s', town='%s', county='%s', postcode='%s', country='%s', lat='%s', lng='%s' where id='%s'", $this->db_name, $this->address1, $this->address2, $this->town, $this->county, $this->postcode, $this->country, $this->lat, $this->lng, $this->id);
		executeQuery($sql);
	}
	
	public function insert()
	{
		$sql = sprintf("insert into %s values (null, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $this->db_name, $this->address1, $this->address2, $this->town, $this->county, $this->postcode, $this->country, $this->lat, $this->lng);
		executeQuery($sql);
		$this->id = mysql_insert_id();
	}
	
	public function createSession()
	{
		if (session_id()=="") session_start();
		$_SESSION[userid] = $this->getId();
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getAddress1()
	{
		return $this->address1;
	}
	
	public function getAddress2()
	{
		return $this->address2;
	}
	
	public function getTown()
	{
		return $this->town;
	}
	
	public function getCounty()
	{
		return $this->county;
	}
	
	public function getPostCode()
	{
		return $this->postcode;
	}
	
	public function getCountry()
	{
		return $this->country;
	}
	
	public function getLat()
	{
		return $this->lat;
	}
	
	public function getLng()
	{
		return $this->lng;
	}
	
	public function setAddress1($address1)
	{
		$this->address1 = $address1;
	}
	
	public function setAddress2($address2)
	{
		$this->address2 = $address2;
	}
	
	public function setTown($town)
	{
		$this->town = $town;
	}
	
	public function setCounty($county)
	{
		$this->county = $county;
	}
	
	public function setPostCode($postcode)
	{
		$this->postcode = $postcode;
	}
	
	public function setCountry($country)
	{
		$this->country = $country;
	}

	public function setLat($lat)
	{
		$this->lat = $lat;
	}
	
	public function setLng($lng)
	{
		$this->lng = $lng;
	}	
}

?>