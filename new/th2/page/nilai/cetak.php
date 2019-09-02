<html>
<head>
	<title>coba cetak</title>
</head>
<body>
 
	<center>
 
		
		<h4>print laporan</h4>
		<h4>NILAI SANTRI</h4>
 
	</center>
 

	<table border="1" style="width: 100%">
		<tr>
				<td>ID TUGAS</td>
				<td>ID SANTRI</td>
				<td>NAMA SANTRI</td>
				<td>NAMA TUGAS</td>
				<td>NILAI</td>
			</tr>
		<?php 
		include "../../koneksi.php";
		$sql=mysqli_query($koneksi, "SELECT * FROM nilai INNER JOIN u_tugas ON nilai.kode_upload=u_tugas.kode_upload INNER JOIN tugas ON u_tugas.id_tugas=tugas.id_tugas ");
		$totaltugas=mysqli_num_rows($sql);
		//$nilaitotal=0;
			
		while($data=mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $data['kode_upload'] ?></td>
				<td><?php echo $data['id_santri'] ?></td>
				<td><?php echo $data['nama_santri'] ?></td>
				<td><?php echo $data['nama_tugas'] ?></td>
				<td><?php echo $data['nilai'] ?></td>
			</tr>
		<?php } ?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>