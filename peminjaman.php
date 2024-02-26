<div class="card">
    <div class="card-body">
        <h1><div class="sidebar-brand-text">Peminjaman Buku<sup></sup></div></h1>
    <!-- DataTales Example -->

    <div class="row">
        <div class="col-md-12">
                <?php
                if($_SESSION['user']['level'] =='peminjam'){
                ?>
            <a href="?page=peminjaman_tambah" class="btn btn-success"><i class="fas fa-fw fa-book"></i>Pinjam Buku</a>
            <?php
                    }
                    ?>
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 1rem;">
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Jumlah</th>
                    <th>Status Peminjaman</th>
                    <th>Terlambat</th>
                    <th>Denda</th>
                    <?php
                        if($_SESSION['user']['level'] !='peminjam'){
                    ?>
                    <th>Hapus Dan Ubah Peminjaman</th>
                    <?php
                    }
                    ?>
                </tr>
                <?php
                    $i = 1;
                    $query = mysqli_query($kon, "SELECT*FROM peminjaman  LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku where peminjaman.id_user=". $_SESSION['user']['id_user']);
                    while($data = mysqli_fetch_array($query)){
                        $t = date_create($data['tanggal_pengembalian']);
                        $n = date_create(date('Y-m-d'));
                        $terlambat = date_diff($t, $n);
                        $hari = $terlambat->format("%a");
                        $denda = $hari * 1000;
                        ?>
                <tr>
                    <th><?php echo $i++; ?></th>
                    <th><?php echo $data['nama']; ?></th>
                    <th><?php echo $data['judul']; ?></th>
                    <th><?php echo $data['tanggal_peminjaman']; ?></th>
                    <th><?php echo $data['tanggal_pengembalian']; ?></th>
                    <th><?php echo $data['jumlah']; ?></th>
                    <th><?php echo $data['status']; ?></th>
                    <?php
                        if($data['status'] == 'dipinjam')
                        $denda=0;
                        {
                    ?>
                    <th><?php echo $hari; ?> Hari</th>
                    <th><?php echo $denda; ?></th>
                    <?php
                        }
                    ?>
                    <?php
                        if($_SESSION['user']['level'] !='peminjam'){
                    ?>
                    <th><?php if($data['status'] !='dikembalikan'){?>
                    <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman'];  ?>" class="btn btn-info " style="margin-top: 0,5rem;">Ubah Data Peminjaman</a>
                    <a onclick="return confirm('Yakin Ingin Menghapus Data Peminjaman?')" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger" style="margin-top: 0,5rem;">Hapus Data Peminjaman</a>
                    </th>
                    <?php
                    }
                    ?>
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