<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Tambah Pegawai</div> 
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Nama Pegawai</label>
                        <input type="text" class="form-control" name="nama_pegawai" placeholder="Masukkan Nama Pegawai">
                    </div>
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input type="number" class="form-control" name="nip" placeholder="Masukkan NIP Pegawai">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-md btn-primary" name="simpan">Simpan</button>
                        <a href="?p=pegawai" class="btn btn-md btn-default">Kembali</a>
                    </div>
                </form>
                        <?php
                        if (isset($_POST['simpan'])) {
                        $nama = $_POST['nama_pegawai'];
                        $nip = $_POST['nip'];
                        $alamat = $_POST['alamat'];

                        $sql = "INSERT INTO pegawai SET
                                nama_pegawai='$nama',
                                nip='$nip',
                                alamat='$alamat '";
                        
                        $query = mysqli_query($koneksi, $sql); 
                            if ($query) {
                        ?>
                            <div class="alert alert-success">Pegawai Berhasil ditambahkan</div>
                        <?php
                        } else {
                        ?>
                            <div class="alert alert-danger">Pegawai Gagal ditambahkan</div>
                        <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>