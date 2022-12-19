<h3 class="mb-3">Detail Barang</h3>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $data['data_barang']['kode_barang'] ?></h4>
                <h6 class="card-subtitle mb-2 text-muted"><?= $data['data_barang']['tgl_regist'] ?></h6>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nama Barang:</b> <?= $data['data_barang']['nama_barang'] ?></li>
                <li class="list-group-item"><b>Tipe Barang:</b> <?= $data['data_barang']['tipe_barang'] ?></li>
                <li class="list-group-item"><b>Jumlah Stok:</b> <?= $data['data_barang']['jmlh_stok'] ?></li>
                <li class="list-group-item"><b>Lokasi:</b> <?= $data['data_barang']['lokasi'] ?></li>
            </ul>
            <div class="card-body">
                <a class="btn btn-primary" href="<?= BASEURL ?>/member/request-barang" class="card-link">Kembali</a>
            </div>
        </div>
    </div>
</div>
