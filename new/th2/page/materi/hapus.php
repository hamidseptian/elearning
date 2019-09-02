<?php 
include 'koneksi.php';

$id=$_GET['id'];
$hapus=mysqli_query($koneksi, "SELECT * FROM  materi where id_materi='$id'");
$nama_gambar=mysqli_fetch_array($hapus);
$lokasi=$nama_gambar['materi'];
$hapus_gambar="img/$lokasi";
unlink($hapus_gambar);

$sql=mysqli_query($koneksi, "DELETE FROM materi where id_materi='$id'");
if ($sql) {
		echo "
<script type='text/javascript'>
		setTimeout(function () { 
			swal({
				title: 'Data Berhasil Dihapus',
				type: 'warning',
				timer: 11000,
				showConfirmButton: false
			});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('?page=materi');
		} ,1000); 
	</script>";
}

 ?>