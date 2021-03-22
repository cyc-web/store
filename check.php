<?php error_reporting(0);
require_once"conn.php";
require_once"functions.php";
ini_set('max_execution_time', 600000);
ini_set('mysqli.connect_timeout', 30000);

if(!isset($_SESSION["id"])) 
{
  header("Location:index.php");
session_unset();
session_destroy();
header ("location:index.php");

} 
//include "conn.php";

$query = "";
if(isset($_SESSION["id"])) {
  $sql = "SELECT  * FROM admin  WHERE  email='".$_SESSION["id"]."' ;";
//  $row = mysql_fetch_array(mysql_query($sql));
 if ($result = $conn->query($sql)) {
    $row = $result->fetch_array(MYSQLI_ASSOC);}}
    $user_id=$row['id'];
    $code= $row['user_code'];
    $othername=$row['othername'];


?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="external.css">
  <style type="text/css">
    .all{
      margin: auto;
      max-width: 500px;
      background-color: ;
      padding: 20px 20px;
      border-radius: 15px;
      border: 5px solid grey;
    }
    body{
      background-color: ;
    }
    label{
      color: white;
    }
    h2{
      color: ;
      text-align: center;
      margin-bottom: 30px;
    }
    .navbar{
      background-color: black;
    }
  </style>
  <title></title>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="pos.php" class="btn btn-primary" style="color: white">back</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a onclick="window.print()" class="btn btn-success" style="color: white">print</a></li>
        <li></li>
      </ul>
    </div>
  </div>
</nav>
<div class="table responsive" style="max-width: 800px; margin: auto; border:1px solid black;padding: 2px;margin-top: 60px;">
              <div class="row">
                <div class="col-md-12 text-center">
                  <h2>Your store</h2>
                  <p>Your address</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <p>User : <?php echo $code?></p>
                
              </div>
              <div class="col-md-6" style="text-align: center;">
               <?php
                    $invoiceno=rand(000000, 999999);
               ?>
                  <p>Invoice Number :<?php echo "$invoiceno";?></p>
                  <p>Date : <?php echo date("Y-m-d")?> <?php echo date("H-i-s")?></p>
                
              </div>
            </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>ITEMS</th>
                    <th>QUANTITY</th>
                    <th>AMOUNT</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
<?php
//session_start();
$qty2 = $_GET['qty2'];
$d = $_GET['d'];
include 'conn.php';
if(!isset($_SESSION['cart'])){
     header('location:pos.php');
}else{
     $cart = $_SESSION['cart'];
     $total = 0;
     $sn=0;
     $orders = "";
     $tot = "";
     $id2 = "";

     foreach ($cart as $order) {
          # code...
          //echo $order['item'] . " - " . $order['qty'] . " - " . $order['amount'] . " - " . $order['total'] ."<hr>";
      $qty = $order['qty'];
      $items = $order['item'];

      $tot= $qty2 - $qty;
          $o = implode(',', $order);
          $total += $order['total'];
          $orders = $orders.' - '.$o;
          
     
     //echo $total;
     //echo "<br>";
     
     //echo $orders;
     $_SESSION['cart'] = array();
//header('location:pos.php');

?>
<tr>
                    <td><?php echo ++$sn?></td>
                <td><?php echo $order['item']?></td>
                <td><?php echo $order['qty']?></td>
                <td><?php echo $order['amount']?></td>
                <td><?php echo $order['total']?></td>
                   </tr>
                   
                 <?php
                     //$sale_date=date("Y-m-d");

                    $sq="SELECT * FROM items WHERE item='".$order["item"]."'";
                    $result=$conn->query($sq);
                    $row=$result->fetch_array(MYSQLI_ASSOC);
                        # code...
                    //$new="";
                        
                        if ($row) {
                          # code...
                          //$tot = $_POST['tot'];
                          $q=$row['qty'];
                          $tot = $q - $qty;

                        $s="UPDATE items SET qty = '$tot' WHERE item='".$order["item"]."'";
                        $conn->query($s);

                        }
                        
                      
                   ?>
                   <?php
                     $sale_date=date("Y-m-d");

                    $sql4="SELECT * FROM allitems WHERE items='".$order["item"]."' AND amount='".$order["amount"]."' AND sale_date='$sale_date'";
                    $result=$conn->query($sql4);
                    $row=$result->fetch_array(MYSQLI_ASSOC);
                        # code...
                    //$new="";
                        $qt=$row['sqty'];
                        $new = $qt + $qty;
                        if ($row) {
                          # code...
                          $sqty = $_POST['new'];
                        $sql5="UPDATE allitems SET sqty = '$new' WHERE items='".$order["item"]."' AND amount='".$order["amount"]."' AND sale_date='$sale_date'";
                        $conn->query($sql5);

                        }else{
                          $sql3 = "INSERT INTO allitems (items,sqty,amount,sale_date)VALUES('$items', '$qty', '".$order["amount"]."', now())";
                        $conn->query($sql3);

                        }
                        
                      
                   ?>
                   <?php }?>
                   <?php
                         $sql1="INSERT INTO payment (items, total, user_id, invoiceno, sale_date) VALUES ('$orders', '$total', '$user_id', '$invoiceno', now())";
                          $conn->query($sql1);

     ?>
                   <td colspan="4" style="text-align: right;"><?php echo "Total"?></td><td colspan=""><?php echo $total?></td>


                </tbody>
                
              </table>
            </div>
            <!--div style="max-width: 800px; margin: auto;">
              <div class="row">
              <div class="col-md-6">
            <a class="btn btn-success" href="receipt.php?gt=<?php echo $invoiceno?>">Check Out</a>
          </div><?php }?>
          <div class="col-md-6" style="text-align: right;">
            <a href="cancel.php?e=<?php echo $invoiceno?>" class="btn btn-danger">Empty cart</a>
          </div>
        </div-->
</div>

</body>
</html>