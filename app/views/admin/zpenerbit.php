<!-- <h3 class="mb-3 text-center">Form Tambah Penerbit Baru</h3>

<div class="card shadow">
    <div class="card-body">
        <form action="<?= BASEURL ?>/admin/tambah-penerbit" method="post">
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nama_penerbit">Nama Penerbit</label>
                        <input class="form-control" type="text" name="nama_penerbit" id="nama_penerbit" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" type="text" name="alamat" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input class="form-control" type="number" name="no_telp" id="no_telp" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Tambah Penerbit</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </form>

        <hr>

        <h3>List Penerbit</h3>
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

        <table id="tbl-list-penerbit" class="table dt-responsive nowrap" style="width: 100%;">
            <thead class="thead-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Penerbit</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data['penerbit'] != []) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($data['penerbit'] as $p) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $p['nama_penerbit'] ?></td>
                            <td><?= $p['alamat'] ?></td>
                            <td><?= $p['no_telp'] ?></td>
                            <td class="text-center">
                                <a class="badge badge-warning" href="<?= BASEURL ?>/admin/ubah-penerbit/<?= $p['id'] ?>">Ubah</a>
                                <a class="badge badge-danger" href="<?= BASEURL ?>/admin/hapus-penerbit/<?= $p['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div> -->