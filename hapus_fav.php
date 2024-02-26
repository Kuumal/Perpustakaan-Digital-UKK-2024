<?php
$id = $_GET['id'];

function hapus($id){
    global $kon;
    mysqli_query($kon, "DELETE FROM koleksipribadi WHERE koleksi_id=$id");
    return mysqli_affected_rows($kon);
}
if (hapus($id)>0){
    echo "<script>
            alert('Hapus favorit berhasil');
            location.href = 'index.php?page=favorit';
          </script>";
}
 
?>