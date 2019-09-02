<?php 

include "../../koneksi.php";

 $id_santri=$_POST['id_santri'];
 $nama=$_POST['nama'];
 $tmp_lahir=$_POST['tmp_lahir'];
 $tgl_lahir=$_POST['tgl_lahir'];
 $jekel=$_POST['jekel'];
 $kelas=$_POST['kelas'];
 $nama_ortu=$_POST['nama_ortu'];
 $alamat=$_POST['alamat'];
 $no_hp=$_POST['no_hp'];
 $email=$_POST['email'];
 $pass=$_POST['pass'];
 $foto_lama=$_POST['foto_lama'];

 $foto=$_FILES['foto']['name'];
 $lokasi=$_FILES['foto']['tmp_name'];

 if (!empty($lokasi)) {
  $upload=move_uploaded_file($lokasi, "img/".$foto);

  $sql = mysqli_query($koneksi, "UPDATE santri SET nama='$nama', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', jekel='$jekel', kelas='$kelas', nama_ortu='$nama_ortu', alamat='$alamat', no_hp='$no_hp', email='$email', pass='$pass', foto='$foto' where id_santri='$id_santri' ") or die(mysqli_error($koneksi));

  unlink('img/'.$foto_lama);
  if ($sql) {
   ?>
   <script type="text/javascript">
    alert('berhasil ubah');
    window.location.href='?page=santri';
   </script>

   <?php
  }

 }
 else{
  $sql = mysqli_query($koneksi, "UPDATE santri SET nama='$nama', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', jekel='$jekel', kelas='$kelas', nama_ortu='$nama_ortu', alamat='$alamat', no_hp='$no_hp', email='$email', pass='$pass' where id_santri='$id_santri' ") or die(mysqli_error($koneksi));
  if ($sql) {
   ?>
   <script type="text/javascript">
    alert('berhasil di ubah');
    window.location.href='?page=santri';
   </script>
   <?php
  }
  else{
   alert('error');
  }
 }

?>