<?php
include 'conn.php';

$id = $_GET['id'];
$qty = $_GET['qty'];
$new = $_POST['new'];
$total = $qty + $new;

	$sql1="UPDATE items SET qty='$total' where id='$id'";
	$conn->query($sql1);

//$order = array('item'=>$item, 'amount'=>$amount, 'qty'=>$qty, 'total'=>$total);
//array_push($cart, $order);
//$_SESSION['cart'] = $cart;
header('location:available_items.php');
?>