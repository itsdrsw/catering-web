<?php
    include "koneksi.php";
    $id     = $_GET['id'];
    $query    = "DELETE FROM kue WHERE id_kue = '$id'";
    $result      = mysqli_query($conn,$query);
    echo "<script>alert('Data berhasil dihapus');location='.?hal=kuekering'</script>";
?>