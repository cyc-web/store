<?php
require_once"conn.php";
ini_set('max_execution_time', 600000);
ini_set('mysqli.connect_timeout', 30000);


function getItems(){
  include"conn.php";
  
  $sql="SELECT * FROM items";
  $items = array();
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $item = array("item"=>$row["item"], "qty"=>$row["qty"], "amount"=>$row["amount"], "id"=>$row["id"] );
    
    array_push($items, $item);
}
return $items;
}
}

function getItemss(){
  include"conn.php";
  
  $sql="SELECT * FROM items order by id desc limit 10";
  $items = array();
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $item = array("item"=>$row["item"], "qty"=>$row["qty"], "amount"=>$row["amount"], "id"=>$row["id"] );
    
    array_push($items, $item);
}
return $items;
}
}

function getTasks(){
  include"conn.php";
  
  $sql="SELECT * FROM tasks order by task";
  $tasks = array();
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $task = array("task"=>$row["task"], "id"=>$row["id"] );
    
    array_push($tasks, $task);
}
return $tasks;
}
}

function getOrders(){
  include"conn.php";
  
  $sql="SELECT * FROM payment order by id desc limit 10";
  $tasks = array();
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $task = array("invoiceno"=>$row["invoiceno"], "total"=>$row["total"], "id"=>$row["id"] );
    
    array_push($tasks, $task);
}
return $tasks;
}
}

function getUsers(){
  include"conn.php";
  
  $sql="SELECT * FROM admin order by surname";
  $users = array();
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $task = array("surname"=>$row["surname"], "othername"=>$row["othername"], "task_id"=>$row["task_id"], "id"=>$row["id"], "status" => $row["status"], "user_code" => $row["user_code"] );
    
    array_push($users, $task);
}
return $users;
}
}

function getUser($id){
  include"conn.php";
  
  $sql="SELECT * FROM admin WHERE id = '$id'";
  $users = array();
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $task = array("surname"=>$row["surname"], "othername"=>$row["othername"], "task_id"=>$row["task_id"], "id"=>$row["id"], "user_code" => $row["user_code"], "telephone" => $row["telephone"], "email" => $row["email"]);
    
    array_push($users, $task);
}
return $users;
}
}

function getTask($id){
  include"conn.php";
  
  $sql="SELECT * FROM tasks WHERE id ='$id'";
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    return $row['task'];
    
}

}
}



//for point of sale

function getItem(){
  include"conn.php";
  
  $sql="SELECT * FROM items WHERE qty > 0";
  $items = array();
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $item = array("item"=>$row["item"], "qty"=>$row["qty"], "amount"=>$row["amount"], "id"=>$row["id"] );
    
    array_push($items, $item);
}
return $items;
}
}

function getSold($date1, $date2){
  include"conn.php";
  $sql="SELECT * FROM allitems WHERE sale_date between '$date1' AND '$date2'";
  $items = array();
  $result1=$conn->query($sql);
  if($result1->num_rows>0){

    $row=$result1->fetch_array(MYSQLI_ASSOC); 

      # code...
    $items = array("items"=>$row["items"], "qty"=>$row["qty"] );
    

  }else{
    $items = array("items"=>'0', "qty"=>"no sale" );
    
    
  }
  return $items;
}



function checkSold($item){
  include"conn.php";
  $sql="SELECT * FROM allitems WHERE items='$item'";
  $result=$conn->query($sql);
  if($result->num_rows>0){
    return TRUE;
    

  }else{
    return FALSE;
    
    
  }
}
function getReport(){
  include"conn.php";
  
  $sql="SELECT * FROM payment inner join admin on admin.id=payment.user_id";
  $reports = array();
  if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $report = array("items"=>$row["items"], "total"=>$row["total"], "invoiceno"=>$row["invoiceno"], "user_id"=>$row["surname"], "name"=>$row["othername"], "sale_date"=>$row["sale_date"] );
    
    array_push($reports, $report);
}
return $reports;
}
}

//Getting all items sold
function getAll(){
  include"conn.php";
  
  $sql="SELECT * FROM payment";
    if($result=$conn->query($sql)){

  while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
    # code...
    $all = $row['items'];
    $a=explode(',', $all);
    
}
return $a;
}
}
//$order = explode("-", $a);

//return $order;


//register
include 'conn.php';
if (isset($_POST['submit'])) {
    # code...
  $sq ="SELECT * FROM admin WHERE email = '".$_POST['email']."'";
  $re = $conn->query($sq);
  $ro = $re->fetch_array(MYSQLI_ASSOC);
  if ($ro) {
    # code...
    echo "<script>alert('Email already exist');</script>";
    echo "<script>window.open('create_user.php', '_self');</script>";
  }else{
    $surname=$_POST['surname'];
    $othername=$_POST['othername'];
    $email=$_POST['email'];
    $scode=md5($_POST['scode']);
    $tasks = $_POST['tasks'];
    $task = implode(",", $tasks);
    $code = $_POST['code'];
    $telephone = $_POST['telephone'];
    

    $sql="INSERT INTO admin (user_code, surname, othername, telephone, email, scode, task_id)VALUES('$code', '$surname', '$othername', '$telephone', '$email', '$scode', '$task')";
    $conn->query($sql);
    echo "<script>alert('successfully created');</script>";
    echo "<script>window.open('create_user.php', '_self');</script>";
}
}

