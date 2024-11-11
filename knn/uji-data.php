   <div class="login-form-area adminpro-pd mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details shadow-reset">
                            <h2>Sedang mengambil data ............</h2>
                            <p></p>
  <?php

include "koneksi.php";

function knn($atribut, $nilai_atribut)
{
    hitung_distance($atribut, $nilai_atribut);
}

function populateDb() 
{
            mysql_query("truncate distance");

            $ambil_d  = mysql_query("SELECT * FROM `data_uji` ORDER BY id");
            while ($data_d  = mysql_fetch_array($ambil_d)){

              mysql_query("UPDATE data_uji SET kelas_klasifikasi = '' WHERE id = '$data_d[id]' ");

            }
normalisasi();
}

function normalisasi()
{

mysql_query("truncate distance");

// $ambilMAX1  = mysql_query("SELECT MAX(jumlah_mk) as max, MIN(jumlah_mk) as min FROM data_uji order by id");
// $dataMAX1   = mysql_fetch_array($ambilMAX1);
// $mk_max    = $dataMAX1 ['max'];
// $mk_min    = $dataMAX1 ['min'];

$ambilMAX2  = mysql_query("SELECT MAX(Tinggi_Badan) as max, MIN(Tinggi_Badan) as min FROM data_uji order by id");
$dataMAX2   = mysql_fetch_array($ambilMAX2);
$ips1max    = $dataMAX2 ['max'];
$ips1min    = $dataMAX2 ['min'];

$ambilMAX3  = mysql_query("SELECT MAX(Berat_Badan) as max, MIN(Berat_Badan) as min FROM data_uji order by id");
$dataMAX3   = mysql_fetch_array($ambilMAX3);
$ips2max    = $dataMAX3 ['max'];
$ips2min    = $dataMAX3 ['min'];

$ambilMAX4  = mysql_query("SELECT MAX(Lingkar_Kepala) as max, MIN(Lingkar_Kepala) as min FROM data_uji order by id");
$dataMAX4   = mysql_fetch_array($ambilMAX4);
$ips3max    = $dataMAX4 ['max'];
$ips3min    = $dataMAX4 ['min'];

$ambilMAX5  = mysql_query("SELECT MAX(Lingkar_Lengan) as max, MIN(Lingkar_Lengan) as min FROM data_uji order by id");
$dataMAX5   = mysql_fetch_array($ambilMAX5);
$ips4max    = $dataMAX5 ['max'];
$ips4min    = $dataMAX5 ['min'];

$ambilMAX6  = mysql_query("SELECT MAX(Umur) as max, MIN(Umur) as min FROM data_uji order by id");
$dataMAX6   = mysql_fetch_array($ambilMAX6);
$sks_max    = $dataMAX6 ['max'];
$sks_min    = $dataMAX6 ['min'];

$ambildata      = mysql_query("SELECT * FROM data_uji ORDER BY id");
while ($data12    = mysql_fetch_array($ambildata)) {
$id_data = $data12['id'];

    // $jumlah_mk  = ($data12['jumlah_mk']-$mk_min)/($mk_max-$mk_min);
    $Umur = ($data12['Umur']-$sks_min)/($sks_max-$sks_min);
    $Tinggi_Badan     = ($data12['Tinggi_Badan']-$ips1min)/($ips1max-$ips1min);
    $Berat_Badan     = ($data12['Berat_Badan']-$ips2min)/($ips2max-$ips2min);
    $Lingkar_Kepala     = ($data12['Lingkar_Kepala']-$ips3min)/($ips3max-$ips3min);
    $Lingkar_Lengan     = ($data12['Lingkar_Lengan']-$ips4min)/($ips4max-$ips4min); 

// mysql_query("UPDATE data_uji set mk_n  ='$jumlah_mk'  WHERE id = $id_data ");
mysql_query("UPDATE data_uji set Umur_n ='$Umur'  WHERE id = $id_data ");
mysql_query("UPDATE data_uji set Tinggi_Badan_n  ='$Tinggi_Badan' WHERE id = $id_data  ");
mysql_query("UPDATE data_uji set Berat_Badan_n  ='$Berat_Badan' WHERE id = $id_data  ");
mysql_query("UPDATE data_uji set Lingkar_Kepala_n  ='$Lingkar_Kepala' WHERE id = $id_data  ");
mysql_query("UPDATE data_uji set Lingkar_Lengan_n  ='$Lingkar_Lengan' WHERE id = $id_data  ");

if ($data12[jenis_kelamin] == 'L') {
    
      mysql_query("UPDATE data_uji set jk_n = '0' WHERE id = $id_data ");

  } else {

      mysql_query("UPDATE data_uji set jk_n = '1' WHERE id = $id_data ");
  }


}

}

