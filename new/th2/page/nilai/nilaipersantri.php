 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			NILAI
 			<small>it all starts here</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li><a href="#">Nilai</a></li>
 		</ol>
 	</section>
 	<section class="content">
 		<!-- Default box -->
 		<div class="box">
 			<div class="box-header with-border">
 				<span> Nilai</span>
 				
 				<div class="box-tools pull-right">
 					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
 					title="Collapse">
 					<i class="fa fa-minus"></i></button>
 					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
 						<i class="fa fa-times"></i></button>
 					</div>
 				</div>
 				<div class="box-body">
 					<table class="table table-bordered table-striped " id="tabel" style="width: 100%">
 						<thead>
 							<tr bgcolor="#c7ecee">
 								<td>ID TUGAS</td>
 								<td>ID SANTRI</td>
 								<td>NAMA SANTRI</td>
 								<td>NILAI</td>
 							</tr>
 						</thead>
 						<tbody>
 							<?php 
 							include "koneksi.php";
 							$sql=mysqli_query($koneksi, "SELECT * FROM nilai INNER JOIN u_tugas on nilai.kode_upload=u_tugas.kode_upload where u_tugas.id_santri='$_SESSION[id_santri] '");
		//print_r($sql);
 							$totaltugas=mysqli_num_rows($sql);
 							$nilaitotal=0;
 							if ($totaltugas!=0) {

 								while($data=mysqli_fetch_array($sql)){
 									?>
 									<tr>
 										<td><?php echo $data['id_tugas'] ?></td>
 										<td><?php echo $data['id_santri'] ?></td>
 										<td><?php echo $data['nama_santri'] ?></td>
 										<td><?php echo $data['nilai'] ?></td>
 									</tr>
 									<?php 
 									$nilaitotal +=$data['nilai'];
 									?>
 								<?php } ?>
 								<tr>
 									<td colspan="3">Total</td>
 									<td><?php echo $nilaitotal; ?></td>

 								</tr>
 								<tr>
 									<td colspan="3" bgcolor="#bdc3c7">Rata2</td>
 									<td bgcolor="#bdc3c7"><?php $ratarata= $nilaitotal / $totaltugas;
 									echo $ratarata; ?></td>
 								</tr> 
 							<?php } ?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</section>
 	</div>
