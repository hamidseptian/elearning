<?php
$ekstensi_diperbolehkan	= array('png','jpg');
$nm = $_FILES['file']['name'];
$x = explode('.', $nm);
$ekstensi = strtolower(end($x));
$namafoto = date('YmdHis').".".$ekstensi;
$ukuran	= $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
move_uploaded_file($file_tmp, 'img'.$namafoto);
$msg='img/'.$namafoto;
$pengirim=$_POST['pengirim'];
$penerima=$_POST['penerima'];
$sql="insert into chat(pengirim,penerima,chat) values ('$pengirim','$penerima','$msg')";
$result=mysqli_query($kon,$sql);

 ?>