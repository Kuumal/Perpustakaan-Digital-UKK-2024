<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Detail Buku</title>
  </head>
  <body>
    <?php
    $id=$_GET['id'];

    $query = mysqli_query($kon, "SELECT*FROM buku where id_buku=$id");
    $data = mysqli_fetch_array($query);
  ?>
    <div class="container" style="margin-top: 5rem;">
      <div class="card">
      <div>
        <div class="row">
          <div class="col-4 sidebar-brand-text" style="margin-top:2rem; margin-left:2rem; text-align:center"><h1>Deskripsi Buku</h1></div>
          <div class="col"></div>
        </div>
      </div>
      <div ></div>
        <div class="row m-4">  
          <div class="col-4" style="margin-bottom:2rem; margin-left:rem; text-align:center">
            <img src="img/<?php echo $data['gambar'];?>" class="rounded" width='' height="300" alt="..." style="">
          </div>
          <div class="col-1">
            <table width="500px" >
              <tr>
                <th><h3>Judul</h3></th>
                <th><h3>:</h3></th>
                <th><h3><?php echo $data['judul'];?></h3></th>
              </tr>
              <tr>
                <th><h3>Penulis</h3></th>
                <th><h3>:</h3></th>
                <th><h3><?php echo $data['penulis'];?></h3></th>
              </tr>
              <tr>
                <th><h3>Penerbit</h3></th>
                <th><h3>:</h3></th>
                <th><h3><?php echo $data['penerbit'];?></h3></th>
              </tr>
              <tr>
                <th><h3>Tahun Terbit</h3></th>
                <th><h3>:</h3></th>
                <th><h3><?php echo $data['tahun_terbit'];?></h3></th>
              </tr>
              <tr>
                <th valign="top"><h3>Deskripsi</h3></th>
                <th valign="top"><h3>:</h3></th>
                <th><h3><?php echo $data['deskripsi'];?></h3></th>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>