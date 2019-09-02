<?php
$msg=$_POST['msg'];
$pengirim=$_POST['pengirim'];
$penerima=$_POST['penerima'];

// $sql="insert into chat(pengirim,penerima,chat) values ('NULL', '$pengirim','$penerima','$msg')";
// $result=mysqli_query($kon,$sql);
$sql = mysqli_query($koneksi, "INSERT into chat (NULL, '$pengirim','$penerima','$msg') ")
// header("Location:home.php");
 ?>