<div class="loader">
    <img src="LoaderIcon.gif" alt="Loading..." />
<?php
include "koneksi.php";


function knn($atribut, $nilai_atribut)
{
    perhitungan($atribut, $nilai_atribut);
}

function populateDb() 
{
             mysql_query("TRUNCATE normalisasi");
}


function perhitungan ($atribut, $nilai_atribut)
{

// $ambilMAX1  = mysql_query("SELECT MAX(jumlah_mk) as max, MIN(jumlah_mk) as min FROM data_latih order by id");
// $dataMAX1   = mysql_fetch_array($ambilMAX1);
// $mk_max    = $dataMAX1 ['max'];
// $mk_min    = $dataMAX1 ['min'];

$ambilMAX2  = mysql_query("SELECT MAX(Tinggi_Badan) as max, MIN(Tinggi_Badan) as min FROM data_latih order by id");
$dataMAX2   = mysql_fetch_array($ambilMAX2);
$ips1max    = $dataMAX2 ['max'];
$ips1min    = $dataMAX2 ['min'];

$ambilMAX3  = mysql_query("SELECT MAX(Berat_Badan) as max, MIN(Berat_Badan) as min FROM data_latih order by id");
$dataMAX3   = mysql_fetch_array($ambilMAX3);
$ips2max    = $dataMAX3 ['max'];
$ips2min    = $dataMAX3 ['min'];

$ambilMAX4  = mysql_query("SELECT MAX(Lingkar_Kepala) as max, MIN(Lingkar_Kepala) as min FROM data_latih order by id");
$dataMAX4   = mysql_fetch_array($ambilMAX4);
$ips3max    = $dataMAX4 ['max'];
$ips3min    = $dataMAX4 ['min'];

$ambilMAX5  = mysql_query("SELECT MAX(Lingkar_Lengan) as max, MIN(Lingkar_Lengan) as min FROM data_latih order by id");
$dataMAX5   = mysql_fetch_array($ambilMAX5);
$ips4max    = $dataMAX5 ['max'];
$ips4min    = $dataMAX5 ['min'];

$ambilMAX6  = mysql_query("SELECT MAX(Umur) as max, MIN(Umur) as min FROM data_latih order by id");
$dataMAX6   = mysql_fetch_array($ambilMAX6);
$sks_max    = $dataMAX6 ['max'];
$sks_min    = $dataMAX6 ['min'];

$ambildata      = mysql_query("SELECT * FROM data_latih ORDER BY id");
while ($data1    = mysql_fetch_array($ambildata)) {

    // $jumlah_mk  = ($data1['jumlah_mk']-$mk_min)/($mk_max-$mk_min);
    $Umur = ($data1['Umur']-$sks_min)/($sks_max-$sks_min);
    $Tinggi_Badan     = ($data1['Tinggi_Badan']-$ips1min)/($ips1max-$ips1min);
    $Berat_Badan     = ($data1['Berat_Badan']-$ips2min)/($ips2max-$ips2min);
    $Lingkar_Kepala     = ($data1['Lingkar_Kepala']-$ips3min)/($ips3max-$ips3min);
    $Lingkar_Lengan     = ($data1['Lingkar_Lengan']-$ips4min)/($ips4max-$ips4min);

mysql_query("INSERT INTO normalisasi VALUES ('$data1[id]','$data1[jenis_kelamin]','$Umur','$Tinggi_Badan','$Berat_Badan','$Lingkar_Kepala','$Lingkar_Lengan','$data1[kelas]')");  
}

$ambildata1      = mysql_query("SELECT * FROM normalisasi ORDER BY id_normal");
while ($data2    = mysql_fetch_array($ambildata1)) {

  if ($data2[jenis_kelamin] == 'L') {
    
      mysql_query("UPDATE normalisasi set jenis_kelamin = '0' WHERE id_normal = $data2[id_normal] ");

  } else {

      mysql_query("UPDATE normalisasi set jenis_kelamin = '1' WHERE id_normal = $data2[id_normal] ");
  }
  
  if ($data2[kelas] == 'Tidak') {
    
      mysql_query("UPDATE normalisasi set kelas ='1' WHERE id_normal = $data2[id_normal]");
  
  } else {

      mysql_query("UPDATE normalisasi set kelas ='0' WHERE id_normal = $data2[id_normal]");
  }

}

}


echo "<script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Sukses !',
    text:  'Proses Normalisasi Selesai',
    type: 'success',
    timer: 3000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('konten.php?page=normalisasi-data');
  } ,3000);</script>";
?>
</div>

