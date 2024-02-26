                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1><div class="sidebar-brand-text mx-3">Dashboard<sup></sup></div></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php
                            if($_SESSION['user']['level'] !=='peminjam'){
                        ?>

                            <!-- User (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <a href="?page=user">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    User</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                    echo mysqli_num_rows(mysqli_query($kon,"SELECT*FROM user"))
                                                ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Buku (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                            <a href="?page=buku">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Buku</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                    echo mysqli_num_rows(mysqli_query($kon,"SELECT*FROM buku"))
                                                ?></div>
                                            </div>
                                            <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <?php
                            }else{
                                ?>

                            <!-- Kategori Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                            <a href="?page=kategori">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kategori
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                                                    echo mysqli_num_rows(mysqli_query($kon,"SELECT*FROM kategori"))
                                                ?></div>
                                                    </div>
                                                    <!--<div class="col">
                                                        <div class="progress progress-sm mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-table fa-2x text-gray-300"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ulasan Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                            <a href="?page=ulasan">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Ulasan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                    echo mysqli_num_rows(mysqli_query($kon,"SELECT*FROM ulasan"))
                                                ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <?php
                        }
                        ?>
                    </div>
                    
                    <?php
                    if($_SESSION['user']['level'] !=='peminjam'){
                        ?>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-14" style="margin-left:2rem">
                        <div class="card">
                            <div class="card-body col-md-12">
                            <h1 class="mt-4">Laporan Peminjaman Buku</h1>
                                <div class="row">
                                <div class="col-md-12">
                                    <a href="cetak1.php" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</a>
                                    <table class="table " id="dataTable" width="100%" collspacing="0" style="margin-top: 1rem">
                                        <tr>
                                            <th>NO</th>
                                            <th>User</th>
                                            <th>Buku</th>
                                            <th>Foto</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status Peminjaman</th>
                                            <th>Jumlah</th>
                                        </tr>
                                        <?php 
                                        $i = 1;
                                            $query = mysqli_query($kon, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
                                            while($data = mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['judul']; ?></td>
                                                    <td><img width="60px" src="img/<?php echo $data['gambar']; ?>"></td>
                                                    <td><?php echo $data['tanggal_peminjaman']; ?></td>
                                                    <td><?php echo $data['tanggal_pengembalian']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <td><?php echo $data['jumlah']; ?></td>
                                                    <?php 
                                                            if($data['status'] != 'dikembalikan'){
                                                        ?>
                                                    <td>
                                                        
                                                        
                                                    </td>
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
                    </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                   
                        
