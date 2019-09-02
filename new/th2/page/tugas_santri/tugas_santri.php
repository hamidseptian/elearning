 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DAFTAR TUGAS SANTRI
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tugas Santri</a></li>
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
        </div>
        <div class="box-body">
          <table id="table" class="table table-bordered table-striped" style="width: 100%" >
            <thead>
              <tr bgcolor="#c7ecee" align="center">
                <td>KODE UPLOAD</td>
                <td>ID TUGAS</td>
                <td>ID SANTRI</td>
                <td>NAMA SANTRI</td>
                <td>AUDIO</td>
                <td>STATUS</td>
              </tr>
            </thead>
            <tbody>
              <?php 
              include "koneksi.php";
              $sql=mysqli_query($koneksi, "SELECT * FROM u_tugas");
              while($data=mysqli_fetch_array($sql)){
                ?>

                <tr>
                  <td><?php echo $data['kode_upload'] ?></td>
                  <td><?php echo $data['id_tugas'] ?></td>
                  <td ><?php echo $data['id_santri'] ?></td>
                  <td><?php echo $data['nama_santri'] ?></td>
                  <td><audio controls="" src="img/<?php echo $data['audio'] ?>"></audio>Listen To Audio</td>
                  <td>

                    <?php 
                    if ($data['status']=='belum diperiksa') {?>
                      <a href="?page=tugas_santri&aksi=nilai_santri&kode_upload=<?php echo $data['kode_upload']?>" class="btn succes" aria-label="Delete" title="Berikan Penilaian">
                        <i class="fa fa-pencil btn btn-success" aria-hidden="true">Berikan Penilaian</i>
                      </a>
                    <?php }else{
                      ?>
                      Diperiksa
                      <?php
                    }
                    ?>
                  </td>
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

