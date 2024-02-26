<div class="card">
    <div class="card-body">
    <h1><div class="sidebar-brand-text">Daftar Buku<sup></sup></div></h1>
    <div class="container" style="margin-top: 2rem;">
    <div class="row">
    <!-- DataTales Example -->
                <?php
                    $query = mysqli_query($kon, "SELECT*FROM buku");
                    while($data = mysqli_fetch_array($query)){
                ?>
        <div class="card m-4" style="width: 13rem;">
        <img src="img/<?php echo $data['gambar'];?>" class="rounded" width='100%' height='185' class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $data['judul']; ?></h5>
            <a href="?page=detail_buku&&id=<?php echo $data['id_buku'];  ?>" class="btn btn-primary">Detail</a>
            <a href="?page=detail_pinjam&&id=<?php echo $data['id_buku']; ?>" class="btn btn-secondary">Pinjam</a>
            <a href="?page=favorit&&id=<?php echo $data['id_buku']; ?>" class="fas fa-bookmark btn btn-warning" style="margin-top: 3%;"></a>
        </div>
        <div class="card-body" style="margin-top:">
            
        </div>
        
    </div>
                <?php
                }
                ?>
</div>
</div>
    </div>
</div>