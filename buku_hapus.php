<?php
    $id = $_GET['id'];
    $query = mysqli_query($kon, "DELETE FROM buku where id_buku=$id");

?>
<script>
    alert('Buku Telah Dihapus.');
    location.href = "index.php?page=buku";
</script>