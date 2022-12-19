<h3 class="mb-3 text-center">Approval Peminjaman</h3>
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
<div class="card shadow">
  <div class="card-body">
    <table id="tbl-daftar-pinjaman" class="table mt-3 dt-responsive nowrap" style="width:100%">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Tanggal Transaksi</th>
          <th>Nama Member</th>
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
            <td><?= $p['nama'] ?></td>
            <td><?= $p['lama_pinjam'] ?> Hari</td>
              <td class="text-warning">Pinjaman Diproses</td>
              <td><a href="<?= BASEURL ?>/admin/lihat_pinjaman/<?= $p['id_pinjaman'] ?>" class="btn btn-info" title="Lihat Detail Data" style="color:white;">Detail</a>
                <a href="<?= BASEURL ?>/admin/setuju/<?= $p['id_pinjaman'] ?>" class="btn btn-success" title="Setujui" style="color:white;">Terima</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#masukan_alasan<?= $p['id_pinjaman'] ?>" title="Ditolak">Tolak</button>
              </td>
        
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

  <!-- Modal -->
  <?php $i = 1;
  foreach ($data['pinjaman'] as $p) : ?>
    <div class="modal fade" id="masukan_alasan<?= $p['id_pinjaman'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-m">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Masukan Alasan Ditolak</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= BASEURL ?>/admin/ditolak" method="post">
            <div class="modal-body">

              <table class="table">
                <thead class="thead-light">
                <tbody>
                  <tr>
                    <th>Masukan Alasan</th>
                    <input type="hidden" name="id_pinjaman" value="<?= $p['id_pinjaman'] ?>">
                  </tr>
                  <tr>
                    <td><textarea class="form-control" name="catatan_ditolak"></textarea></td>
                  </tr>
                </tbody>
                </thead>
              </table>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>