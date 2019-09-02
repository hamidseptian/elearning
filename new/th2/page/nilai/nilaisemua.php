 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    NILAI SANTRI
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Nilai Santri</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      	<a href="page/nilai/cetak.php" target="_blank"><i class="btn btn-primary fa fa-print"></i></a><span> Cetak Nilai</span>
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
                <td>ID TUGAS</td>
                <td>ID SANTRI</td>
                <td>NAMA SANTRI</td>
                <td>NAMA TUGAS</td>
                <td>NILAI</td>
              </tr>
            </thead>
            <tbody>
             <?php 
		include "koneksi.php";
		$sql=mysqli_query($koneksi, "SELECT * FROM nilai INNER JOIN u_tugas ON nilai.kode_upload=u_tugas.kode_upload INNER JOIN tugas ON u_tugas.id_tugas=tugas.id_tugas ");
		$totaltugas=mysqli_num_rows($sql);
		//$nilaitotal=0;
			
		while($data=mysqli_fetch_array($sql)){
			?>
                <tr>
                  <td><?php echo $data['kode_upload'] ?></td>
                  <td><?php echo $data['id_santri'] ?></td>
                  <td ><?php echo $data['nama_santri'] ?></td>
                  <td><?php echo $data['nama_tugas'] ?></td>
                  <td><?php echo $data['nilai'] ?></td>
             
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

