<h3 class="mb-3 text-center">Form Tambah Barang</h3>
<div class="card shadow">
    <div class="card-body">



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

        <table id="" class="table dt-responsive nowrap" style="width: 100%;">
            <thead class="thead-dark text-center">

                <form action="" method="POST">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" autofocus autocomplete="off" placeholder="Cari Barang" name="keywords" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" style="width: 25%;" name="cari_barang">
                                Cari
                            </button>
                        </div>
                    </div>

                </form>

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

            <?php

            if (isset($_POST['cari_barang'])) {
                for ($i = 0; $i <= 10; $i++) {
                    if (
                        utf8_encode(($data['data_barang'][$i]['kode_barang'])) == $_POST['keywords']
                        or utf8_encode(($data['data_barang'][$i]['nama_barang'])) == $_POST['keywords']
                    ) {
                        <tbody>
                        <td><?= $i ?></td>
                            <td><?= $brg['kode_barang'] ?></td>
                            <td><?= $brg['nama_barang'] ?></td>
                            <td><?= $brg['tipe_barang'] ?></td>
                            <td><?= $brg['jmlh_stok'] ?></td>
                            <td><?= $brg['lokasi'] ?></td>
                            <td><?= $brg['tgl_regist'] ?></td>
                            <td class="text-center">
                                <a class="badge badge-info" href="<?= BASEURL ?>/admin/detail-barang/<?= $brg['id'] ?>">Detail</a>
                                <a class="badge badge-warning" href="<?= BASEURL ?>/admin/ubah-barang/<?= $brg['id'] ?>">Ubah</a>
                                <a class="badge badge-danger" href="<?= BASEURL ?>/admin/hapus-barang/<?= $brg['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                    }
                }
            }
            ?>

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
                                <a class="badge badge-info" href="<?= BASEURL ?>/admin/detail-barang/<?= $brg['id'] ?>">Detail</a>
                                <a class="badge badge-warning" href="<?= BASEURL ?>/admin/ubah-barang/<?= $brg['id'] ?>">Ubah</a>
                                <a class="badge badge-danger" href="<?= BASEURL ?>/admin/hapus-barang/<?= $brg['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
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