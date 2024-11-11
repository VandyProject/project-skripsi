<div class="loader">
    <img src="LoaderIcon.gif" alt="Loading..." />
<div class="register-box">
<?php
	if (isset ($_SESSION['username'])){
	$username = $_SESSION['username'];
	}
	include "koneksi.php";
	$tampilPeg	= mysql_query("SELECT * FROM user WHERE username='" . $_SESSION["username"] . "'");
	$hasil	= mysql_fetch_array ($tampilPeg);
				
	if ($_POST['save'] == "save") {
		$nama			=$_POST['nama'];
		$username		=$_POST['username'];
		$password		=$_POST['password'];

		
		$update= mysql_query ("UPDATE user SET nama='$nama', username='$username', password='$password' WHERE username='" . $_SESSION["username"] . "'");
		if($update){
			echo "<script type='text/javascript'>
  					setTimeout(function () {  
   					swal.fire
   					({
    					title: 'Sukses !',
    					text:  'Data Berhasil Diganti!',
    					type: 'success',
    					timer: 900,
    					showConfirmButton: true
   					});  
  					},10); 
  					window.setTimeout(function(){ 
   					window.location.replace('konten.php?page=users-data');
  					} ,900);</script>";
		}
		else {
			echo "<script type='text/javascript'>
  					setTimeout(function () {  
   					swal.fire
   					({
    					title: 'Gagal',
    					text:  'Gagal Simpan',
    					type: 'warning',
    					timer: 900,
    					showConfirmButton: true
   					});  
  					},10); 
  					window.setTimeout(function(){ 
   					window.location.replace('konten.php?page=users-data');
  					} ,900);</script>";
		}
	}




?>
</div>
</div>