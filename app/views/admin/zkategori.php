<!-- <h3 class="mb-3 text-center">Form Tambah Kategori Baru</h3>

<div class="card shadow">
    <div class="card-body">
        <form action="<?= BASEURL ?>/admin/tambah-kategori" method="post">
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input class="form-control" type="text" name="nama_kategori" id="nama_kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input class="form-control" type="text" name="keterangan" id="keterangan" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Tambah Kategori</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </form>

        <hr>

        <h3>List Kategori</h3>
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

        <table id="tbl-list-kategori" class="table dt-responsive nowrap" style="width: 100%;">
            <thead class="thead-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data['kategori'] != [[]]) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($data['kategori'] as $k) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $k['nama_kategori'] ?></td>
                            <td><?= $k['keterangan'] ?></td>
                            <td class="text-center">
                                <a class="badge badge-warning" href="<?= BASEURL ?>/admin/ubah-kategori/<?= $k['id'] ?>">Ubah</a>
                                <a class="badge badge-danger" href="<?= BASEURL ?>/admin/hapus-kategori/<?= $k['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div> -->