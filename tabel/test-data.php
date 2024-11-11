<?php

include "koneksi.php";
$tampilUser =mysql_query("SELECT * FROM data_uji ORDER BY id ");

?>

<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-menu icon-gradient bg-ripe-malin"></i>
     </div>
        <div>Test Data Table<div class="page-title-subheading">Ini adalah halaman Test Data yang akan diklasifikasikan setelah melakukan tahap <b>Normalisasi Training Data</b></div>
        </div>
    </div>  
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                </h5> 
                <button class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target="#exampleModal2">
                    <i class="fa fa-upload"></i> Import Data</button>
                <a href="konten.php?page=add-data" class="mb-2 mr-2 btn-icon btn btn-dark">
                    <i class="fa fa-plus"></i> Tambah Data Training</a>
                <button class="mb-2 mr-2 btn-icon btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                    <i class="fa fa-star"></i> Hitung k-NN</button>
                <form method="post" enctype="multipart/form-data" action="">
                <a href="./cetak/cetak-uji.php" class="mb-2 mr-2 btn-icon btn btn-warning">
                    <i class="fa fa-download"></i> Backup Data Training</a>       
                <button class="mb-2 mr-2 btn-icon btn btn-danger" name="delete" type="delete" >
                    <i class="fa fa-trash"></i> Hapus Semua Data</button></form>
            </div>
        </div>
    </div>
</div>    

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Data Uji</h5>
                <div class="table-responsive">
                    <table class="table table-stripped table-hover datatab" style="text-align:center">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >Jenis Kelamin</th>
                                
                                <th >Umur</th>
                                <th >Tinggi Badan</th>
                                <th >Berat Badan</th>
                                <th >Lingkar Kepala</th>
                                <th >Lingkar Lengan</th>
                                <th >Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $nomer=0;
                                 while($user=mysql_fetch_array($tampilUser)){
                                     $nomer++;
                             ?>  
                        <tr>
                             <td><?php echo $user['id'];?></td>
                             <td><?php
                                    if ($user['jenis_kelamin'] == 'L') {
                                        echo "Laki-Laki";
                                    }else{
                                        echo "Perempuan";
                                    }
                                 ?> 
                              </td>
                             
                             <td><?php echo $user['Umur'];?></td>
                             <td><?php echo $user['Tinggi_Badan'];?></td>
                             <td><?php echo $user['Berat_Badan'];?></td>
                             <td><?php echo $user['Lingkar_Kepala'];?></td>
                             <td><?php echo $user['Lingkar_Lengan'];?></td>
                             <td><?php echo $user['kelas'];?></td>
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

<?php

if (isset($_POST['delete'])) {
    $sql = mysql_query("TRUNCATE data_uji");
if ($sql) {
    echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal.fire
            ({
                title: 'Hapus Sukses',
                text:  'Semua Data berhasil Hapus',
                type: 'success',
                timer: 3000,
                showConfirmButton: true
                });  
            },10); 
            window.setTimeout(function(){ 
                window.location.replace('konten.php?page=test-data');
        } ,3000);</script>";
    }
}
?>
                        