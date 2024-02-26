<div class="card">
    <div class="card-body">
        <h1><div class="sidebar-brand-text">Kategori Buku<sup></sup></div></h1>
    <!-- DataTales Example -->

    <div class="row">
        <div class="col-md-12">
        <?php
                if($_SESSION['user']['level'] !=='peminjam'){
            ?>
            <a href="?page=kategori_tambah" class="btn btn-success">+ Tambah Kategori Buku</a>
            <?php
            }
            ?>
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top:1rem;">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <?php
                    if($_SESSION['user']['level'] !=='peminjam'){
                        ?>
                    <th>Hapus Dan Edit Kategori</th>
                    <?php
                    }
                    ?>
                </tr>
                <?php
                    $i = 1;
                    $query = mysqli_query($kon, "SELECT*FROM kategori");
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <th><?php echo $i++; ?></th>
                    <th><?php echo $data['kategori']; ?></th>
                    <?php
                    if($_SESSION['user']['level'] !=='peminjam'){
                        ?>
                    <th>
                        <a href="?page=kategori_ubah&&id=<?php echo $data['id_kategori'];  ?>" class="btn btn-info">Ubah Kategori</a>
                        <a onclick="return confirm('Yakin Ingin Menghapus Kategori ini?')" href="?page=kategori_hapus&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-danger">Hapus Kategori</a>
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