<div class="card">
    <div class="card-body">
        <h1><div class="sidebar-brand-text">Pengguna Yang Terdaftar<sup></sup></div></h1>
    <!-- DataTales Example -->
    <div class="row" style="margin-top: 1rem;">
        <div class="col-md-12">
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Level</th>
                </tr>
                <?php
                    $i = 1;
                    $query = mysqli_query($kon, "SELECT*FROM user");
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <th><?php echo $i++; ?></th>
                    <th><?php echo $data['nama']; ?></th>
                    <th><?php echo $data['username']; ?></th>
                    <th><?php echo $data['password']?></th>
                    <th><?php echo $data['email']; ?></th>
                    <th><?php echo $data['alamat']; ?></th>
                    <th><?php echo $data['no_telepon']; ?></th>
                    <th><?php echo $data['level']; ?></th>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
</div>
    </div>
</div>