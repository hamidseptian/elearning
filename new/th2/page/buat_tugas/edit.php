<?php 
$id=$_GET['id'];
$sql=mysqli_query($koneksi, "UPDATE tugas SET ket='off' where id_tugas='$id' ");
if ($sql) {
	echo "
	<script type='text/javascript'>
	setTimeout(function () { 
		swal({
			title: 'Status Tugas Tidak Aktif',
			type: 'success',
			timer: 11000,
			showConfirmButton: false
			});  
			},10); 
			window.setTimeout(function(){ 
				window.location.replace('?page=buat_tugas');
				} ,2000); 
				</script>";
			}
			?>