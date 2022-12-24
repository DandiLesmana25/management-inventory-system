<h3 class="mb-3 text-center">Form Tambah Barang</h3>
<div class="card shadow">
    <div class="card-body">
        <form action="<?= BASEURL ?>/admin/tambah-barang" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input class="form-control" type="text" name="kode_barang" id="kode_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input class="form-control" type="text" name="nama_barang" id="nama_barang" required>
                    </div>

                    <div class="form-group">
                        <label for="tipe_barang">Tipe Barang</label>
                        <input class="form-control" type="text" name="tipe_barang" id="tipe_barang" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="jmlh_stok">Jumlah Stok</label>
                        <input class="form-control" type="number" name="jmlh_stok" id="jmlh_stok" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input class="form-control" type="text" name="lokasi" id="lokasi" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_regist">Tanggal Registrasi</label>
                        <input class="form-control" type="date" name="tgl_regist" id="tgl_regist" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Tambah Barang</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </form>





        <hr>
        <h3>Data Barang</h3>
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

        <table id="tbl-daftar-barang" class="table dt-responsive nowrap" style="width: 100%;">
            <thead class="thead-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tipe Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Lokasi</th>
                    <th>Tahun Registrasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data['data_barang'] != []) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($data['data_barang'] as $brg) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $brg['kode_barang'] ?></td>
                            <td><?= $brg['nama_barang'] ?></td>
                            <td><?= $brg['tipe_barang'] ?></td>
                            <td><?= $brg['jmlh_stok'] ?></td>
                            <td><?= $brg['lokasi'] ?></td>
                            <td><?= $brg['tgl_regist'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="<?= BASEURL ?>/admin/detail-barang/<?= $brg['id'] ?>">Detail</a>
                                <a class="btn btn-success" href="<?= BASEURL ?>/admin/ubah-barang/<?= $brg['id'] ?>">Ubah</a>
                                <a class="btn btn-danger" href="<?= BASEURL ?>/admin/hapus-barang/<?= $brg['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5"><strong>Tidak ada data barang</strong></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>