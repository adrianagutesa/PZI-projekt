<?php
//$mysqli = new mysqli("localhost", "GutesaA", "PZI_GutesaA1", "GutesaA");
$mysqli = new mysqli("localhost", "root", "", "books");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>