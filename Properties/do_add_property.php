<?php
include_once("Property.php");

$form = $_POST["property"];

$address = new Address();
$address->setAddress1($form["address1"]);
$address->setAddress2($form["address2"]);
$address->setTown($form["town"]);
$address->setCounty($form["county"]);
$address->setPostCode($form["postcode"]);
$address->setCountry($form["country"]);
$address->setLat($form["lat"]);
$address->setLng($form["lng"]);

$property = new Property();
$property->setAddress($address);
$property->setBed($form["bed"]);
$property->setType($form["type"]);
$property->setPrice($form["price"]);
$property->setFor($form["for"]);
$property->setDescription($form["description"]);

// Todo: implement atomic commitment
$property->insert();

?>