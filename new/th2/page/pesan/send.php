<?php 
include '../../koneksi.php';
?>
<?php
$msg=$_POST['msg'];
$pengirim=$_POST['pengirim'];
$penerima=$_POST['penerima'];

$sql="insert into tb_chat(pengirim,penerima,chat) values ('$pengirim','$penerima','$msg')";
$result=mysqli_query($kon,$sql);
// header("Location:home.php");
 ?>