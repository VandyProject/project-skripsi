<?php

include "koneksi.php";
    
    error_reporting(0);
    $tampiluji = mysql_query("SELECT * FROM data_uji");
    $total_uji = mysql_num_rows($tampiluji);

        if(isset($_POST['submit'])){
        $jumlah =$_POST['jumlah'];

        $ambildata      = mysql_query("SELECT * FROM data_uji ORDER BY id");
        while ($data12  = mysql_fetch_array($ambildata)) {
        $id_data = $data12['id'];

        $simpan = mysql_query("UPDATE data_uji set jumlah_k = '$jumlah' where id = $id_data ");
        }

    if ($total_uji == 0) {

        echo "<script type='text/javascript'>
                setTimeout(function () {  
                swal.fire
                ({
                    title: 'Error',
                    text:  'Test Data Kosong',
                    type: 'warning',
                    timer: 3000,
                    showConfirmButton: true
                });  
            },10); 
                window.setTimeout(function(){ 
                window.location.replace('konten.php?page=test-data');
            } ,3000);</script>";

        } elseif ($simpan) {

            $sqlJumlahKasusTotal = mysql_query("SELECT COUNT(*) as jumlah_total FROM data_uji");
            $rowJumlahKasusTotal = mysql_fetch_array($sqlJumlahKasusTotal);
            $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

            $data_hitung    = mysql_query("SELECT COUNT(*) as total FROM normalisasi");
            $rowdatahitung  = mysql_fetch_array($data_hitung);
            $getdatahitung  = $rowdatahitung['total'];

        if($rowJumlahKasusTotal['jumlah_total'] == 0) {
                echo "<script type='text/javascript'>
                        setTimeout(function () {  
                        swal.fire
                        ({
                            title: 'Gagal',
                            text:  'Data Uji Kosong',
                            type: 'warning',
                            timer: 3000,
                            showConfirmButton: true
                        });  
                        },10); 
                            window.setTimeout(function(){ 
                            window.location.replace('konten.php?page=data-uji');
                        } ,3000);</script>";

        }else if ($rowdatahitung['total'] == 0){
                echo "<script type='text/javascript'>
                        setTimeout(function () {  
                        swal.fire
                        ({
                            title: 'WAW',
                            text:  'Perhitungan Normalisasi Data Latih Belum dilakukan!',
                            type: 'warning',
                            timer: 3000,
                            showConfirmButton: true
                        });  
                        },10); 
                        window.setTimeout(function(){ 
                        window.location.replace('konten.php?page=data-uji');
                        } ,3000);</script>";


        }else{ 
        
        include "knn/uji-data.php";
        populateDb();
        hitung_distance('', '');
        
        }
    }
}
?>