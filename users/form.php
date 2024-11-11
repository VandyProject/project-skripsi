<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-filter icon-gradient bg-mean-fruit"></i>
     </div>
        <div>Form Prediction
            <div class="page-title-subheading">Selamat datang di Sistem Penentuan Status Gizi Balita Menggunakan Metode K-NN.
        </div>
    </div>  
</div>

        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title"> Wajib Diisi</h5>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="position-relative row form-group">
                                <label for="radio2" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                                <div class="col-sm-10">
                                    <div class="position-relative form-check">
                                        <label class="form-check-label">
                                            <input name="jenis_kelamin" value="L" type="radio" class="form-check-input" required=""> Laki-Laki
                                        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="form-check-label">
                                            <input name="jenis_kelamin" value="P" type="radio" class="form-check-input" required="">  Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="position-relative row form-group">
                                <label for="angka" class="col-sm-2 col-form-label">Umur </label>
                                    <div class="col-sm-10">
                                        <input name="Umur" id="angka" placeholder="Masukan Umur Balita" type="number" step="0.01" class="form-control" required="">
                                    </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="angka" class="col-sm-2 col-form-label">Tinggi Badan </label>
                                    <div class="col-sm-10">
                                        <input name="Tinggi_Badan" id="angka" placeholder="Masukan Tinggi Badan Balita" type="number" step="0.01" class="form-control" required="">
                                    </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="angka" class="col-sm-2 col-form-label">Berat Badan </label>
                                    <div class="col-sm-10">
                                        <input name="Berat_Badan" id="angka" placeholder="Masukan Berat Badan Balita" type="number" step="0.01" class="form-control" required="">
                                    </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="angka" class="col-sm-2 col-form-label">Lingkar Kepala </label>
                                    <div class="col-sm-10">
                                        <input name="Lingkar_Kepala" id="angka" placeholder="Masukan Lingkar Kepala Balita" type="number" step="0.01" class="form-control" required="">
                                    </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="angka" class="col-sm-2 col-form-label">Lingkar Lengan </label>
                                    <div class="col-sm-10">
                                        <input name="Lingkar_Lengan" id="angka" placeholder="Masukan Lingkar Lengan Balita" type="number" step="0.01" class="form-control" required="">
                                    </div>
                            </div>
                            <div class="pull-right">
                            <button  type="reset" class="mt-1 btn btn-warning">Reset</button>
                            <button name="save" type="submit" value="save" class="mt-1 btn btn-primary">Klasifikasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php   

   if (isset($_POST['save'])) {

    $jenis_kelamin      =$_POST['jenis_kelamin'];
    
    $Umur         =$_POST['Umur'];
    $Tinggi_Badan             =$_POST['Tinggi_Badan'];
    $Berat_Badan             =$_POST['Berat_Badan'];
    $Lingkar_Kepala             =$_POST['Lingkar_Kepala'];
    $Lingkar_Lengan             =$_POST['Lingkar_Lengan'];
    $kelas              =$_POST['kelas'];


    
    include "koneksi.php";


        $insert = "INSERT INTO data_uji (jenis_kelamin, Umur, Tinggi_Badan, Berat_Badan, Lingkar_Kepala, Lingkar_Lengan, kelas, kelas_klasifikasi) VALUES 
         ('$jenis_kelamin','$Umur','$Tinggi_Badan','$Berat_Badan','$Lingkar_Kepala','$Lingkar_Lengan','$kelas','')";
        $query = mysql_query ($insert);
        
        if($query){
            echo "<script>
                        window.location.href='index2.php?page=prediction';
                  </script>";
            }
            else {
                echo "<script>
                        alert('Gagal Dong !!!');
                    </script>";
        }
    }
?>