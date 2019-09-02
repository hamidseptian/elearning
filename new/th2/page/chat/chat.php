 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<section class="content-header">
 		<h1>
 			CHAT
 			<small>it all starts here</small>
 		</h1>
 		<ol class="breadcrumb">
 			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 			<li><a href="#">Chat</a></li>
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
 							<tr bgcolor="#c7ecee">
 								<td align="center" >AKSI</td>
 								<td style="width: 200px">MEMBER</td>
 								<td style="width: 200px">CHAT</td>
 								<td style="width: 200px">WAKTU</td>
 							</tr>
 						</thead>
 						<tbody>
 							<?php 
 							include "koneksi.php";
 							$sql=mysqli_query($koneksi, "SELECT * FROM chatting order by waktu desc");
 							while($data=mysqli_fetch_array($sql)){
 								?>

 								<tr>
 									<td><center><div><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Chat" href="?page=chat&aksi=chatting&id=<?php echo $data['id'] ?>"><span class="glyphicon glyphicon-comment"></span></a>
 										<a onclick="return confirm ('Yakin hapus <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus" href="delete.php?kd=<?php echo $data['pengirim'];?>"><span class="glyphicon glyphicon-trash"></a>
 										</center></td>
 										<td><?php echo $data['nama'] ?></td>
 										<td><?php echo $data['chat'] ?></td>
 										<td><?php echo $data['waktu'] ?></td>
 									</tr>
 								<?php } ?>
 							</tbody>
 						</table>
 					</div>
 					<div class="clear-fix">

 					</div>
 				</div>
 			</section>
 		</div>
