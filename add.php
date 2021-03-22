<!--?php
include 'conn.php';

$id = $_GET['id'];
$qty2 = $_GET['qty'];
$qty = $_POST['qty'];
$total = $qty2 - $qty;

	$sql1="UPDATE items SET qty='$total' where id='$id'";
	$conn->query($sql1);

//$order = array('item'=>$item, 'amount'=>$amount, 'qty'=>$qty, 'total'=>$total);
//array_push($cart, $order);
//$_SESSION['cart'] = $cart;
//header('location:dashboard.php');
?-->
<?php
session_start();
if(!isset($_SESSION['cart'])){
	$cart = array();
}else{
	$cart = $_SESSION['cart'];
}
$id = $_GET['id'];
$item = $_GET['item'];
$amount = $_GET['amount'];
$qty2 = $_GET['qty'];
$qty = $_POST['qty'];
$total = $amount * $qty;

$order = array('item'=>$item, 'amount'=>$amount, 'id'=>$id, 'qty'=>$qty, 'qty2'=>$qty2, 'total'=>$total);
array_push($cart, $order);
$_SESSION['cart'] = $cart;
header('location:pos.php');
?>
