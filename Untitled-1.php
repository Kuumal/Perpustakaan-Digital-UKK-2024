<div class="card">
    <div class="card-body">
        <h1><div class="sidebar-brand-text">Ulasan Buku<sup></sup></div></h1>
    <!-- DataTales Example -->
    <div class="card-body">
            <div class="col-md-12">
            <?php
                    if($_SESSION['user']['level'] =='peminjam'){
                 ?>
            <a href="?page=ulasan_tambah" class="btn btn-success">+ Buat Ulasan</a>
            <?php
                    }
                    ?>
            <br>
            </div>
        </div>
    <div class="row">
        <div class="card-body">
        <div class="col-md-12">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 1rem;">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <?php
                        if($_SESSION['user']['level'] !=='peminjam'){
                            ?>
                        <th>Aksi</th>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                        $i = 1;
                        $query = mysqli_query($kon, "SELECT*FROM ulasan LEFT JOIN user on user.id_user = ulasan.id_user LEFT JOIN buku on buku.id_buku = ulasan.id_buku");
                        while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th><?php echo $i++; ?></th>
                        <th><?php echo $data['nama']; ?></th>
                        <th><?php echo $data['judul']; ?></th>
                        <th><?php echo $data['ulasan']; ?></th>
                        <th><?php echo $data['rating']; ?></th>
                        <?php
                        if($_SESSION['user']['level'] !=='peminjam'){
                            ?>
                        <th>
                            <!--<a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan'];  ?>" class="btn btn-info">Ubah</a>-->
                            <a onclick="return confirm('Yakin Ingin Menghapus Data?')" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
                        </th>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        
</div>
    </div>
</div>