<?php
    include"head.php";
        if (in_array(6, $userss)) {
      
?>
<?php
include"conn.php";
$id = base64_decode($_GET['id']);
$sql = "UPDATE admin SET status =0, updated_at = now() WHERE id ='$id'";
$conn->query($sql);
echo "<script>alert('User deleted successfully');</script>";
echo"<script>window.open('users.php', '_self');</script>";
?>
<?php } else{?>
<?php 
session_unset();
session_destroy();
echo "<script>alert('You are not allow to view this page');</script>";
    echo "<script>window.open('index.php', '_self');</script>";
    ?>

<?php }?>