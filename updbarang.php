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
        $id_barang=$_POST['id_barang'];
        $nama_barang=$_POST['nama_barang'];
        $jumlah_barang=$_POST['jumlah_barang'];
        $jenis_barang=$_POST['jenis_barang'];
        $kondisi=$_POST['kondisi'];
        $deskripsi=$_POST['deskripsi'];

        $simpan=mysqli_query($koneksi, "update  barang set 
        id_barang='$id_barang',
        nama_barang='$nama_barang',
        jumlah_barang='$jumlah_barang',
        jenis_barang='$jenis_barang',
        kondisi='$kondisi',
        deskripsi='$deskripsi'
        where id_barang='$id_barang'");


        if ($simpan) {
        header (location:'databarang.php');

        } else {
            echo "<div class='alert alert-danger'>Gagal menambah data baru!</div> ";
        }
    }
?>
    <div class="container">
      <!-- <div class="d-flex justify-content-center align-items-center" style="height: 100vh"> -->
        <div class="text-center">
        <h2>Form Edit Alat Praktik</h2></div>
        <form method="post" action="">
        <?php
            $tampil=mysqli_query($koneksi, "select * from barang where id_barang='$_GET[id]'");
            foreach($tampil as $row){
           
        ?>
        <div class="form group ">
    <label for="id barang"><b>Id Barang</b></label>
    <input value="<?php echo "$row[id_barang]"?>" type="text" class="form-control" placeholder="Id barang.." name="id_barang">
    </div><br>

    <div class="form group">
    <label for="nama barang"><b>Nama Barang</b></label>
    <input value="<?php echo "$row[nama_barang]"?>" type="text" class="form-control" placeholder="nama barang.." name="nama_barang">
    </div><br>

    <div class="form group">
    <label for="jenis barang"><b>Jenis Barang</b></label>
    <input value="<?php echo "$row[jenis_barang]"?>" type="text" class="form-control" placeholder="jenis barang.." name="jenis_barang">
    </div><br>

    <div class="form group">
    <label for="jumlah barang"><b>jumlah Barang</b></label>
    <input value="<?php echo "$row[jumlah_barang]"?>" type="number" class="form-control" placeholder="Id barang.." name="jumlah_barang">
    </div><br>

    <div class="form group">
    <label for="kondisi barang"><b>Kondisi Barang</b></label>
    <input value="<?php echo "$row[kondisi]"?>" type="text" class="form-control" placeholder="kondisi barang.." name="kondisi">
    </div><br>

    <div class="form group">
    <label for="deskripsi barang"><b>Deskripsi</b></label>
    <input value="<?php echo "$row[deskripsi]"?>" type="text" class="form-control" placeholder="deskripsi barang.." name="deskripsi">
    </div><br>

    </div>
    <br>
        <center><button type="submit" name="ok" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Cancel</button></center>
<?php }?>
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
