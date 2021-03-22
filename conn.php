<?php

$conn= new mysqli("localhost", "root", "royaltech", "stores");


if ($conn->connect_error) {
	# code...
	die("could not connect." .$conn->connect_error);
}



?>