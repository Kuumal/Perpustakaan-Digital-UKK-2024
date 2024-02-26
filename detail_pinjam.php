<h1><div class="sidebar-brand-text">Peminjaman Buku<sup></sup></div></h1>
<!-- DataTales Example -->
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
         <form method="post">
            <?php
                $id=$_GET['id'];
                if(isset($_POST['submit'])) {
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                    $tanggal_dikembalikan = strtotime("+7 day", strtotime($tanggal_peminjaman));
                    $tanggal_dikembalikan = date('Y-m-d', $tanggal_dikembalikan);
                    $status = $_POST['status'];
                    $jumlah = $_POST['jumlah'];

                    $query = mysqli_query($kon, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status,jumlah) VALUES('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_dikembalikan','$status','$jumlah')");
                        
                    if($query) {
                        echo '<script>alert("Buku Berhasil Dipinjam.");</script>';
                    } else {
                        echo '<script>alert("Buku Gagal Dipinjam.");</script>';
                    }
                }
            ?>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Buku</h4></div>
                <div class="col-md-8">

                    <select class="form-control" name="id_buku">
                    <?php
                        $buk = mysqli_query($kon, "SELECT*FROM buku where id_buku=$id");
                        while($buku = mysqli_fetch_array($buk)) {
                            ?>
                            <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul'];?></option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Tanggal Peminjaman</h4></div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_peminjaman" required autofocus>
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Tanggal Pengembalian</h4></div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_pengembalian"  autofocus>
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Status Peminjaman</h4></div>
                <div class="col-md-8">
                    <select name="status" class="form-control" required autofocus>
                        <option value="dipinjam">Dipinjam</option>
                        <?php
                            if($_SESSION['user']['level'] !='peminjam'){
                        ?>
                        <option value="dikembalikan">Dikembalikan</option>
                         <?php
                         }
                         ?>
                    </select>
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Jumlah Yang Dipinjam</h4></div>
                <div class="col-md-8">
                    <input type="number" class="form-control" name="jumlah" min="1" max="2" required autofocus>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Pinjam Buku</button>
                    <button class="btn btn-secondary"  type="reset">Reset</button>
                    <a href="?page=daftar_buku" class="btn btn-danger">Kembali Ke Menu Daftar Buku</a>
                </div>
            </div>
         </form>
    </div>
</div>
    </div>
</div>