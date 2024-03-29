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

    <title>Login Ke Perpustakaan Digital</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0" >
                        <?php
                            if(isset($_POST['login'])){
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);

                            $data = mysqli_query($kon,"SELECT*FROM user where username='$username' and password='$password'");
                            $cek = mysqli_num_rows($data);
                            if($cek > 0){
                                $_SESSION['user'] = mysqli_fetch_array($data);
                                echo '<script>alert("Selamat Datang Di Perpustakaan Digital, Login Anda Berhasil"); location.href="index.php";</script>';
                            }else{
                                echo '<script>alert("Username atau Password Anda Salah")</script>';
                            }           
                        }
                        ?>
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" align="center" style="margin-top: 2rem;"><img src="img/buku.png"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang !!!</h1>
                                        <hr>
                                        <h1 class="h5 text-gray-900 mb-4">Silahkan Login Perpustakaan Digital</h1>
                                    </div>
                                    <form  method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" autofocus="" required=""
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Your Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" autofocus="" required=""
                                                placeholder="Enter Your Password...">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="login" value="login"> 
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php" >Belum Memiliki Akun?</a>
                                    </div>
                                </div>
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