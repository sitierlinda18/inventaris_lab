<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Peminjaman Alat</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning mb-3">
 <a class="navbar-brand" href="#"> Lab RPL AKSATA</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" datatarget="#navbarNavDropdown" aria-controls="navbarNavDropdown" ariaexpanded="false" aria-label="Toggle navigation">
 <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNavDropdown">
 <ul class="navbar-nav">
 <li class="nav-item active">
 <a class="nav-link" href="index.html">Home</a>
 </li>
 <li class="nav-item dropdown">
 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="botton" data-mdb-toggle="dropdown" aria-expanded="false">Master Data</a>
 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
  <li>
    <a class="dropdown-item" href="databarang.php">Data Barang</a>
  </li>
  <li>
    <a class="dropdown-item" href="datamember.php">Data Member</a>
  </li>
</ul>
</li>
 </ul>
 </div>
</nav>
<?php
    include "koneksi.php";
    if (isset($_POST["ok"])) {
        $id_member=$_POST['id_member'];
        $password=$_POST['password'];
        $nama=$_POST['nama'];
        $kelas=$_POST['kelas'];
        $no_hp=$_POST['no_hp'];

        $simpan=mysqli_query($koneksi, "update  member set 
        id_member='$id_member',
        password='$password',
        nama='$nama',
        kelas='$kelas',
        no_hp='$no_hp'");

        if($simpan) {
            header ("location:datamember.php");
           } else {
             echo "<div class='alert alert-danger'> Gagal Menambah Data Baru!</div>";
           }
 }
 ?>
    <div class="container">
      <!-- <div class="d-flex justify-content-center align-items-center" style="height: 100vh"> -->
        <div class="text-center">
        <h2>Form Input Alat Praktik</h2></div>
        <form method="post" action="">
        <?php
            $tampil=mysqli_query($koneksi, "select * from member where id_member='$_GET[id]'");
            foreach ($tampil as $row) {
            ?>

        <div class="form group ">
    <label for="id member"><b>Id member</b></label>
    <input   value="<?php echo $row['id_member']; ?>" type="text" class="form-control" placeholder="Id member.." name="id_member">
    </div><br>

    <div class="form group">
    <label for="password"><b>password</b></label>
    <input  value="<?php echo $row['password']; ?>" type="text" class="form-control" placeholder="password.." name="password">
    </div><br>

    <div class="form group">
    <label for="nama"><b>nama</b></label>
    <input  value="<?php echo $row['nama']; ?>" type="text" class="form-control" placeholder="nama.." name="nama">
    </div><br>

    <div class="form group">
    <label for="kelas"><b>kelas</b></label>
    <input  value="<?php echo $row['kelas']; ?>" type="text" class="form-control" placeholder="kelas.." name="kelas">
    </div><br>

    <div class="form group">
    <label for="no_hp "><b>no_hp member</b></label>
    <input value="<?php echo $row['no_hp']; ?>" type="text" class="form-control" placeholder="081231.." name="no_hp">
    </div><br>


    </div>
    <br>
        <center><button type="submit" name="ok" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Cancel</button></center>
        <?php } ?>
    </form>
        </div> 
      </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
