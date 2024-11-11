<?php
error_reporting(0);
include "koneksi.php";
$tampildata =mysql_query("SELECT * FROM data_uji ORDER BY id ");
$tampildata2 =mysql_query("SELECT * FROM data_uji ORDER BY id ");

?>

<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-monitor icon-gradient bg-mean-fruit"></i>
     </div>
        <div>Hasil Analisa<div class="page-title-subheading">Ini adalah halaman hasil evaluasi setelah dilakukan dua tahap sebelumnya yaitu <b>Normalisasi</b> dan <b>Hitung k-NN</b> </div>
        </div>
    </div>  
</div>

<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
   <li class="nav-item">
       <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
    		<span>Hasil Klasifikasi</span>
        </a>
                            </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
             <span>Hasil Akurasi</span>
        </a>
    </li>
	<li class="nav-item">
        <a role="tab" class="nav-link" id="tab-3" data-toggle="tab" href="#tab-content-3">
            <span>Normalisasi Training Data</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
            <span>Normalisasi Test Data</span>
        </a>
    </li>
</ul>
<div class="tab-content">
	<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
		<div class="row">
		    <div class="col-lg-12">
		        <div class="main-card mb-3 card">
		            <div class="card-body"><h5 class="card-title">Hasil Klasifikasi</h5>
		                <div class="table-responsive">
		                    <table class="table table-stripped table-hover datatab" style="text-align:center">
		                        <thead>
		                            <tr>
		                            	<th >Nilai k</th>
		                                <th >Jenis Kelamin</th>
		                                
		                                <th >Umur</th>
		                                <th >Tinggi Badan</th>
		                                <th >Berat Badan</th>
		                                <th >Lingkar Kepala</th>
		                                <th >Lingkar Lengan</th>
		                                <th >Kelas Asli</th>
		                                <th >Kelas Klasifikasi</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            <?php
		                               $nomer=0;
		                                 while($user=mysql_fetch_array($tampildata)){
		                                     $nomer++;
		                             ?>  
		                        <tr>
		                             <td><?php echo $user['jumlah_k'];?></td>
		                             <td><?php echo $user['jenis_kelamin'];?></td>
		                             
		                             <td><?php echo $user['Umur'];?></td>
		                             <td><?php echo $user['Tinggi_Badan'];?></td>
		                             <td><?php echo $user['Berat_Badan'];?></td>
		                             <td><?php echo $user['Lingkar_Kepala'];?></td>
		                             <td><?php echo $user['Lingkar_Lengan'];?></td>
		                             <td><?php echo $user['kelas'];?></td>
		                             <td><?php echo $user['kelas_klasifikasi'];?></td>
		                        </tr>
		                        <?php
		                            }
									
		                        ?>
								<a target=" _blank" href="cetak3.php" class="btn btn-primary">Cetak</a>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>


<!-- Perhitungan Confusion Matrix -->
		<?php
            $que = mysql_query("SELECT * FROM data_uji");
            $jumlah_uji=mysql_num_rows($que);
            //$TP=0; $FN=0; $TN=0; $FP=04; $kosong=0;
            $TP = $FP = $TN = $FN = 0;
            $kosong = 0;
            while ($row = mysql_fetch_array($que)) {
                $asli = $row['kelas'];
                $klasifikasi = $row['kelas_klasifikasi'];
                if($asli=='Tidak' & $klasifikasi=='Tidak'){
                        $TP++;
                }
                else if($asli=='Tidak' & $klasifikasi=='Stunting'){
                        $FP++;
                }
                else if($asli=='Stunting' & $klasifikasi=='Tidak'){
                        $FN++;
                }
                else if($asli=='Stunting' & $klasifikasi=='Stunting'){
                        $TN++;
                }
                else if($klasifikasi==''){
                        $kosong++;
                }
            }


            $tidak      = ($TP + $TN);
            $tidak_tepat= ($FP + $FN + $kosong);


            $akurasi    = ($tidak/$jumlah_uji)*100;
            $akurasi    = round($akurasi,2);

            


    	?> 

	<div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
		 <div class="row">
		    <div class="col-lg-6">
		        <div class="main-card mb-3 card">
		            <div class="card-body"><h5 class="card-title">Hasil Akurasi</h5>
		                <table class="mb-0 table">
		                    <thead>
		                       
		                    </thead>
		                    <tbody>
		                        <tr>
		                            <!-- <td>1</td> -->
		                            <td><b>Akurasi</b></td>
		                            <td><div class="badge badge-success"><?php echo $akurasi?> %</div></td>
		                        </tr>
		                        
		                    </tbody>
		                </table>
		            </div>
		        </div>
		    </div>
			<div class="col-lg-6">
	            <div class="main-card mb-3 card">
	                <div class="card-body"><h5 class="card-title">Confusion Matrix Table</h5>
	                    <table class="mb-0 table table-bordered">
	                        <thead>
	                            <tr>
	                                <th>Jumlah = <?php echo $jumlah_uji?> </th>
	                                <th>Kelas Tidak</th>
	                                <th>Kelas Stunting</th>
	                            </tr>
                        	</thead>
                        	<tbody>
	                            <tr>
	                                <td><b>Kelas Tidak</b></td>
	                                <td><font color="blue"><b><?php echo $TP?></b></font></td>
	                                <td><?php echo $FP?></td>
	                            </tr>
	                            <tr>
	                                <td><b>Kelas Stunting</b></td>
	                                <td><?php echo $FN?></td>
	                                <td><font color="blue"><b><?php echo $TN?></b></font></td>
	                            </tr>
	                            <tr>
	                                <td></td>
	                                <td>N = <?php echo $TP + $FN?></td>
	                                <td>N = <?php echo $FP + $TN?></td>
	                                
	                            </tr>
                        	</tbody>
                    	</table>
	                   </div>
	               </div>
	           </div>
	        </div>
    	</div>

   
	<div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
		<div class="row">
		    <div class="col-lg-12">
		        <div class="main-card mb-3 card">
		            <div class="card-body"><h5 class="card-title">Normalisasi Test Data</h5>
		                <div class="table-responsive">
		                    <table class="table table-stripped table-hover datatab" style="text-align:center">
		                        <thead>
		                            <tr>
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
		                                 while($user=mysql_fetch_array($tampildata2)){
		                                     $nomer++;
		                             ?>  
		                        <tr>
		                             <td><?php echo $user['jk_n'];?></td>
		                             
		                             <td><?php echo $user['Umur_n'];?></td>
		                             <td><?php echo $user['Tinggi_Badan_n'];?></td>
		                             <td><?php echo $user['Berat_Badan_n'];?></td>
		                             <td><?php echo $user['Lingkar_Kepala_n'];?></td>
		                             <td><?php echo $user['Lingkar_Lengan_n'];?></td>
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
	</div>
	<div class="tab-pane tabs-animation fade" id="tab-content-3" role="tabpanel">
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
		<div class="row">
		    <div class="col-lg-12">
		        <div class="main-card mb-3 card">
		            <div class="card-body"><h5 class="card-title">Normalisasi Training Data</h5>
		                <div class="table-responsive">
		                    <table class="table table-stripped table-hover datatab" style="text-align:center">
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
	</div>
</div>
