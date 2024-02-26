<?php
    $id = $_GET['id'];
    $query = mysqli_query($kon, "DELETE FROM kategori where id_kategori=$id");

?>
<script>
    alert('Hapus Kategori Buku Berhasil.');
    location.href = "index.php?page=kategori";
</script>