 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			DATA SANTRI
 			<small>it all starts here</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li><a href="#">Data Santri</a></li>
 		</ol>
 	</section>

 	<!-- Main content -->
 	<section class="content">

 		<!-- Default box -->
 		<div class="box">
 			<div class="box-header with-border">
 				<a href="?page=santri&aksi=tambah"><i class="btn btn-primary fa fa-plus"></i></a><span>Tambah Data Santri</span>
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
 							<tr bgcolor="#c7ecee">
 								<td>NIS</td>
 								<td>NAMA</td>
 								<td>JEKEL</td>
 								<td>KELAS</td>
 								<td >NAMA ORANG TUA</td>
 								<td >FOTO</td>
 								<td >Aksi</td>
 							</tr>
 						</thead>
 						<tbody>
 							<?php 
 							include "koneksi.php";
 							$sql=mysqli_query($koneksi, "SELECT * FROM santri");
 							while($data=mysqli_fetch_array($sql)){
 								?>

 								<tr>
 									<td><?php echo $data['id_santri'] ?></td>
 									<td><?php echo $data['nama'] ?></td>
 									<td><?php echo $data['jekel'] ?></td>
 									<td><?php echo $data['kelas'] ?></td>
 									<td><?php echo $data['nama_ortu'] ?></td>
 									<td height="10px"><img  src="img/<?php echo $data['foto'] ?>" width="70px" height="40px"></td>
 									<td>
 										<a href="?page=santri&aksi=hapus&id_santri=<?php echo $data['id_santri']?>" class="btn btn-danger" aria-label="Delete" title="Hapus">
 											<i class="fa fa-trash-o" aria-hidden="true"></i>
 										</a>
 										<a href="?page=santri&aksi=edit&id_santri=<?php echo $data['id_santri']?>" class="btn btn-primary" aria-label="Delete" title="Edit">
 											<i class="fa fa-edit" aria-hidden="true"></i>
 										</a>
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

