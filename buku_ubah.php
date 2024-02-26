<h1><div class="sidebar-brand-text">Ubah Detail Buku<sup></sup></div></h1>
<!-- DataTales Example -->
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
         <form method="post">
            <?php
            $id=$_GET['id'];
                if(isset($_POST['submit'])) {
                    $id_kategori = $_POST['id_kategori'];
                    $judul = $_POST['judul'];
                    $gambar = $_POST['gambar'];
                    $penulis = $_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $deskripsi = $_POST['deskripsi'];
                    $stok = $_POST['stok'];
                    $query = mysqli_query($kon, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', gambar='$gambar', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' , stok='$stok' WHERE id_buku=$id");

                    if($query) {
                        echo '<script>alert("Data Buku Berhasil Diubah.");</script>';
                    } else {
                        echo '<script>alert("Data Buku Gagal Diubah.");</script>';
                    }
                }
                $query = mysqli_query($kon, "SELECT*FROM buku where id_buku=$id");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Kategori</h4></div>
                <div class="col-md-8">

                    <select class="form-control" name="id_kategori">
                    <?php
                        $kat = mysqli_query($kon, "SELECT*FROM kategori");
                        while($kategori = mysqli_fetch_array($kat)) {
                            ?>
                            <option <?php if($kategori['id_kategori'] == $data['id_kategori']) echo 'selected'; ?> value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori'];?></option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Judul</h4></div>
                <div class="col-md-8"><input type="text" class="form-control" name="judul" autofocus="" required="" value="<?php echo $data['judul']; ?>"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Gambar</h4></div>
                <div class="col-md-8"><input type="file" class="form-control" name="gambar" autofocus="" required="" value="<?php echo $data['gambar']; ?>"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Penulis</h4></div>
                <div class="col-md-8"><input type="text" class="form-control" name="penulis" autofocus="" required="" value="<?php echo $data['penulis']; ?>"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Penerbit</h4></div>
                <div class="col-md-8"><input type="text" class="form-control" name="penerbit" autofocus="" required="" value="<?php echo $data['penerbit']; ?>"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Tahun Terbit</h4></div>
                <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" autofocus="" required="" value="<?php echo $data['tahun_terbit']; ?>"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Deskripsi</h4></div>
                <div class="col-md-8">
                    <textarea name="deskripsi" class="form-control" rows="5" required="" autofocus=""><?php echo $data['deskripsi']; ?>
                    </textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Stok Buku</h4></div>
                <div class="col-md-8"><input type="number" class="form-control" name="stok" autofocus="" required="" value="<?php echo $data['stok']; ?>"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Simpan Perubahan</button>
                    <button class="btn btn-secondary"  type="reset">Reset Perubahan</button>
                    <a href="?page=buku" class="btn btn-danger">Kembali Ke Menu Buku</a>
                </div>
            </div>
         </form>
    </div>
</div>
    </div>
</div>