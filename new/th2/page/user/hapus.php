<?php 
$id_user=$_GET['id_user'];
$sql = mysqli_query($koneksi, "SELECT * FROM user where id_user='$id_user' ");
$nama_gambar=mysqli_fetch_array($sql);
$lokasi=$nama_gambar['foto'];
$hapus_gambar="img/$lokasi";
unlink($hapus_gambar);

$sql=mysqli_query($koneksi, "DELETE FROM user where id_user='$id_user' ");
if ($sql) {
	echo "<script type='text/javascript'>
		setTimeout(function () { 
			swal({
				title: 'Data Berhasil Dihapus',
				type: 'warning',
				timer: 8000,
				showConfirmButton: false
			});  
		},10); 
		window.setTimeout(function(){ 
			window.location.replace('?page=user');
		} ,900); 
	</script>";
}


 ?>