
<?php
include "koneksi.php";
if (isset($_GET['username'])) {
	$username = $_GET['username'];
	$query   = "SELECT * FROM user WHERE username='$username'";
	$hasil   = mysql_query($query);
	$data    = mysql_fetch_array($hasil);
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	
	if (!empty($username) && $username != "") {
		$delete = "DELETE FROM user WHERE username='$username'";
		$sqldel = mysql_query ($delete);		

	}
	mysql_close($Open);

?>
	<script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Sukses !',
    text:  'Data Berhasil Dihapus !',
    type: 'success',
    timer: 900,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('konten.php?page=users-data');
  } ,900);</script>
