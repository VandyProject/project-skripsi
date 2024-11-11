 <?php

 error_reporting(0);
    if (isset ($_SESSION['username'])){
    $username = $_SESSION['username'];
    }
    include "koneksi.php";
    $datauser=mysql_query("SELECT * FROM user order by username ");

    $tampilPeg  = mysql_query("SELECT * FROM user WHERE username='$username'");
    $hasil  = mysql_fetch_array ($tampilPeg);
?>

<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-monitor icon-gradient bg-mean-fruit"></i>
     </div>
        <div>Users Data Table<div class="page-title-subheading">Ini adalah halaman manajemen data pengguna dan akun pengguna </div>
        </div>
    </div>  
</div>

<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
   <li class="nav-item">
       <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
            <span>Data Pengguna</span>
        </a>
                            </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
             <span>Tambah Data</span>
        </a>
    </li>
    <li class="nav-item">
        <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
            <span>Update Data</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Evaluation Test Data</h5>
                        <div class="table-responsive">
                            <table class="table table-stripped table-hover datatab" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Hak Akses</th>
                                        <th>Status</th>
                                        <th>Aktif</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                          $nomer=0;
                                            while($user=mysql_fetch_assoc($datauser)){
                                                $nomer++;
                                        ?>  
                                    <tr>
                                        <td><?php echo $nomer?></td>
                                        <td><?php echo $user['username'];?></td>
                                        <td><?php echo $user['nama'];?></td>
                                        <td><?php echo $user['hak_akses'];?></td>
                                        <td><?php echo $user['status'];?></td>
                                        <td>
                                            <?php
                                            $status = trim($user['aktif']);
                                            if ($user['aktif'] == "Aktif") {
                                                echo '<span class="badge badge-success '.str_replace(" ", "", $status).'">'.$user['aktif'].'</span></td>';
                                            } else {
                                                echo '<span class="badge badge-danger '.str_replace(" ", "", $status).'">'.$user['aktif'].'</span></td>';
                                            }   
                                            ?>
                                        <td align="center">
                                            <?php
                                                if ($user['username'] != $_SESSION['username'] AND $user['aktif'] == 'Tidak Aktif' ) {
                                                   echo '<a href="konten.php?page=hapus-user&username='.$user['username'].'" title="Hapus AKun"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="konten.php?page=aktivasi-data&username='.$user['username'].'" title="Aktivasi Akun"><i class="fa fa-toggle-on"></i></a></td>';
                                                } elseif ($user['username'] != $_SESSION['username'] AND $user['aktif'] == 'Aktif' ) {
                                                   echo '<a href="konten.php?page=hapus-user&username='.$user['username'].'" title="Hapus AKun"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="konten.php?page=deactivate-data&username='.$user['username'].'" title="Non Aktifkan Akun"><i class="fa fa-toggle-off"></i></a></td>';
                                                } else{
                                                    echo "Not Avilable";
                                                }                                           

                                                ?>
                                            
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

    <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
         <div class="row">
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Tambah Data Pengguna</h5>
                        <form method="post" action="konten.php?page=input-data" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
                            <div class="position-relative form-group">
                                <label for="nama" class="">Nama</label>
                                    <input name="nama" placeholder=""  class="form-control" required="">
                            </div>
                            <div class="position-relative form-group">
                                <label for="username" class="">Username</label>
                                    <input name="username" placeholder=""  class="form-control" required="">
                            </div>
                            <div class="position-relative form-group">
                                <label for="password" class="">Password</label>
                                    <input name="password" id="examplePassword22" placeholder="" type="password" class="form-control" required="">
                            </div>
                            <div class="position-relative form-group">
                                <label for="status" class="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Administrator">Administrator</option>
                                        <option value="Mahasiswa">User</option>
                                    </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="hak_akses" class="">Hak Akses</label>
                                    <select name="hak_akses" class="form-control" onchange="changeValue(this.value)">
                                        <option value="pilih">-Pilih-</option>
                                        <option value="Admin">Administrator</option>
                                        <option value="User">User</option>
                                    </select>
                            </div>
                            <button name="submit" type="submit" value="submit" class="mt-1 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h5 class="card-title">Update User Account</h5>
                        <form method="post" action="konten.php?page=edit-data" enctype="multipart/form-data">
                            <div class="position-relative form-group">
                                <label for="nama" class="">Nama</label>
                                    <input name="nama" placeholder="<?=$hasil['nama'];?>"  class="form-control" required="">
                            </div>
                            <div class="position-relative form-group">
                                <label for="username" class="">Username</label>
                                    <input name="username" placeholder="<?=$hasil['username'];?>"  class="form-control" required="">
                            </div>
                            <div class="position-relative form-group">
                                <label for="password" class="">Password</label>
                                    <input name="password" id="examplePassword22" placeholder="" type="password" class="form-control" required="">
                            </div>
                            <button name="save" type="submit" value="save" class="mt-1 btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function validasi_input(form){
 if (form.status.value =="pilih"){
    alert("Ada data yang kosong !!!");
    return (false);
 }
return (true);
}
</script>