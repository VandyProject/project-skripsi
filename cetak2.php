<?php
include "koneksi.php";
?>

<div class="container">
    <div class="row">
        <ul class="breadcrumb">
            <div id="judul">HASIL KLASSIFIKASI STATUS STUNTING BALITA MENGGUNAKAN METODE K-NN (K-NEARETS NEIGHBOR)</div>
        </ul>
    </div>

    <style>
    #judul {
        text-align: center;
        font-size: 14pt;
        font-weight: bold;
        margin-bottom: 20px;
    }

    table {
        border-collapse: collapse;
    }

    th {
        padding: 10px;
        text-align: center;
    }

    td {
        padding-left: 5px;
        padding-right: 10px;
    }
    </style>

    <div clsss="panel panel-container">
        <div class="bootstrap-table">

            <div class="table-responsiv">
                <table class="table table-bordered">

                    <hr>
                    <br>
                    <table border="1" align="center">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Umur</th>
                                <th class="text-center">Tinggi Badan</th>
                                <th class="text-center">Berat Badan</th>
                                <th class="text-center">Lingkar Kepala</th>
                                <th class="text-center">Lingkar Lengan</th>
                                <th class="text-center">Hasil klasifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $data=mysql_query("SELECT * FROM data_uji order by id asc");
                        $no=1;
                        while ($a=mysql_fetch_array($data)) { 
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text"><?php echo $a['jenis_kelamin'] ?></td>
                                <td class="text"><?php echo $a['Umur'] ?></td>
                                <td class="text-center"><?php echo $a['Tinggi_Badan'] ?></td>
                                <td class="text-center"><?php echo $a['Berat_Badan'] ?></td>
                                <td class="text-center"><?php echo $a['Lingkar_Kepala'] ?></td>
                                <td class="text-center"><?php echo $a['Lingkar_Lengan'] ?></td>
                                <td class="text-center"><?php echo $a['kelas_klasifikasi'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <script type="text/javascript">
                    window.print();
                    </script>
            </div>
        </div>
    </div>
</div>