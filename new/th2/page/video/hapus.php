<?php 
//include 'koneksi.php';
$id=$_GET['id'];
$sql=mysqli_query($koneksi, "DELETE from video where id_video='$id' ");
if ($sql) {
	echo "
<script type='text/javascript'>
		setTimeout(function () { 
			swal({
				title: 'Berhasil di hapus',
				type: 'success',
				timer: 9000,
				showConfirmButton: true
			});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('?page=video');
		} ,1000); 
	</script>";
}
 ?>