<?php

$conn= new mysqli("localhost", "royalcod_root", "royaltech1005", "royalcod_store");


if ($conn->connect_error) {
	# code...
	die("could not connect." .$conn->connect_error);
}



?>