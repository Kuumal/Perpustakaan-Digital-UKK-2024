<h1><div class="sidebar-brand-text">Ubah Kategori Buku<sup></sup></div></h1>
<!-- DataTales Example -->
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
         <form method="post">
            <?php
                $id = $_GET['id'];
                if(isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $query = mysqli_query($kon, "UPDATE kategori set kategori='$kategori' where id_kategori=$id");

                    if($query) {
                        echo '<script>alert("Ubah Nama Kategori Berhasil.");</script>';
                    } else {
                        echo '<script>alert("Ubah Nama Kategori Gagal.");</script>';
                    }
                }
                $query = mysqli_query($kon, "SELECT*FROM kategori where id_kategori=$id");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Nama Kategori</h4></div>
                <div class="col-md-8"><input type="text" class="form-control" name="kategori" value="<?php echo $data['kategori'];?>" autofocus="" required=""></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Ubah Kategori</button>
                    <button class="btn btn-secondary"  type="reset">Reset</button>
                    <a href="?page=kategori" class="btn btn-danger">Kembali Ke Menu Kategori</a>
                </div>
            </div>
         </form>
    </div>
</div>
    </div>
</div>