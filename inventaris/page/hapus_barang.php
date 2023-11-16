<?php
    include "../config/koneksi.php";

    $id_inventaris = $_GET['id_inventaris'];

    $sql = "DELETE FROM inventaris WHERE id_inventaris = '$id_inventaris'";
    $query = mysqli_query($koneksi, $sql);

    if($query) {
        ?>
            <script>
                window.location.href="../index.php?p=list_barang";
            </script>
        <?php
    }else{
        ?>
            <script>
                alert('Terjadi Kesalahan');
                window.Location.href="../index.php?p=list_barang";
            </script>
        <?php
    }
?>