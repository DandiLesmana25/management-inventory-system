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
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tipe Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Lokasi</th>
                    <th>Tahun Registrasi</th>
                </tr>
            </thead>


            <tbody>

                <!-- Algoritma Pencarian start -->

                <?php if (isset($_POST['cari_barang'])) : ?>
                    <?php for ($i = 0; $i <= 10; $i++) : ?>
                        <?php if (str_contains(
                            strtolower(
                                utf8_encode(
                                    ($data['data_barang'][$i]['nama_barang'])
                                )
                            ),
                            strtolower($_POST['keywords'])
                        )) : ?>
                            <td><?= utf8_encode(($data['data_barang'][$i]['kode_barang'])) ?></td>
                            <td><?= utf8_encode(($data['data_barang'][$i]['nama_barang'])) ?></td>
                            <td><?= utf8_encode(($data['data_barang'][$i]['tipe_barang'])) ?></td>
                            <td><?= utf8_encode(($data['data_barang'][$i]['jmlh_stok'])) ?></td>
                            <td><?= utf8_encode(($data['data_barang'][$i]['lokasi'])) ?></td>
                            <td><?= utf8_encode(($data['data_barang'][$i]['tgl_regist'])) ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>

                <!-- Algoritma pencarian end -->

            </tbody>

        </table>


    </div>
</div>