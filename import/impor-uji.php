<div class="loader">
    <img src="LoaderIcon.gif" alt="Loading..." />

 <?php

 error_reporting(0);
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
include "koneksi.php";
 
//memanggil file excel_reader
require "import/excel_reader2.php";
 
//jika tombol import ditekan
if(isset($_POST['submit'])){

$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)

      $jenis_kelamin   = $data->val($i, 1);
      
      $Umur      = $data->val($i, 2);
      $Tinggi_Badan          = $data->val($i, 3);
      $Berat_Badan          = $data->val($i, 4);
      $Lingkar_Kepala          = $data->val($i, 5);
      $Lingkar_Lengan          = $data->val($i, 6);
      $kelas           = $data->val($i, 7);

    
      //setelah data dibaca, masukkan ke tabel pegawai sql
       $query = "INSERT INTO data_uji (jenis_kelamin, Umur, Tinggi_Badan, Berat_Badan, Lingkar_Kepala, Lingkar_Lengan, kelas) VALUES 
         ('$jenis_kelamin','$Umur','$Tinggi_Badan','$Berat_Badan','$Lingkar_Kepala','$Lingkar_Lengan','$kelas')";
  
     $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
   if ($hasil) $sukses++;
  else $gagal++;
}

}

// tampilan status sukses dan gagal
echo "<script type='text/javascript'>
  setTimeout(function () {  
   swal.fire
   (
    {
      title: 'Impor Sukses',
      text:  'For $sukses Data berhasil Impor',
      type: 'success',
      timer: 3000,
      showConfirmButton: true
   }
  );  },10); 
  window.setTimeout(function(){ 
   window.location.replace('konten.php?page=test-data');
  } ,3000); </script>"

?>
 
</div>
