<?php

error_reporting(0);
        include "koneksi.php";

		    $sqlJumlahKasusTotal = mysql_query("SELECT COUNT(*) as jumlah_total FROM data_latih");
            $rowJumlahKasusTotal = mysql_fetch_array($sqlJumlahKasusTotal);
            $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];


		if($rowJumlahKasusTotal['jumlah_total'] == 0) {
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
   window.location.replace('konten.php?page=train-data');
  } ,3000);</script>";

		}else{	
		
        include "knn/normalisasi.php";
        populateDb();
        knn('', '');
}
	
?>
