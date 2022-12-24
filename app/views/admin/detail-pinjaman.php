<h3 class="mb-3">Detail Peminjaman</h3>

<div class="row">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                <?php
                foreach ($data['daftar_pinjaman'] as $p) : ?>
                    <h4 class="card-title">Tanggal Transaksi : <?= date('d M Y', strtotime($p['tanggal_transaksi'])) ?></h4>
                    <h5 class="card-subtitle mb-2">Lama Pinjam : <?= $p['lama_pinjam'] ?></h5>
                    <h5 class="card-subtitle mb-2">Status Terbaru : <?php if ($p['status_pinjam'] == "Sedang Diproses") : ?>
                            <label class="text-warning">Pinjaman Diproses</label>
                        <?php elseif ($p['status_pinjam'] == "Ditolak") : ?>
                            <label class="text-danger">Pinjaman Ditolak</label>
                        <?php else : ?>
                            <label class="text-success">Pinjaman Diterima</label>
                        <?php endif ?>
                    </h5>
                <?php endforeach; ?>
            </div>
            <h3 class="mb-3">Detail Barang</h3>
            <table id="tbl-daftar-pinjaman" class="table mt-3 dt-responsive nowrap">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tipe Barang</th>
                        <th>Jumlah Pinjam</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($data['data_barang'] as $brg) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $brg['kode_barang'] ?></td>
                        <td><?= $brg['nama_barang'] ?></td>
                        <td><?= $brg['tipe_barang'] ?></td>
                        <td><?= $brg['jumlah_brg'] ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>
            <div class="card-body">
                <a class="btn btn-primary" href="<?= BASEURL ?>/admin/approve-pinjaman" class="card-link">Kembali</a>
            </div>
        </div>
    </div>
</div>