<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perpustakaan Digital Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" align="center" style="margin-top: 5rem;"><img src="img/buku.png" width='65%'></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                            </div>
                            <?php
                            if(isset($_POST['register'])) {
                                $username = $_POST['username'];
                                $password = md5($_POST['password']);
                                $nama = $_POST['nama'];
                                $email = $_POST['email'];
                                $no_telepon = $_POST['no_telepon'];
                                $alamat = $_POST['alamat'];
                                $level = $_POST['level'];

                                $insert = mysqli_query($kon,"INSERT INTO user (username,password,nama,email,no_telepon,alamat,level) VALUES ('$username','$password','$nama','$email','$no_telepon','$alamat','$level')");
                            
                                if($insert){
                                    echo '<script>alert("Selamat Pendaftaran Akun Berhasil ,Silahkan Login"); location.href="login.php";</script>';
                                }else{
                                    echo '<script>alert("Mohon Maaf Pendaftaran Gagal,Silahkan Coba Lagi");</script>';
                                  }           
                                }
                            ?>
                            <form class="user" method="post">
                            <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nama" required autofocus
                                        placeholder="Masukan Nama Lengkap"/>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"  name="username" required autofocus
                                            placeholder="Masukan Username" />
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password" required autofocus
                                            placeholder="Masukan Password"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-user" name="email" required autofocus
                                            placeholder="Masukan Alamat Email"/>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="no_telepon" required autofocus
                                            placeholder="Masukan No.Telepon"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="alamat" required autofocus
                                        placeholder="Masukan Alamat"/>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                    <select name="level" class="form-control form-select" required autofocus>
                                        <option>Peminjam</option>
                                    </select>
                                    </div>
                                </div>
                                <button a class="btn btn-primary btn-user btn-block" name="register" type="submit" value="register">
                                    Daftarkan Akun
                            </button>
                                <hr>
                            </form>                        
                            <div class="text-center">
                                <a class="small" href="login.php">Sudah Memiliki Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>