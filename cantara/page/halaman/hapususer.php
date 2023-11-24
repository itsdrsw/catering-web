<?php
include "koneksi.php";
$id     = $_GET['id'];
if ($id == 1) {
    echo "<script>alert('Data ini tidak bisa dihapus');location='.?hal=datauser'</script>";
}else{
    $query    = "DELETE FROM user WHERE id_user = '$id'";
    $result      = mysqli_query($conn, $query);
    echo "<script>alert('Data berhasil dihapus');location='.?hal=datauser'</script>";
}
