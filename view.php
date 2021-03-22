
<?php
include 'conn.php';
 $inv=$_GET['v'];
 $sql="SELECT * FROM payment inner join admin on admin.id=payment.user_id WHERE invoiceno='$inv'";
 //$items =array();
$result=$conn->query($sql);
$row=$result->fetch_array(MYSQLI_ASSOC);
$time=$row['sale_date'];
$a= $row['items'];
$total=$row['total'];
$name=$row['surname'];
$name2=$row['othername'];
$order = explode("-", $a);

//array_push($items, $item);

  # code...
//$_SESSION['cart'] = array();

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
        <li><a href="report.php" class="btn btn-primary" style="color: white">back</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a onclick="window.print()" class="btn btn-success" style="color: white">print</a></li>

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
                <div class="col-md-6" style="">
                  <p>Sold by : <?php echo "$name";?> <?php echo "$name2";?></p>
                
              </div>
              <div class="col-md-6" style="text-align: center;">
               
                  <p>Invoice Number :<?php echo "$inv";?></p>
                  <p>Date : <?php echo $time?></p>
                
              </div>
            </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>ITEMS</th>
                    <th>AMOUNT</th>
                    <th>QUANTITY</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sn = 0;
                  //$total=0;
                  foreach (array_slice($order, 1) as $item) {
                    $i = explode(',',$item);
                    //$total = $item['total'];
                      //echo '<tr>';
                      //echo '<td>'.++$sn.'</td>';
                      //echo '<td>'.$i[0].'</td>';
                      //echo '<td>'.$i[1].'</td>';
                      //echo '<td>'.$i[2].'</td>';
                      //echo '<td>'.$i[3].'</td>';
                      //echo '</tr>';
                    
                    

                  
                  ?> 
                  <tr>
                    <td><?php echo ++$sn?></td>
                    <td><?php echo $i[0]?></td>
                    <td><?php echo $i[1]?></td>
                    <td><?php echo $i[3]?></td>
                    <td><?php echo $i[5]?></td>
                  </tr>
                  <?php }?> 
                  <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold; padding-right: 30px; font-size: 18px;">Total</td>
                    <td colspan="4" style="font-weight: bold; font-size: 18px;"><?php echo $total?></td>
                  </tr>

                </tbody>
                
              </table>
            </div>
            
</div>
</body>
</html>