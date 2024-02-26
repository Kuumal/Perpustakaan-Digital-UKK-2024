<?php
session_start();
session_destroy();
echo '<script>alert("Anda Telah Logout."); location.href="login.php";</script>';
?>