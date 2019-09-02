<?php 
$id=$_GET['id'];
$hapus=mysqli_query($koneksi, "SELECT * FROM  u_tugas where kode_upload='$id'");
$nama_gambar=mysqli_fetch_array($hapus);
$lokasi=$nama_gambar['audio'];
$hapus_gambar="img/$lokasi";
unlink($hapus_gambar);

$sql=mysqli_query($koneksi, "DELETE FROM u_tugas where kode_upload='$id'") or die(mysqli_error($koneksi));
if ($sql) {
	echo "
<script type='text/javascript'>
		setTimeout(function () { 
			swal({
				title: 'Berhasil di hapus',
				type: 'success',
				timer: 10000,
				showConfirmButton: true
			});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('?page=u_tugas');
		} ,2000); 
	</script>";
}
 ?>