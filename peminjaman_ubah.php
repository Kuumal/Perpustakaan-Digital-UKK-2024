<h1><div class="sidebar-brand-text">Peminjaman Buku<sup></sup></div></h1>
<!-- DataTales Example -->
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
         <form method="post">
            <?php
            $id = $_GET['id'];
                if(isset($_POST['submit'])) {
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                    $tanggal_dikembalikan = strtotime("+7 day", strtotime($tanggal_peminjaman));
                    $tanggal_dikembalikan = date('Y-m-d', $tanggal_dikembalikan);
                    $status = $_POST['status'];
                    $jumlah = $_POST['jumlah'];

                    $query = mysqli_query($kon, "UPDATE peminjaman set id_buku='$id_buku', id_user='$id_user', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_dikembalikan' ,status='$status' , jumlah='$jumlah' WHERE id_peminjaman='$id'");

                    if($query) {
                        echo '<script>alert("Data Peminjaman Berhasil Diubah.");</script>';
                    } else {
                        echo '<script>alert("Data Peminjaman Gagal Diubah.");</script>';
                    }
                }
                $query = mysqli_query($kon, "SELECT*FROM peminjaman where id_peminjaman='$id'");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Buku</h4></div>
                <div class="col-md-8">

                    <select class="form-control" name="id_buku">
                    <?php
                        $buk = mysqli_query($kon, "SELECT*FROM buku");
                        while($buku = mysqli_fetch_array($buk)) {
                            ?>
                            <option <?php if($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul'];?></option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Tanggal Peminjaman</h4></div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_peminjaman" value="<?php echo $data['tanggal_peminjaman']; ?>">
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Tanggal Pengembalian</h4></div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_pengembalian" value="<?php echo $data['tanggal_pengembalian']; ?>">
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Status Peminjaman</h4></div>
                <div class="col-md-8">
                    <select name="status" class="form-control">
                        <option value="dipinjam" <?php if($data['status'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>
                        <option value="dikembalikan" <?php if($data['status'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
                    </select>
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Jumlah Yang Dipinjam</h4></div>
                <div class="col-md-8">
                    <input type="number" class="form-control" name="jumlah" min="1" max="2" value="<?php echo $data['jumlah']; ?>">
                    </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Simpan Perubahan</button>
                    <button class="btn btn-secondary"  type="reset">Reset</button>
                    <a href="?page=peminjaman" class="btn btn-danger">Kembali Ke Menu Peminjaman</a>
                </div>
            </div>
         </form>
    </div>
</div>
    </div>
</div>