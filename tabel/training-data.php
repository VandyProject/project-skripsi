<?php

include "koneksi.php";
$tampilUser =mysql_query("SELECT * FROM data_latih ORDER BY id ");

?>

<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-filter icon-gradient bg-warm-flame"></i>
     </div>
        <div>Training Data Table<div class="page-title-subheading">Ini adalah halaman Training Data yang berisikan sebuah dataset mentah yang akan diklasifikasikan dengan algoritma k-NN</div>
        </div>
    </div>  
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">
                </h5> 
                <button class="mb-2 mr-2 btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-upload"></i> Import Data</button>
                <a href="konten.php?page=normalisasi" class="mb-2 mr-2 btn-icon btn btn-primary">
                    <i class="fa fa-star"></i> Normalisasi</a>
                <form method="post" enctype="multipart/form-data" action="">
                <a href="./cetak/cetak.php" class="mb-2 mr-2 btn-icon btn btn-warning">
                    <i class="fa fa-download"></i> Backup Data Testing</a>       
                <button class="mb-2 mr-2 btn-icon btn btn-danger" name="delete" type="delete" >
                    <i class="fa fa-trash"></i> Hapus Semua Data</button></form>
            </div>
        </div>
    </div>
</div>    

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Data Latih</h5>
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
    $sql = mysql_query("TRUNCATE data_latih");
    $sql_del = mysql_query("TRUNCATE normalisasi");

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
                window.location.replace('konten.php?page=train-data');
        } ,3000);</script>";
    }
}
?>
                        