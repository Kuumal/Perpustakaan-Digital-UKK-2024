<h1><div class="sidebar-brand-text">Ulasan Buku<sup></sup></div></h1>
<!-- DataTales Example -->
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
         <form method="post">
            <?php
                if(isset($_POST['submit'])) {
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $ulasan = $_POST['ulasan'];
                    $rating = $_POST['rating'];

                    $query = mysqli_query($kon, "INSERT INTO ulasan(id_buku,id_user,ulasan,rating) VALUES('$id_buku','$id_user','$ulasan','$rating')");

                    if($query) {
                        echo '<script>alert("Tambah Data Berhasil.");</script>';
                    } else {
                        echo '<script>alert("Tambah Data Gagal.");</script>';
                    }
                }
            ?>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text"><h4>Buku</h4></div>
                <div class="col-md-8">

                    <select class="form-control" name="id_buku">
                    <?php
                        $buk = mysqli_query($kon, "SELECT*FROM buku");
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
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Ulasan</h4></div>
                <div class="col-md-8">
                    <textarea name="ulasan" class="form-control" rows="5" required="" autofocus="">
                    </textarea>
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2 sidebar-brand-text col-md-2"><h4>Rating</h4></div>
                <div class="col-md-8">
                    <select name="rating" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Simpan</button>
                    <button class="btn btn-secondary"  type="reset">Reset</button>
                    <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
                </div>
            </div>
         </form>
    </div>
</div>
    </div>
</div>