<h3 class="mb-3">Detail User</h3>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= $data['users']['nama'] ?></h4>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Username :</b> <?= $data['users']['username'] ?></li>
                <li class="list-group-item"><b>Role:</b> <?= $data['users']['role'] ?></li>
            </ul>
            <div class="card-body">
                <a class="btn btn-primary" href="<?= BASEURL ?>/admin/daftar-user" class="card-link">Kembali</a>
            </div>
        </div>
    </div>
</div>
