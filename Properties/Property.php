<?php

require_once('../Connections/cpps.php');
include_once("../Languages/settings.php");
include_once("Address.php");

class Property
{
	private $id;
	private $address;
	private $bed;
	private $type;
	private $price;
	private $description;
	private $for;
	private $db_name="properties_uk";
		
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
		$address_id = $row["address_id"];
		$this->address = new Address();
		$this->address->loadFromId($address_id);
		$this->bed = $row["bed"];
		$this->type = $row["type"];
		$this->price = $row["price"];
		$this->description = $row["description"];
		$this->for = $row["for"];
	}
	
	public function update()
	{
		$sql = sprintf("update %s set address_id='%s', bed='%s', type='%s', price='%s', description='%s', for='$s' where id='%s'", $this->db_name, $this->address->getId(), $this->bed, $this->type, $this->price, $this->description, $this->for, $this->id);
		executeQuery($sql);
	}
	
	public function insert()
	{
		$this->address->insert();
				
		$sql = sprintf("insert into %s values (null, '%s', '%s', '%s', '%s', '%s', '%s')", $this->db_name, $this->address->getId(), $this->bed, $this->type, $this->price, $this->description, $this->for);
		executeQuery($sql);
		$this->id = mysql_insert_id();
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getAddress()
	{
		return $this->address;
	}
	
	public function setAddress(Address $address)
	{
		$this->address = $address;	
	}
	
	public function getBed()
	{
		return $this->bed;
	}
	
	public function setBed($bed)
	{
		$this->bed = $bed;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function setType($type)
	{
		$this->type = $type;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function setPrice($price)
	{
		$this->price = $price;
	}
	
	public function getFor()
	{
		return $this->for;
	}
	
	public function setFor($for)
	{
		$this->for = $for;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setDescription($description)
	{
		$this->description = $description;
	}
} 

?>