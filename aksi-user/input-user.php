<div class="loader">
    <img src="LoaderIcon.gif" alt="Loading..." />
<div class="register-box">
<?php	
	if ($_POST['submit'] == "submit") {
	$nama		=$_POST['nama'];
	$username	=$_POST['username'];
	$password	=$_POST['password'];
	$hak_akses	=$_POST['hak_akses'];
	$status		=$_POST['status'];
	
	
	include "koneksi.php";

	$cekuser	=mysql_num_rows (mysql_query("SELECT username FROM user WHERE username='$_POST[username]'"));

	if (empty($_POST['username'])  || empty($_POST['password']) || empty($_POST['hak_akses'])) {
		echo "<script>
					alert('Pastikan Data Tidak Kosong');
						window.location.href='konten.php?page=users-data';
				</script>";
		}
		
		else if($cekuser > 0) {
		echo "<script>
					alert('Username Sudah Terpakai');
						window.location.href='konten.php?page=users-data';
				</script>";
		}
		
		else{

			
	
		$insert = "INSERT INTO user (username, nama,  password, hak_akses, status, Aktif) VALUES ( '$username','$nama', '$password', '$hak_akses', '$status', 'Tidak Aktif')";
		$query = mysql_query ($insert);
		
		if($query){
			echo "<script type='text/javascript'>
  					setTimeout(function () {  
   					swal.fire
   				  ({
    				title: 'Sukses !',
    				text:  'Data Berhasil Disimpan.!',
    				type: 'success',
    				timer: 3000,
    				showConfirmButton: true
   				 });  
  				},10); 
  					window.setTimeout(function(){ 
   					window.location.replace('konten.php?page=users-data');
  				} ,3000);</script>";
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}

	}
?>
</div>
</div>