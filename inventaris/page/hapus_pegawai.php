<?php
include "../config/koneksi.php";

$id_pegawai = $_GET['id_pegawai'];
$sql = "DELETE FROM pegawai WHERE id_pegawai ='$id_pegawai'";
$query = mysqli_query($koneksi, $sql); 
if ($query) {
?>
<script>
    window.location.href="../index.php?p=pegawai";
</script>
<?php
} else {
?>
<script type="text/javascript">
alert('Terjadi Kesalahan');
window.location.href="../index.php?p=pegawai";
</script>
<?php
}
?>