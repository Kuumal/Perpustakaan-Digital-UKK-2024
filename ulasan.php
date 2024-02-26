<div class="card">
    <div class="card-body">
    <!-- DataTales Example -->
    <div class="row">
        <h1><div class="sidebar-brand-text" style="margin-top: 1rem; margin-left: 3rem;">Ulasan Buku<sup></sup></div></h1>
        <div class="col-md-12">
            <br>
                <?php
                    $i = 1;
                    $query = mysqli_query($kon, "SELECT*FROM ulasan LEFT JOIN user on user.id_user = ulasan.id_user LEFT JOIN buku on buku.id_buku = ulasan.id_buku");
                    while($data = mysqli_fetch_array($query)){
                ?>
            <table class="table" id="dataTable" width="100%" cellspacing="0" style="">
                <tr>
                    <th width="1%">User</th>
                    <th width="1%" colspan="2">:</th>
                    <th width="10%"><?php echo $data['nama']; ?></th>
                    <th width="1%" >Buku</th>
                    <th width="1%" colspan="2">:</th>
                    <th width="10%"><?php echo $data['judul']; ?></th>
                    <th width="1%">Rating</th>
                    <th width="1%" colspan="2">:</th>
                    <th width="10%"><?php echo $data['rating']; ?></th>
                </tr>
                <tr>
                    <th>Ulasan</th>
                    <th colspan="11"><?php echo $data['ulasan']; ?></th>
                </tr>
                </tr>
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
        
        <div class="card-body">
        <div class="col-md-12">
        <?php
                    if($_SESSION['user']['level'] =='peminjam'){
                        ?>
         <form method="post">
            <?php
                if(isset($_POST['submit'])) {
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $ulasan = $_POST['ulasan'];
                    $rating = $_POST['rating'];

                    $query = mysqli_query($kon, "INSERT INTO ulasan(id_buku,id_user,ulasan,rating) VALUES('$id_buku','$id_user','$ulasan','$rating')");

                    if($query) {
                        echo '<script>alert("Tambah Data Berhasil."); location.href=index.php?page=ulasan</script>';
                    } else {
                        echo '<script>alert("Tambah Data Gagal.");</script>';
                    }
                }
            ?>
            <div class="row mb-3">
                <div class="col-md-1 sidebar-brand-text col-md-2"><h4>Buku</h4></div>
                <div class="col-md-10">

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
                <div class="col-md-1 sidebar-brand-text col-md-2"><h4>Ulasan</h4></div>
                <div class="col-md-10">
                    <textarea name="ulasan" class="form-control" rows="5" required="" autofocus="">
                    </textarea>
                    </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-1 sidebar-brand-text col-md-2"><h4>Rating</h4></div>
                <div class="col-md-10">
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
            <div class="row mb-3">
                <div class="col-md-1 margin-top:"></div>
                <div class="col-md-10 " style="margin-left: 5rem"><?php
                    if($_SESSION['user']['level'] =='peminjam'){
                 ?>
                    <button class="btn btn-primary col-md-3" name="submit" value="submit" type="submit">Simpan</button>
                    <button class="btn btn-secondary col-md-3"  type="reset">Reset</button>
                    <?php
                    }
                    ?></div>
            </div>
         </form>
         <?php
                    }
                    ?>
        </div>
    </div>
</div>
