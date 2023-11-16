<?php
    $id_inventaris = $_GET['id_inventaris'];
    if(empty($id_inventaris)) {
        ?>
            <script>
                window.location.href="?p=list_barang";
            </script>
        <?php
    }
        $sql = "SELECT *, inventaris.keterangan as ket FROM inventaris LEFT JOIN ruang ON ruang.id_ruang = inventaris.id_ruang LEFT JOIN jenis ON jenis.id_jenis = inventaris.id_jenis WHERE id_inventaris = '$id_inventaris'";
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
        <div class="panel-heading">Edit Barang Inventaris</div>
            <div class="panel-body">
            
                        <form action="" method="POST" >
                        <div class="form-group">
                            <label for="">Kode Barang</label>
                            <input type="text" name="kode_inventaris" value="<?= $data['kode_inventaris'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kondisi</label>
                            <select name="kondisi" id="" class="form-control">
                                <option value="<?= $data['kondisi'] ?>" name="kondisi" class="form-control"><?= $data['kondisi'] ?></option>
                                <option value="" name="" class="form-control">Baik</option>
                                <option value="" name="" class="form-control">Rusak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Inventaris</label>
                            <select name="id_jenis" id="" class="form-control">
                                <option value="<?= $data['id_jenis']?>" class="form-control"><?= $data['nama_jenis']?></option>
                                <?php
                                    $sql_jenis = "SELECT * FROM jenis";
                                    $q_jenis = mysqli_query($koneksi, $sql_jenis);
                                    while($jenis = mysqli_fetch_array($q_jenis)){
                                        ?>
                                            <option value="<?= $jenis['id_jenis']?>"><?= $jenis['nama_jenis'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ruang</label>
                            <select name="id_ruang" id="" class="form-control">
                                <option value="<?= $data['id_ruang'] ?>" class="form-control"><?= $data['nama_ruang'] ?></option>
                                <?php
                                    $sql_ruang = "SELECT * FROM ruang";
                                    $q_ruang = mysqli_query($koneksi, $sql_ruang);
                                    while($ruang = mysqli_fetch_array($q_ruang)) {
                                        ?>
                                            <option value="<?= $ruang['id_ruang'] ?>"><?= $ruang['nama_ruang'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea name="ket" id="" cols="20" rows="5" class="form-control" value="<?= $data['ket'] ?>" ><?= $data['ket'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-md btn-primary" name="simpan" type="submit" >Simpan</button>
                            <a href="?p=list_barang" class="btn btn-md btn-default">Kembali</a>
                        </div>
                    </form>

                        <?php
                            if(isset($_POST['simpan'])) {
                                $kode_inventaris = $_POST['kode_inventaris'];
                                $nama = $_POST['nama'];
                                $kondisi = $_POST['kondisi'];
                                $jumlah = $_POST['jumlah'];
                                $id_jenis = $_POST['id_jenis'];
                                $id_ruang = $_POST['id_ruang'];
                                $ket = $_POST['ket'];

                                $sql_update = "UPDATE inventaris SET
                                kode_inventaris='$kode_inventaris', 
                                nama='$nama', 
                                kondisi='$kondisi', 
                                jumlah='$jumlah', 
                                id_jenis='$id_jenis', 
                                id_ruang='$id_ruang', 
                                keterangan='$ket' WHERE id_inventaris = '$id_inventaris'";

                                $q_update = mysqli_query($koneksi, $sql_update);
                                if($q_update) {
                                    ?>
                                        <script>
                                            window.location.href="?p=list_barang"
                                        </script>
                                    <?php
                                }else{
                                    ?>
                                        <div class="alert alert-danger">
                                            inventaris gagal diupdate
                                        </div>
                                    <?php
                                }
                            }
                        ?>


                </div>
            </div>
        
    </div>
    
</div>