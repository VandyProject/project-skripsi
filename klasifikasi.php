<?php

error_reporting(0);
        include "koneksi.php";


    $tampil =mysql_query("SELECT * FROM `data_uji` ORDER BY id ASC limit 1 ");
    $get_tampil =mysql_fetch_array($tampil) ;
    $id_data = $get_tampil['id'];
    $jumlah = $get_tampil['jumlah_k'];

    $simpan = mysql_query("UPDATE data_uji set jumlah_k = '$jumlah' where kelas = '' ");

		    $sqlJumlahKasusTotal = mysql_query("SELECT COUNT(*) as jumlah_total FROM data_latih");
            $rowJumlahKasusTotal = mysql_fetch_array($sqlJumlahKasusTotal);
            $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

            $data_hitung	= mysql_query("SELECT COUNT(*) as total FROM normalisasi");
            $rowdatahitung	= mysql_fetch_array($data_hitung);
            $getdatahitung	= $rowdatahitung['total'];

			$ambildata  = mysql_query("SELECT * FROM data_uji ORDER BY id DESC LIMIT 1");
			$data1		= mysql_fetch_array($ambildata);

      $tampil2 =mysql_query("SELECT * FROM `user` ORDER BY username DESC limit 1 ");
      $get_tampil2 =mysql_fetch_array($tampil2) ;

		if($rowJumlahKasusTotal['jumlah_total'] == 0) {

			$del	= mysql_query("DELETE FROM data_uji where id='$data1[id]'");
      $sql2 =  mysql_query("DELETE FROM user where username='$get_tampil2[username]'");

echo "<script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Gagal',
    text:  'Data Latih Kosong',
    type: 'warning',
    timer: 3000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('index.php?page=form-prediction');
  } ,3000);</script>";

		}else if ($rowdatahitung['total'] == 0){

		$del	= mysql_query("DELETE FROM data_uji where id='$data1[id]'");
    $sql2 =  mysql_query("DELETE FROM user where username='$get_tampil2[username]'");

echo "<script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   ({
    title: 'Gagal',
    text:  'Perhitungan Belum Dilakukan !',
    type: 'warning',
    timer: 3000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('index.php?page=form-prediction');
  } ,3000);</script>";
		}else{	
        include "users/uji-klasifikasi.php";
        normalisasi();
        hitung_distance('', '');
}
	
?>