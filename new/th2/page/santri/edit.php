<?php 
include "koneksi.php";
$id=$_GET['id_santri'];
$sql1=$koneksi->query("SELECT * FROM santri where id_santri='$id' ");
$tampil=$sql1->fetch_array();
$jekel=$tampil['jekel'];

?> 
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
   EDIT DATA SANTRI
   <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
   <li><a href="index.php?page=santri"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="#">Edit Data Santri</a></li>
  </ol>
 </section>

 <!-- Main content -->
 <section class="content">

  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
   <div class="box-header with-border">
    <h3 class="box-title">Edit Data Santri</h3>

    <div class="box-tools pull-right">
     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
    <div class="row">
     <form action="" method="post" enctype="multipart/form-data">
      <div class="col-md-6">
       <div class="form-group">
        <label>NIS/ID SANTRI</label>
        <input type="text" name="id_santri" class="form-control" value="<?php echo $tampil['id_santri'] ?>" readonly>
       </div>
       <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $tampil['nama'] ?>">
       </div>
       <div class="form-group">
        <label>Tempat Dan Tanggal Lahir</label>
        <div class="row">
         <div class="col-lg-6">
          <div class="input-group">
           <input type="text" name="tmp_lahir" class="form-control" value="<?php echo $tampil['tmp_lahir'] ?>">
          </div>
          <!-- /input-group -->
         </div>
         <!-- /.col-lg-6 -->
         <div class="col-lg-6">
          <div class="input-group">
           <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir'] ?>">
          </div>
          <!-- /input-group -->
         </div>
         <!-- /.col-lg-6 -->
        </div>
        <div class="form-group">
         <label>Jeni Kelamin</label>
         <select name="jekel" class="form-control">
          <option value="laki-laki" <?php if($jekel == 'laki-laki)') {echo "selected" ;} ?>>Laki-Laki</option>
          <option value="perempuan" <?php if($jekel == 'perempuan'){echo "selected" ;} ?>>Perempuan</option>
         </select>
        </div>
        <div class="form-group">
         <label>Kelas</label>
         <input type="text" name="kelas" class="form-control" value="<?php echo $tampil['kelas'] ?>">
        </div>
        <div class="form-group">
         <label>Nama Orang Tua</label>
         <input type="text" name="nama_ortu" class="form-control" value="<?php echo $tampil['nama_ortu'] ?>">
        </div>
        <div class="form-group">
         <label>Alamat</label>
         <textarea name="alamat" class="form-control" ><?php echo $tampil['alamat'] ?></textarea>
        </div>
       </div>
      </div>

      <!-- /.col -->
      <div class="col-md-6">

       <div class="form-group">
        <label>Nomor Hp Orang Tua</label>
        <input type="number" name="no_hp" class="form-control" value="<?php echo $tampil['no_hp'] ?>"> 
       </div>
       <div class="form-group">
        <label>Email Orang Tua</label>
        <input type="email" name="email" class="form-control" value="<?php echo $tampil['email'] ?>">
       </div>
       <div class="form-group">
        <label>Password</label>
        <input type="text" name="pass" class="form-control" value="<?php echo $tampil['pass'] ?>">
       </div>
       <div class="form-group">
        <label>Foto Saat Ini</label><br>
        <img src="img/<?php echo $tampil['foto'] ?>" width="100px" height="100px" >
       </div>
       <input type="hidden" name="foto_lama" value="<?php echo $tampil['foto'] ?>">
       <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
       </div>
       <!-- /.form-group -->
      </div>
      <!-- /.col -->
     </div>

     <input type="submit" name="simpan" class="btn btn-primary" value="UPDATE DATA">
    </form>
    <!-- /.row -->
   </div>
  </div>
  <!-- /.box -->
 </div>
 <!-- /.col (right) -->
</div>
<!-- /.row -->

</section>
<!-- /.content -->
</div>

<?php 
include "../../koneksi.php";
if (isset($_POST['simpan'])) {
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
}
?>