//login
include"conn.php";
if (isset($_POST['start'])) {
  # code...
$email= $_POST['email'];
$scode= md5($_POST['scode']);

$sql= "SELECT * FROM admin WHERE email= '$email' AND scode='$scode' AND status =1 ";
$result= $conn->query($sql);
$row= $result->fetch_array(MYSQLI_ASSOC);
if ($row ) {
  # code...
  session_start();
  $_SESSION['id']=$_POST['email'];
  header('location: dashboard.php');
  
  } else{
    echo "<script>alert('invalid email/password');</script>";
        echo "<script>window.open('index.php', '_self');</script>";

  } 

}

//counting available items
include 'conn.php';
$count=mysqli_query($conn, "SELECT * FROM items")or die(mysqli_error($conn));
$items=mysqli_num_rows($count);
if ($items!=0) {
  # code...
  $items=$items;
}else{
  $items=0;
}
//counting items sold for the day, month and year

$day=date("Y-m-d");
include 'conn.php';
$count1=mysqli_query($conn, "SELECT * FROM allitems WHERE sale_date like '%$day%'")or die(mysqli_error($conn));
$total=mysqli_num_rows($count1);
if ($total!=0) {
  # code...
  $total=$total;
}else{
  $total=0;
}

$month=date("Y-m");

include 'conn.php';
$count2=mysqli_query($conn, "SELECT * FROM allitems WHERE sale_date like '%$month%'")or die(mysqli_error($conn));
$total2=mysqli_num_rows($count2);
if ($total2!=0) {
  # code...
  $total2=$total2;
}else{
  $total2=0;
}
$year=date("Y");

include 'conn.php';
$count3=mysqli_query($conn, "SELECT * FROM allitems WHERE sale_date like '%$year%'")or die(mysqli_error($conn));
$total3=mysqli_num_rows($count3);
if ($total3!=0) {
  # code...
  $total3=$total3;
}else{
  $total3=0;
}
//Upload a single item
session_start();
include 'conn.php';
    if (isset($_POST['sub'])) {
        # code...
      $items = strtoupper($_POST['item']);
      $sql1="SELECT * FROM items WHERE item = '$items' ";
      $result=$conn->query($sql1);
      $row=$result->fetch_array(MYSQLI_ASSOC);
      if ($row) {
        # code...
        echo "<script>alert('Item already exist! please update the existing item');";
        echo "<script>window.open('single_item.php', '_self');</script>";

      }else{
        $items= strtoupper($_POST['item']);
        $qty=$_POST['qty'];
        $amount=$_POST['amount'];

        $sql="INSERT INTO items (item,qty,amount)VALUES('$items', '$qty', '$amount')";
        $conn->query($sql);
        //$id=mysqli_insert_id($conn);
        //$_SESSION['id'] = $id;
        echo "<script>alert('successfully uploaded');</script>";
        echo "<script>window.open('single_item.php', '_self');</script>";
    }
}

//Uploading more items
require_once"conn.php";

    if (isset($_POST['upload'])){
    
    $file = $_FILES['file']['tmp_name'];
$handle = fopen($file,"r");
while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
  $item = strtoupper($data[0]);
    if (!in_array('', $data, true)){
    $sql="SELECT * FROM items WHERE item='$item' AND amount = '$data[2]' AND cost ='$data[3]'";
$result=$conn->query($sql);
$row=$result->fetch_array(MYSQLI_ASSOC);
if ($row < 1) {
    # code...
    $sql="INSERT INTO items (item,qty,amount,cost,date_added) VALUES ('$item', '$data[1]', '$data[2]', '$data[3]', now())";
    $conn->query($sql);
    //echo "<script>window.open('dashboard.php', '_self');</script>";
}else{
    //$sql="UPDATE upload_data SET matno='$data[0]', name='$data[1]'"

   echo "Some records exists";

//elseif(($data[0] >=1) && ($data[1] >= 1) && ($data[2] < 1) && ($data[3] < 1)) {
    # code...
    //$sql="INSERT INTO upload_data (matno,name,course,sessioned,date_req) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', now())";
    //$conn->query($sql);
    //echo "<script>alert('records successfully uploaded');</script>";
    //echo "<script>window.open('new.php', '_self');</script>";
//}
}

        
   
  }
}
    echo "Successfully uploaded";
    echo"<br>";
    echo"<a href='more_items.php'>back</a>";

//echo "<script>window.open('dashboard.php', '_self');</script>";


}
?>
<?php
//upload expenses
require_once"conn.php";

    if (isset($_POST['up'])){
      if (empty($_POST['date_added'])) {
        echo "<script>alert('Select Date');</script>";
        
      }else{

    $file = $_FILES['file']['tmp_name'];
  $handle = fopen($file,"r");
  while (($data = fgetcsv($handle, 10000, ",")) !== FALSE){
    if (!in_array('', $data, true)){
      $date_added= $_POST['date_added'];
    
    # code...
    $sql="INSERT INTO expenses (item,price, date_added) VALUES ('$data[0]', '$data[1]', '$date_added')";
    $conn->query($sql);
    



        
   
  }
}
echo "<script>alert('records successfully uploaded');</script>";
echo "<script>window.open('add_expenses.php', '_self');</script>";
      }
}
?>
