<h3>Dashboard Member</h3>
<hr>

<div class="card shadow">
  <div class="card-body">
    <div class="row mt-3">
      <div class="col-lg-12">
        <h5 class="mb-0">Selamat datang, <?= $data['nama'] ?>!</h5>
        <p class="mt-4"></p>
        <h3 class="mt-3">Daftar Peminjaman</h3>
        <?php if (Flasher::check()) : ?>
          <?php $flash = Flasher::flash() ?>
          <div class="alert alert-<?= $flash['tipe'] ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <?= $flash['pesan'] ?>
          </div>
        <?php endif; ?>
        <p>Jangan lupa untuk mengembalikan barang pinjaman ya!</p>
        <table id="tbl-daftar-pinjaman" class="table">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Tanggal Transaksi</th>
              <th>Lama Pinjam</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($data['pinjaman'] as $p) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= date('d M Y', strtotime($p['tanggal_transaksi'])) ?></td>
                <td><?= $p['lama_pinjam'] ?> Hari</td>
                <?php if ($p['status_pinjam'] == "Sedang Diproses") : ?>
                  <td class="text-warning">Pinjaman Diproses</td>
                <?php elseif ($p['status_pinjam'] == "Ditolak") : ?>
                  <td class="text-danger">Pinjaman Ditolak</td>
                <?php else : ?>
                  <td class="text-success">Pinjaman Diterima</td>
                <?php endif ?>
                <td><a href="<?= BASEURL ?>/member/lihat_pinjaman/<?= $p['id_pinjaman'] ?>" class="btn btn-info" title="Check Detail Data" style="color:white;">Detail</a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- modal detail -->
<?php $i = 1;
foreach ($data['pinjaman'] as $p) : ?>
  <div class="modal fade" id="modaldetail<?= $p['id_pinjaman'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Pinjaman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Tipe Barang</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>