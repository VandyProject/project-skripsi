<?php

include "koneksi.php";

    $sqlJumlahKasusTotal = mysql_query("SELECT COUNT(*) as jumlah_total FROM distance");
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


        $tampildata =mysql_query("SELECT * FROM `distance` ORDER BY id");
        $total   =mysql_num_rows($tampildata);

}
?>

<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-wallet icon-gradient bg-plum-plate"></i>
     </div>
        <div>Euclidean Distance Data Table<div class="page-title-subheading">Ini adalah hasil perhitungan setelah melakukan <b>k-NN</b> dan merupakan hasil dari test data terakhir</div>
        </div>
    </div>  
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">distance Data</h5>
                <div class="table-responsive">
                    <table class="table display nowrap datatab" style="text-align:center">
                        <thead>
                            <tr>
                                <th >Iterasi Ke</th>
                                <th >Euclidean Distance</th>
                                <th >Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $nomer=0;
                                 while($user=mysql_fetch_array($tampildata)){
                                     $nomer++;
                             ?>  
                        <tr>
                             <td><?php echo $user['id'];?></td>
                             <td><?php echo $user['nilai'];?></td>
                             <td><?php
                                    if ($user['kelas'] == 0) {
                                        echo "Stunting";
                                    } else {
                                        echo "Tidak";
                                    }
                                 ?>
                             </td>
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

                        