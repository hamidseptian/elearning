<?php 
session_start();
include "th2/koneksi.php";
$username=$_POST['username'];
$pass=$_POST['pass'];
$password= password_hash($pass, PASSWORD_DEFAULT);
$level_login=$_POST['level'];
$id_santri=$username;

//echo $user."<br>".$password;

// $sql= "insert into admin(nama_user, username, password, level) values ('Hamid', '$user', '$password', 'admin')";
// $execute=mysqli_query($conn, $sql);
if ($level_login=='admin') {
	$sql= "select * from user where username='$username' and level='$level_login' ";
	$execute=mysqli_query($koneksi, $sql);
//$x = mysqli_fetch_array($execute);
	$jml=mysqli_num_rows($execute);
//echo $jml;
	if ($jml==1) {
		$data=mysqli_fetch_array($execute);
		$passdb=$data['pass'];
		$verivikasi=password_verify($pass, $passdb);
		if ($verivikasi) {
			$_SESSION['login']=true;
	//	$_SESSION['id_karyawan']=$data['id_karyawan'];
			header("Location:th2/");
		}
		else{
			echo "<script>
			alert('Password Salah');
			</script>
			";
			echo "<meta http-equiv='refresh' content='0; url=http:login.php'>";

		}

	}else {
		echo "<script>
			alert('USER SALAH');
			</script>
			";
			echo "<meta http-equiv='refresh' content='0; url=http:login.php'>";
	}
}elseif ($level_login=='guru') {
	$sql= "select * from user where username='$username'  and level='$level_login' ";

	$execute=mysqli_query($koneksi, $sql);
//$x = mysqli_fetch_array($execute);
	$jml=mysqli_num_rows($execute);
//echo $jml;
	if ($jml==1) {
		$data=mysqli_fetch_array($execute);
		$passdb=$data['pass'];
		$verivikasi=password_verify($pass, $passdb);
		if ($verivikasi) {
			$_SESSION['login']=true;
	//	$_SESSION['id_karyawan']=$data['id_karyawan'];
			header("Location:th2/");
		}
		else{
			echo "<script>
			alert('Password Salah');
			</script>
			";

			echo "<meta http-equiv='refresh' content='0; url=http:login.php'>";

		}
	}
		else {
		echo "<script>
			alert('USER SALAH');
			</script>
			";
			echo "<meta http-equiv='refresh' content='0; url=http:login.php'>";
	}

}elseif ($level_login=='santri') {
	$sql= "select * from santri where id_santri='$id_santri'";

	$execute=mysqli_query($koneksi, $sql);
//$x = mysqli_fetch_array($execute);
	$jml=mysqli_num_rows($execute);
//echo $jml;
	if ($jml==1) {
		$data=mysqli_fetch_array($execute);
		$passdb=$data['pass'];
		$verivikasi=password_verify($pass, $passdb);
		if ($verivikasi) {
			$_SESSION['login']=true;
	//	$_SESSION['id_karyawan']=$data['id_karyawan'];
			header("Location:th2/");
		}
		else{
			echo "<script>
			alert('Yobana see laah');
			</script>
			";

			echo "<meta http-equiv='refresh' content='0; url=http:login.php'>";
		}

	}
}



?>
