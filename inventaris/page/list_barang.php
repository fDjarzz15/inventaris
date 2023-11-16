<h2><center>DAFTAR INVENTARIS</center></h2>
<hr>
<a href="?p=tambah_barang" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus"> Tambah Barang</span></a>
<form class="navbar-form navbar-right" role="search" method="get" >
    <div class="form-group">
      <input type="hidden" name="p" value="list_barang" >
        <input type="text" class="form-control" placeholder="Cari Barang" name="cari" >
    </div>
    <button class="btn btn-default" type="sumbit">Cari</button>
</form>
<br><br>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Inventaris</th>
            <th>Nama Barang</th>
            <th>Kodisi</th>
            <th>Jumlah</th>
            <th>Ruang</th>
            <th>Tanggal Register</th>
            <th>Keterangan</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
      <?php
        @$cari = $_GET['cari'];
        $q_cari = "";
        if(!empty($cari)){
          $q_cari = "and nama like '%".$cari."%'";
        }
        $pembagian = 5;
        $page = isset($_GET['halaman']) ? (INT)$_GET['halaman'] : 1;
        $mulai = $page > 1 ? $page * $pembagian - $pembagian : 0;

        $sql = "SELECT *, inventaris.keterangan as ket FROM inventaris LEFT JOIN ruang ON ruang.id_ruang = inventaris.id_ruang WHERE 1=1 $q_cari LIMIT $mulai, $pembagian";
        $query = mysqli_query($koneksi, $sql);
        $cek = mysqli_num_rows($query);

        $sql_total = "SELECT * FROM inventaris";
        $s_total = mysqli_query($koneksi, $sql_total);
        $total = mysqli_num_rows($s_total);

        $jumlahHalaman = ceil($total / $pembagian);

        if ($cek > 0) {
          $no = $mulai + 1;
          while ($data = mysqli_fetch_array($query)) {
            $tgl = $data['tanggal_register'];
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['kode_inventaris'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['kondisi'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['nama_ruang'] ?></td>
                <td><?= date ("d-m-Y", strtotime($tgl)) ?></td>
                <td><?= $data['ket'] ?></td>
                <td>
                  <a href="?p=edit_barang&id_inventaris=<?= $data['id_inventaris'] ?>" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                  <a onclick="return confirm('Apakah Anda Yakin untuk Menghapusnya?')" href="page/hapus_barang.php?id_inventaris=<?= $data['id_inventaris'] ?>" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>
            <?php
          }
        }
        
      ?>
        <!-- <tr>
            <td>1</td>
            <td>L001</td>
            <td>laptop</td>
            <td>baik</td>
            <td>50</td>
            <td>LAB RPL</td>
            <td>19-11-2022</td>
            <td>Barang baik</td>
            <td>
                <a href="?p=edit_barang" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr> -->
    </tbody>
</table>

<div class="float-left">
    Jumlah : <?= $total ?>
</div>

<div class="" style="float:right">
<nav>
  <ul class="pagination">
    <li>
      <a href="?p=list_barang&halaman=<?= $page - 1 ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
        <?php
          for ($i = 1; $i <= $jumlahHalaman; $i++) {
            ?>
              <li class="<? ($i == $_GET['halaman'] ? 'active' : '') ?>" >
                <a href="?p=list_barang&halaman=<?= $i ?>"><?= $i ?></a>
              </li>
            <?php
          }
        ?>
    <li>
      <a href="?p=list_barang&halaman=<?= $page + 1 ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>

