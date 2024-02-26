<h1><div class="sidebar-brand-text">Tambah Kategori Buku<sup></sup></div></h1>
<!-- DataTales Example -->
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
         <form method="post">
            <?php
                if(isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $query = mysqli_query($kon, "INSERT INTO kategori(kategori) VALUES('$kategori')");

                    if($query) {
                        echo '<script>alert("Kategori Buku Berhasil Ditambahkan.");</script>';
                    } else {
                        echo '<script>alert("Kategori Buku Gagal Ditambahkan.");</script>';
                    }
                }
            ?>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Nama Kategori</h4></div>
                <div class="col-md-8"><input type="text" class="form-control" name="kategori" autofocus="" required=""></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Simpan Kategori Buku</button>
                    <button class="btn btn-secondary"  type="reset">Reset</button>
                    <a href="?page=kategori" class="btn btn-danger">Kembali Ke Menu Kategori</a>
                </div>
            </div>
         </form>
    </div>
</div>
    </div>
</div>