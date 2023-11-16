<div class="col-lg-12">
    <center>
        <h2>Pengembalian Inventaris</h2>
    </center>
    <hr>
    <div class="panel panel-primary">
        <div class="panel-heading">Daftar Barang Yang Dipinjam</div>
        <div class="panel-body">
            <table class="table table-bordered table striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pinjam</th>
                        <th>Nama Peminjam</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $hari= date('d-m-Y');
                    $d_peminjaman = "SELECT *, detail_pinjam.jumlah as jml FROM
                    detail_pinjam left join peminjaman on peminjaman.id_peminjaman = detail_pinjam.id_peminjaman left join inventaris on inventaris.id_inventaris = detail_pinjam.id_inventaris left join pegawai on pegawai.id_pegawai = peminjaman.id_pegawai WHERE peminjaman.status_peminjaman = '1'";
                    $d_query = mysqli_query($koneksi, $d_peminjaman);
                    $cek = mysqli_num_rows($d_query); 
                    if($cek > 0){

                    $no = 1;
                    while($data_d = mysqli_fetch_array($d_query)){
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data_d['id_peminjaman']?></td>
                        <td><?= $hari ?></td>
                        <td><?= $data_d['nama_pegawai']?></td>
                        <td><?= $data_d['nama']?></td>
                        <td><?= $data_d['jml']?></td>
                        <td><?= $data_d['tanggal_kembali']?></td>
                        <td>
                    <?php
                    if($data_d['status_peminjaman'] == '0') {
                        echo "<label class='label label-danger'>Konfirmasi</label>";
                   
                    }else

                    if($data_d['status_peminjaman'] == '1') {
                    echo "<label class='label label-warning'>Dipinjam</label>";
                    }else{
                        echo "<label class='label label-success'>Dikembalikan</label>";
                    }
                        ?>
                    </td>
                    <td>
                    <a href="?p=detail_pengembalian&id_peminjaman=<?= $data_d['id_peminjaman']?>" class="btn btn-sm btn-primary">Proses</a>
                    </td>
                    </tr>
                <?php
                }
                }else{
                ?>
                <tr>
                    <td colspan="9">Tidak Ada Data</td>
                </tr>
                <?php
                }
                ?>


                    <!-- <tr>
                        <td>1</td>
                        <td>10-10-2022</td>
                        <td>Adika</td>
                        <td>Laptop</td>
                        <td>10</td>
                        <td>00-00-0000</td>
                        <td>
                            <label for="" class="label label-warning">Dipinjam</label>
                        </td>
                        <td>
                            <a href="?p=detail_pengembalian" class="btn btn-sm btn-primary">Konfirmasi</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>