function hitung_distance($atribut, $nilai_atribut)
{

$ambil_n = mysql_query("SELECT * FROM data_uji WHERE kelas_klasifikasi = ''  ORDER BY id ASC LIMIT 1");
$data_n    =mysql_fetch_array($ambil_n);

$jumlah_k    =$data_n['jumlah_k'];

$ambildata  = mysql_query("SELECT * FROM normalisasi ORDER BY id_normal");
while ( $data1  = mysql_fetch_array($ambildata)) {

$distance = pow($data1['jenis_kelamin']-$data_n['jk_n'],2)+pow($data1['Umur']-$data_n['Umur_n'], 2)+pow($data1['Tinggi_Badan']-$data_n['Tinggi_Badan_n'], 2)+pow($data1['Berat_Badan']-$data_n['Berat_Badan_n'], 2)+pow($data1['Lingkar_Kepala']-$data_n['Lingkar_Kepala_n'], 2)+pow($data1['Lingkar_Lengan']-$data_n['Lingkar_Lengan_n'], 2);

$akar     = sqrt($distance);

mysql_query("INSERT INTO distance VALUES ('','$akar','$data1[kelas]')");

}

$ambil_d  = mysql_query("SELECT kelas FROM `distance` ORDER BY nilai ASC LIMIT $jumlah_k ");
while ($data_d  = mysql_fetch_array($ambil_d)){

if ( $data_n['jumlah_k'] == 1 ) {
    
    if ($data_d[kelas] >= 0.5 ) {
    
      mysql_query("UPDATE data_uji set kelas_klasifikasi ='Tidak' WHERE id ='$data_n[id]'");
  
  } else {

      mysql_query("UPDATE data_uji set kelas_klasifikasi ='Stunting' WHERE id = '$data_n[id]'");
  }

 }
 else if ($data_n['jumlah_k'] > 1) {
   
      $total  += $data_d['kelas'];
      $hasil  = $total / $jumlah_k;

    if ($hasil >= 0.5 ) {
    
            mysql_query("UPDATE data_uji set kelas_klasifikasi ='Tidak' WHERE id ='$data_n[id]'");
  
        } else {

            mysql_query("UPDATE data_uji set kelas_klasifikasi ='Stunting' WHERE id = '$data_n[id]'");
        }
 }

 }
 ambil_kondisi();
}




function ambil_kondisi()
{

$sqlJumlahKasusTotal = mysql_query("SELECT COUNT(*) as jumlah_total FROM data_uji WHERE kelas_klasifikasi = '' ");
$rowJumlahKasusTotal = mysql_fetch_array($sqlJumlahKasusTotal);
$getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

if ($getJumlahKasusTotal == 0) {

echo "<script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Sukses',
    text:  'Data Berhasil Klasifikasi',
    type: 'success',
    timer: 3000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('konten.php?page=evaluation-data');
  } ,3000);</script>";
 
} else {

 mysql_query("truncate distance");
 hitung_distance($atribut, $nilai_atribut);

}

}

echo "<script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Sukses',
    text:  'Data Berhasil Klasifikasi',
    type: 'success',
    timer: 3000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('konten.php?page=evaluation-data');
  } ,3000);</script>"; 

?>
 </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>