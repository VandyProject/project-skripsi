<?php
	error_reporting(0);
	session_start();
	include "koneksi.php";
	$username		= mysql_real_escape_string($_POST['username']);
	$password		= mysql_real_escape_string($_POST['password']);
	$op 			= $_GET['op'];

	if($op=="in"){
		$sql = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
		if(mysql_num_rows($sql)==1){
			$qry = mysql_fetch_array($sql);
			$_SESSION['username']  = $qry['username'];
			$_SESSION['nama'] 	   = $qry['nama'];
			$_SESSION['status']    = $qry['status'];	   
			$_SESSION['hak_akses'] = $qry['hak_akses'];
			$_SESSION["last_login_time"] = time();

			if($qry['aktif']=="Tidak Aktif"){
                 echo "<script type='text/javascript'>
  						setTimeout(function () {  
   						swal.fire
   						({
    					title: 'Opps',
    					text:  'Status AKun Tidak Aktif',
    					type: 'warning',
    					timer: 3000,
    					showConfirmButton: true
   						});  
 						},10); 
  							window.setTimeout(function(){ 
   						window.location.replace('index.php');
  						} ,3000);</script>";
			}
			else if($qry['hak_akses']=="Admin"){
				echo "<script type='text/javascript'>
   						window.location.replace('konten.php');
  					  </script>";
			}
			else if($qry['hak_akses']=="User"){
				echo "<script type='text/javascript'>
   						window.location.replace('index2.php');
  					  </script>";;
			}
		
		}
		else{
                 echo "<script type='text/javascript'>
  						setTimeout(function () {  
   						swal.fire
   						({
    					title: 'Opps',
    					text:  'Username atau Password Salah !',
    					type: 'warning',
    					timer: 3000,
    					showConfirmButton: true
   						});  
 						},10); 
  							window.setTimeout(function(){ 
   						window.location.replace('index.php');
  						} ,3000);</script>";
		}
	}else if($op=="out"){
		unset($_SESSION['username']);
		unset($_SESSION['hak_akses']);
		header("location:index.php");
	}

?>

