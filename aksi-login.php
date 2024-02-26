<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $data = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");
        $cek = mysqli_num_rows($data);
        if($cek > 0){
            $_SESSION['user'] = mysqli_fetch_array($data);
            echo '<script>alert("Selamat Datang Di Perpustakaan Digital, Login Anda Berhasil"); location.href="index.php";</script>';
        }else if{
            echo '<script>alert("Username atau Password Anda Salah")</script>';
        }           
    }
?>