<div class="card">
    <div class="card-body">
        <h1><div class="sidebar-brand-text">Buku Yang Tersedia<sup></sup></div></h1>
    <!-- DataTales Example -->

    <div class="row">
        <div class="col-md-12">
            <a href="?page=buku_tambah" class="btn btn-success">+ Tambah Buku</a>
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 1rem;">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th width='10%'>Gambar</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $i = 1;
                    $query = mysqli_query($kon, "SELECT*FROM buku left join kategori on buku.id_kategori = kategori.id_kategori");
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <th><?php echo $i++; ?></th>
                    <th><?php echo $data['kategori']; ?></th>
                    <th><?php echo $data['judul']; ?></th>
                    <th><img src="img/<?php echo $data['gambar'];?>" class="rounded" width='100%'></th>
                    <th><?php echo $data['penulis']; ?></th>
                    <th><?php echo $data['penerbit']; ?></th>
                    <th><?php echo $data['tahun_terbit']; ?></th>
                    <th><?php echo $data['deskripsi']; ?></th>
                    <th><?php echo $data['stok']; ?></th>
                    <th>
                        <a href="?page=buku_ubah&&id=<?php echo $data['id_buku'];  ?>" class="btn btn-info">Ubah Detail Buku</a>
                        <a onclick="return confirm('Yakin Ingin Menghapus Buku Ini?')" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger">Hapus Buku</a>
                    </th>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
</div>
    </div>
</div>