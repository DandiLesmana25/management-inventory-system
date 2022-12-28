<h3 class="mb-3 text-center">Form Cari Barang</h3>
<div class="card shadow">
    <div class="card-body">



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

                <?php global $flag; ?>

                <?php if (isset($_POST['cari_barang'])) : ?>
                    <?php foreach ($data['data_barang'] as $brg) : ?>
                        <?php if (str_contains(
                            strtolower(
                                utf8_encode(
                                    ($brg['nama_barang'])
                                )
                            ),
                            strtolower($_POST['keywords'])
                        )) : ?>
                            <?php $flag = $flag + 1; ?>
                            <td><?= $brg['kode_barang'] ?></td>
                            <td><?= $brg['nama_barang'] ?></td>
                            <td><?= $brg['tipe_barang'] ?></td>
                            <td><?= $brg['jmlh_stok'] ?></td>
                            <td><?= $brg['lokasi'] ?></td>
                            <td><?= $brg['tgl_regist'] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php elseif ($flag = 0) : ?>
                    <tr><?= "Data Tidak di temukan" ?></tr>
                <?php elseif (!isset($_POST['cari_barang'])) : ?>
                    <?php foreach ($data['data_barang'] as $brg) : ?>
                        <td><?= $brg['kode_barang'] ?></td>
                        <td><?= $brg['nama_barang'] ?></td>
                        <td><?= $brg['tipe_barang'] ?></td>
                        <td><?= $brg['jmlh_stok'] ?></td>
                        <td><?= $brg['lokasi'] ?></td>
                        <td><?= $brg['tgl_regist'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>


                <!-- Algoritma pencarian end -->


            </tbody>

        </table>


    </div>
</div>