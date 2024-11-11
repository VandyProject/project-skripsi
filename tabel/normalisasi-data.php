<?php

include "koneksi.php";

    $sqlJumlahKasusTotal = mysql_query("SELECT COUNT(*) as jumlah_total FROM normalisasi");
    $rowJumlahKasusTotal = mysql_fetch_array($sqlJumlahKasusTotal);
    $getJumlahKasusTotal = $rowJumlahKasusTotal['jumlah_total'];

        if($rowJumlahKasusTotal['jumlah_total'] == 0) {
            echo "<script type='text/javascript'>
                    setTimeout(function () {  
                    swal.fire
                    ({
                        title: 'Opps',
                        text:  'PERHITUNGAN BELUM DILAKUKAN',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });  
                },10); 
                    window.setTimeout(function(){ 
                    window.location.replace('konten.php?page=train-data');
                    } ,3000);</script>";

        }else{


        $tampildata =mysql_query("SELECT * FROM `normalisasi` ORDER BY id_normal");
        $total   =mysql_num_rows($tampildata);
        $tampil3 =mysql_query("SELECT * FROM `data_uji` ORDER BY id");
        $hitung  =mysql_num_rows($tampil3);

}
?>

<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-wallet icon-gradient bg-plum-plate"></i>
     </div>
        <div>Normalisasi Data Table<div class="page-title-subheading">Ini adalah hasil perhitungan setelah melakukan <b>Normalisasi Training Data</b></div>
        </div>
    </div>  
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Normalisasi Data</h5>
                <div class="table-responsive">
                    <table class="table display nowrap datatab" style="text-align:center">
                        <thead>
                            <tr>
                                <th >Iterasi Ke</th>
                                <th >Jenis Kelamin</th>
                                
                                <th >Umur</th>
                                <th >Tinggi Badan</th>
                                <th >Berat Badan</th>
                                <th >Lingkar Kepala</th>
                                <th >Lingkar Lengan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $nomer=0;
                                 while($user=mysql_fetch_array($tampildata)){
                                     $nomer++;
                             ?>  
                        <tr>
                             <td><?php echo $user['id_normal'];?></td>
                             <td><?php echo $user['jenis_kelamin'];?></td>
                             
                             <td><?php echo round($user['Umur'],4);?></td>
                             <td><?php echo round($user['Tinggi_Badan'],4);?></td>
                             <td><?php echo round($user['Berat_Badan'],4);?></td>
                             <td><?php echo round($user['Lingkar_Kepala'],4);?></td>
                             <td><?php echo round($user['Lingkar_Lengan'],4);?></td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 

                        