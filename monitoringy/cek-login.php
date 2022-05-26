
<?php
include 'connection/koneksi.php';
// fungsi untuk menghindari injeksi dari user
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}

if(isset($_POST['submit'])) {
	$user = anti_injection($_POST['username']);
	$pass = anti_injection($_POST['password']); 
// menghindari sql injection
$injeksi_user = mysqli_real_escape_string($con, $user);
$injeksi_pass = mysqli_real_escape_string($con, $pass);

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($injeksi_user) OR !ctype_alnum($injeksi_pass)){
  echo "Injection Vailed";
}
else{
	$sql = mysqli_query($con,"SELECT * FROM tb_user where username='$user' and password='$pass'");
	$data = mysqli_fetch_array($sql);
	$nama = $data['nama'];
	$username = $data['username'];
	$password = $data['password'];
	$level = $data['bagian'];
	

	if ($user==$username && $pass==$password) {
		session_start();
		$_SESSION['nama']=$nama;
		$_SESSION['username']=$username;
		$_SESSION['bagian']=$level;
		if ($level=='Admin') {
			echo "<script>alert('Anda berhasil Log In. Sebagai : $level');</script>";
			echo "<meta http-equiv='refresh' content='0; url=admin/indexadmin.php?page=dashboard.php'>";
		}
		 else if($level =="Produksi")
        {
            echo "<script>alert('Anda berhasil Log In. Sebagai : $level');</script>";
		echo "<meta http-equiv='refresh' content='0; url=produksi/indexproduksi.php?page=dashboard.php'>";
        }
        else if($level == "Gudang")
        {
            
           echo "<script>alert('Anda berhasil Log In. Sebagai : $level');</script>";
			echo "<meta http-equiv='refresh' content='0; url=gudang/indexgudang.php?page=dashboardgudang.php'>";
        }
        else if($level == "Manager")
        {
            
           echo "<script>alert('Anda berhasil Log In. Sebagai : $level');</script>";
			echo "<meta http-equiv='refresh' content='0; url=manager/indexmanager.php?page=dashboardproduksi.php'>";
        }
       
		
	} else {
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
			echo "<script>alert('Username dan password anda salah, Silahkan login kembali !');</script>";
	}
	
	
}
}
?>
