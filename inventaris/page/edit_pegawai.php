<?php
    $id_pegawai = $_GET['id_pegawai'];
    if(empty($id_pegawai)) {
        ?>
            <script>
                window.location.href="?p=pegawai";
            </script>
        <?php
    }
        $sql = "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'";
        $query = mysqli_query($koneksi, $sql);
        $cek = mysqli_num_rows($query);

        if($cek > 0) {
            $data = mysqli_fetch_array($query);
        } else {
            $data = NULL;
        }
   
?>

<div class="row">
    <h2>Edit Barang</h2>
    <hr>
    <div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Barang pegawai</div>
            <div class="panel-body">
           
                        <form action="" method="POST" >
                        <div class="form-group">
                            <label for="">Kode Barang</label>
                            <input type="text" name="nama_pegawai" value="<?= $data['nama_pegawai'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">nip Barang</label>
                            <input type="text" name="nip" value="<?= $data['nip'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">alamat</label>
                            <textarea name="alamat" id="" cols="20" rows="5" class="form-control" value="<?= $data['alamat'] ?>" ><?= $data['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-md btn-primary" name="simpan" type="submit" >Simpan</button>
                            <a href="?p=pegawai" class="btn btn-md btn-default">Kembali</a>
                        </div>
                    </form>

                        <?php
                            if(isset($_POST['simpan'])) {
                                $nama_pegawai = $_POST['nama_pegawai'];
                                $nip = $_POST['nip'];
                                $alamat = $_POST['alamat'];

                                $sql_update = "UPDATE pegawai SET
                                nama_pegawai='$nama_pegawai',
                                nip='$nip',  
                                alamat='$alamat' WHERE id_pegawai = '$id_pegawai'";

                                $q_update = mysqli_query($koneksi, $sql_update);
                                if($q_update) {
                                    ?>
                                        <script>
                                            window.location.href="?p=pegawai"
                                        </script>
                                    <?php
                                }else{
                                    ?>
                                        <div class="alert alert-danger">
                                            pegawai gagal diupdate
                                        </div>
                                    <?php
                                }
                            }
                        ?>


                </div>
            </div>
       
    </div>
   
</div>