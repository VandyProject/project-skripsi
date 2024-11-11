
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
        $deactivate = "UPDATE user SET aktif='Tidak Aktif' WHERE username='$username'";
        $sql = mysql_query ($deactivate);        

    }
    mysql_close($Open);

?>
    <script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Sukses !',
    text:  'Akun Tidak Aktif',
    type: 'success',
    timer: 900,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('konten.php?page=users-data');
  } ,900);</script>

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
        $deactivate = "UPDATE user SET aktif='Aktif' WHERE username='$username'";
        $sql = mysql_query ($deactivate);        

    }
    mysql_close($Open);

?>
    <script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Sukses !',
    text:  'Akun Sudah Aktif',
    type: 'success',
    timer: 2000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('konten.php?page=users-data');
  } ,2000);</script>
