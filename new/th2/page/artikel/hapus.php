<?php 
$id_artikel = $_GET['id'];
$hapus=mysqli_query($koneksi, "DELETE from artikel where id_artikel='$id_artikel' ");

if ($hapus) {
	echo "
    <script type='text/javascript'>
    setTimeout(function () { 
      swal({
        title: 'Berhasil di hapus',
        type: 'warning',
        timer: 8000,
        showConfirmButton: false
        });  
        },10); 
        window.setTimeout(function(){ 
          window.location.replace('?page=artikel');
          } ,1000); 
          </script>";
}

 ?>