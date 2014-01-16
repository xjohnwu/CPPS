<?php
require_once('../Connections/cpps.php');

// Start XML file, create parent node
$doc = new DOMDocument('1.0');
$node = $doc->createElement("markers");
$parnode = $doc->appendChild($node);

// Select all the rows in the markers table
$query = "SELECT * FROM markers WHERE 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  $node = $doc->createElement("marker");
  $newnode = $parnode->appendChild($node);

  $node->setAttribute("name", $row['name']);
  $node->setAttribute("address", $row['address']);
  $node->setAttribute("lat", $row['lat']);
  $node->setAttribute("lng", $row['lng']);
  $node->setAttribute("type", $row['type']);
}

echo $doc->saveXML();

?>