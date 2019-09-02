<?php 

include "koneksi.php";

$id=$_GET['id_santri'];
$hapus=mysqli_query($koneksi, "SELECT * FROM santri where id_santri='$id' ");
$nama_gambar=mysqli_fetch_array($hapus);
$lokasi=$nama_gambar['foto'];
$hapus_gambar="img/$lokasi";
unlink($hapus_gambar);

$sql=mysqli_query($koneksi, "DELETE FROM santri where id_santri='$id' ");
if ($sql) {
	echo "
<script type='text/javascript'>
		setTimeout(function () { 
			swal({
				title: 'Data Berhasil Dihapus',
				type: 'warning',
				timer: 4000,
				showConfirmButton: false
			});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('?page=santri');
		} ,900); 
	</script>";
}
 ?>