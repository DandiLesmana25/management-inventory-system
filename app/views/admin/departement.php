<h3 class="mb-3 text-center">Form Tambah Departement</h3>

<div class="card shadow">
    <div class="card-body">
        <form action="<?= BASEURL ?>/admin/tambah-departement" method="post">
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Departement</label>
                        <input class="form-control" type="text" name="nama_departement" id="nama_departement" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori">Nomor Telepon</label>
                        <input class="form-control" type="number" name="no_tlp" id="no_tlp" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input class="form-control" type="text" name="keterangan" id="keterangan" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Tambah Departement</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </form>

        <hr>

        <h3>List Departement</h3>
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

        <table id="tbl-list-departement" class="table dt-responsive nowrap" style="width: 100%;">
            <thead class="thead-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Departement</th>
                    <th>Nomor Telepon</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data['departement'] != []) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($data['departement'] as $dept) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $dept['nama_departement'] ?></td>
                            <td><?= $dept['no_tlp'] ?></td>
                            <td><?= $dept['keterangan'] ?></td>
                            <td class="text-center">
                                <a class="badge badge-warning" href="<?= BASEURL ?>/admin/update-departement/<?= $dept['id_departement'] ?>">Ubah</a>
                                <a class="badge badge-danger" href="<?= BASEURL ?>/admin/hapus-departement/<?= $dept['id_departement'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5"><strong>Tidak ada data Departement</strong></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>