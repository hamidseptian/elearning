 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ARTIKEL
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Artikel</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <?php if ($_SESSION['level']!=='santri'): ?>
          <a href="?page=artikel&aksi=tambah"><i class="btn btn-primary fa fa-plus"></i></a><span> Artikel</span>
        <?php endif ?>
        
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped" style="width: 100%" >
            <thead>
              <tr bgcolor="#c7ecee" align="center">
                <td>ID</td>
                <td>JUDUL</td>
                <td>DESKRIPSI</td>
                <td>TANGGAL UPLOAD</td>
                <?php if ($_SESSION['level'!=='santri']): ?>
                  <td>aksi</td>
                <?php endif ?>
              </tr>
            </thead>
            <tbody>
              <?php 
              include "koneksi.php";
              $sql=mysqli_query($koneksi, "SELECT * FROM artikel");
              while($data=mysqli_fetch_array($sql)){
                ?>

                <tr>
                  <td><?php echo $data['id_artikel'] ?></td>
                  <td><?php echo $data['judul'] ?></td>
                  <td ><?php echo $data['deskripsi'] ?></td>
                  <td><?php echo $data['tgl_upload'] ?></td>
                  <?php if ($_SESSION['level'!=='santri']): ?>
                    <td>
                    <a href="?page=artikel&aksi=hapus&id=<?php echo $data['id_artikel']?>" class="btn btn-danger" aria-label="Delete" title="Hapus">
                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </a>
                    <a href="?page=artikel&aksi=edit&id=<?php echo $data['id_artikel']?>" class="btn btn-primary" aria-label="Delete" title="Edit">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                  </td>
                  <?php endif ?>
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

