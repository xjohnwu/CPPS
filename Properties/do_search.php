<?php
include_once("Property.php");
$form = $_POST["search"];
$for = $form["for"];
$type = $form["type"];
$beds_min = $form["beds_min"];
$price_max = $form["price_max"];
$price_min = $form["price_min"];

$address_key_word = $_POST["search_field"];

$sql = "SELECT * FROM properties_uk INNER JOIN addresses_uk ON properties_uk.address_id=addresses_uk.address_id where 



?>