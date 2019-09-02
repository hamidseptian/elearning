 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <h1>
    VIDEO
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Video</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <!-- Default box -->
 <div class="box">
  <div class="box-header with-border">
   <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
    title="Collapse">
    <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
     <i class="fa fa-times"></i></button>
   </div>
   <p>PILIH BERDASARKAN KATEGORI</p>
 </div>
 <form action="" method="post">
 <select class="form-control" name="pilih">
   <option >--PILIH KATEGORI VIDEO--</option>
   <option value="tartil">TARTIL</option>
   <option value="tilawah">TILAWAH</option>
   <option value="qiraat">QIRA'AT</option>
 </select>
 <button type="submit" class="btn btn-primary" data-toogle="tooltip" title="CARI VIDEO">CARI</button>
 </form>

 <div class="box-body">
  <table id="table" class="table table-bordered table-striped" style="width: 100%" >
   <thead>
    <tr bgcolor="#c7ecee">
     <td>JUDUL</td>
     <td>TANGGAL UPLOAD</td>
     <td >VIDEO</td>
   </tr>
 </thead>
 <tbody>
  <?php 
  include "koneksi.php";
  $pilih = $_POST['pilih'];
  $sql=mysqli_query($koneksi, "SELECT * FROM video where kategori='$pilih' ");
  while($data=mysqli_fetch_array($sql)){
   ?>

   <tr>
    <td width="120px"><?php echo $data['judul'] ?></td>
    <td width="80px"><?php echo $data['tgl_upload'] ?></td>
    <td ><div class="embed-responsive embed-responsive-16by9"><?php echo $data['video'] ?></div></td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="clear-fix">

</div>
<!-- /.box-body -->
<!--         <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
