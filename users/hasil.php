<?php
error_reporting(0);
include "koneksi.php";
$tampil =mysql_query("SELECT * FROM `data_uji` ORDER BY id DESC limit 1 ");
$get_tampil =mysql_fetch_array($tampil) ;

if ($get_tampil['kelas'] == "") {
    mysql_query("UPDATE data_uji set kelas = '$get_tampil[kelas_klasifikasi]' where id = '$get_tampil[id]'");
}
$tampildata =mysql_query("SELECT * FROM data_uji ORDER BY id ");

$tampildata2 =mysql_query("SELECT * FROM data_uji ORDER BY id ");

$tampil2 =mysql_query("SELECT * FROM `user` WHERE username ='user'");
$get_tampil2 =mysql_fetch_array($tampil2) ;

?>
<div class="row justify-content-md-center">
    <div class="col-lg-6">
    	<form method="post" enctype="multipart/form-data" action="">
            <div class="mb-3 card text-white card-body bg-primary"><h3 class="text-white card-title">Hasil Klasifikasi Status Gizi Balita Adalah </h3><?php
                            if ($get_tampil[kelas_klasifikasi] == 'Tidak') {
                            echo '<h1><center><span class="badge badge-warning">TIDAK STUNTING</span></h1>';
                            }
                            elseif ($get_tampil[kelas_klasifikasi] == 'Stunting') {
                            echo '<h1><center><span class="badge badge-success">STUNTING</span></h1>';
                            }
                         ?>
                         <p><i>Hasil klasifikasi ini diperoleh dari perhitungan menggunakan algoritma k-NN
                         </p></i>
                         <p><b>Dengan Jenis Kelamin =<?php echo ($get_tampil[jenis_kelamin])?>, Umur = <?php echo ($get_tampil[Umur])?> 
                         Tinggi Badan = <?php echo ($get_tampil[Tinggi_Badan])?>, Berat Badan = <?php echo ($get_tampil[Berat_Badan])?>, Lingkar Kepala = <?php echo ($get_tampil[Lingkar_Kepala])?>, Lingkar Lengan = <?php echo ($get_tampil[Lingkar_Lengan])?>,</b> </p>
                         
						 <a target=" _blank" href="cetak2.php" class="btn btn-primary">Cetak</a>
                         	<button class="btn btn-danger" name="delete" type="insert">Tekan Selesai</button>
                         </form>
            </div>
    </div>
</div>

<!-- <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
   <li class="nav-item">
       <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
    		<span>Hasil Analisa</span>
        </a>
                            </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
             <span>Hasil Akurasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
            <span>Normalize Test Data</span>
        </a>
    </li>
</ul> -->
<!--  -->
<?php
if (isset($_POST['delete'])) {
    $sql =  mysql_query("DELETE FROM data_uji where id='$get_tampil[id]'");
if ($sql) {
    echo "<script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Sukses',
    text:  'Anda telah menyelesaikan klasifikasi',
    type: 'success',
    timer: 3000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('index2.php');
  } ,3000);</script>";
}
    
 
    
}
    ?>