<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-6">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary-light">
                                        <i class="fe fe-user fe-16 text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Jumlah User</p>
                                    <span class="h3 mb-0"><?= $data['jml_member'] ?> User</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                        <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Jumlah Brang</p>
                                    <span class="h3 mb-0"><?= $data['jml_barang'] ?> Barang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                        <i class="fe fe-16 fe-filter text-white mb-0"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="small text-muted mb-0">Barang Dalam Proses</p>
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <span class="h3 mr-2 mb-0"><?= $data['proses'] ?> Barang</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                        <i class="fe fe-check-circle fe-16 text-white mb-0  "></i>
                                    </span>
                                </div>
                                <div class="col pr-0">
                                    <p class="small text-muted mb-0">Pinjaman selsesai</p>
                                    <span class="h3 mb-0"><?= $data['selesai'] ?> Barang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end section -->

        </div>
    </div>
</div>