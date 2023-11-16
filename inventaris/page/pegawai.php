<h2><center>Daftar Pegawai</center></h2>
<hr>
<a href="?p=tambah_pegawai" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
<form class="navbar-form navbar-right" role="search" method="get">
    <div class="form-group">
      <input type="hidden" name="p" value="pegawai">
        <input type="text" class="form-control" placeholder="Cari Pegawai" name="cari">
    </div>
    <button type="submit" class="btn btn-default">Cari</button>
</form>
<br><br>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>NIP/NIK</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      @$cari = $_GET['cari'];
      $q_cari = "";
      if(!empty($cari)){
        $q_cari .= "and nama_pegawai like '%".$cari."%'";
      }
      $pembagian = 5;
      $page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
      $mulai = $page > 1 ? $page * $pembagian - $pembagian : 0;

        $sql = "SELECT * FROM pegawai where 1=1 $q_cari LIMIT $mulai, $pembagian";
        $query = mysqli_query($koneksi, $sql);
        $cek = mysqli_num_rows($query);
        // echo $cek;

        // mencari total halaman
        $sql_total ="SELECT * FROM pegawai";
        $q_total = mysqli_query($koneksi, $sql_total);
        $total = mysqli_num_rows($q_total);

        $jumlahHalaman = ceil($total / $pembagian);

        if($cek > 0){
          $no = $mulai + 1;
          while($data = mysqli_fetch_array($query)){
            // $tgl = $data['tanggal_register'];
          ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data['nama_pegawai']?></td>
              <td><?= $data['nip']?></td>
              <td><?= $data['alamat']?></td>
              <td>
                <a href="?p=edit_pegawai&id_pegawai=<?= $data['id_pegawai']?>" class="btn btn-md btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                <a onclick="return confirm('Apakah anda yakin untuk menghapusnya?')" href="page/hapus_pegawai.php?id_pegawai=<?= $data['id_pegawai']?>" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
            </tr>
          <?php
          }
        }
      ?>
        <!-- <tr>
            <td>1</td>
            <td>L001</td>
            <td>Laptop</td>
            <td>Baik</td>
            <td>50</td>
            <td>LAB RPL</td>
            <td>19-11-2021</td>
            <td>Barang di dapat dari bantuan provinsi</td>
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
<div class="" style="float: right;">
<nav>
  <ul class="pagination">
    <li>
      <a href="?p=list_barang&halaman=<?= $page - 1?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
      for ($i = 1; $i <=$jumlahHalaman; $i++){
        ?>
          <li class="<? ($i == $_GET['halaman'] ? 'active' : '')?>">
            <a href="?p=list_barang&halaman=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php
      }
    ?>
    <!-- <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li> -->
    <li>
      <a href="?p=list_barang&halaman=<?= $page + 1 ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>