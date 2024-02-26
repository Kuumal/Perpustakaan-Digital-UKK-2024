<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Buku Favorit</h1>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <form method="post">
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = mysqli_query($kon, "SELECT * FROM buku  WHERE id_buku='$id'");
                $data = mysqli_fetch_array($query);

                $id = $_SESSION['user']['id_user'];
                $buku = $data['id_buku'];
                $check_query = "SELECT COUNT(*) AS total FROM koleksipribadi WHERE id_user = $id AND id_buku = $buku";
                $check_result = mysqli_query($kon, $check_query);
                $check_data = mysqli_fetch_assoc($check_result);

                if($check_data['total']> 0){
                  // jika buku sudah ada dalam koleksi, beri responns kepada pengguna
                  echo "<script>
                  alert('Buku sudah dalam ada dalam koleksi favorit anda');
                  location.href = 'index.php?page=favorit';
                </script>";
                } else {
                  //jika buku belum ada dalam koleksi, tambahkan buku ke koleksi favorit
                   $query = "INSERT INTO koleksipribadi(id_user, id_buku) VALUES ('$id','$buku')";
                   mysqli_query($kon, $query);

                   //beri respons kepada pengguna bahwa buku telah ditambahkan ke favorit
                   echo "<script>
                  alert('Selamat anda berhasil menambahkan buku ke favorit');
                  location.href = 'index.php?page=favorit';
                </script>";
                }
            }
            ?>
          <div class="row m-4"> 
        <?php
        $query = mysqli_query($kon, "SELECT*FROM koleksipribadi JOIN buku on buku.id_buku = koleksipribadi.id_buku JOIN user on user.id_user= koleksipribadi.id_user");
        while($data = mysqli_fetch_array($query)){
            ?>
            <div class="card m-4" style="width: 14rem;">
            <img src="img/<?php echo $data['gambar'];?>" class="cart-img-top">
            <div class="card-body">
                <h5 class="cart-title"><?php echo $data['judul'];?></h5>
                <a class="btn btn-outline-secondary" href="?page=detail_buku&&id=<?php echo $data['id_buku'];?>" class="btn btn-primary">Detail</a>
                <?php
                if($_SESSION['user']['level'] ='peminjam'){
                    ?>
                    <a class="btn btn-outline-success" href="?page=detail_pinjam&&id=<?php echo $data['id_buku']?>">Pinjam</a>
                    <a class="btn btn-outline-danger" href="?page=hapus_fav&&id=<?php echo $data['koleksi_id']?>" onclick="return confirm('Apakah Anda Ingin Menghapus Buku Tersebut?')"><i class="fa fa-bookmark"></i></a>
                    <?php
                }?>
                </div>
              </div>
              <?php
            }?>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
          </div>
            