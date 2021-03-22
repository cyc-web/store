<?php
include"conn.php";
$id = base64_decode($_GET['id']);
$sql = "DELETE FROM tasks WHERE id ='$id'";
$conn->query($sql);
echo "<script>alert('Task deleted successfully');</script>";
echo"<script>window.open('task.php', '_self');</script>";
?>