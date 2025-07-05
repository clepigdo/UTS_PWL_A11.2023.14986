<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dashboard <?= ucfirst($role) ?></h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Dashboard</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <?php if ($role === 'admin'): ?>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary op-8">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Transaksi Hari Ini</p>
                                    <h4 class="card-title">120</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info op-8">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Pengguna Terdaftar</p>
                                    <h4 class="card-title">58</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-warning op-8">
                                    <i class="fas fa-box"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Pemesanan Belum Diproses</p>
                                    <h4 class="card-title">10</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($role === 'user'): ?>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success op-8">
                                    <i class="fas fa-wallet"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Saldo Topup</p>
                                    <h4 class="card-title">Rp 100.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary op-8">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Status Pemesanan Terakhir</p>
                                    <h4 class="card-title">Selesai</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-danger op-8">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Pemesanan Anda</p>
                                    <h4 class="card-title">3 kali</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Game Populer</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-md-3 mb-4">
                                <a href="<?= base_url(session()->get('role') . '/v_topup') ?>" class="card card-game text-center h-100 d-flex flex-column justify-content-between">
                                    <img src="<?= base_url('images/ml.png') ?>" class="card-img-top" alt="Mobile Legends">
                                    <div class="card-body">
                                        <h5 class="card-title">Mobile Legends</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-3 mb-4">
                                <a href="<?= base_url(session()->get('role') . '/v_topup') ?>" class="card card-game text-center h-100 d-flex flex-column justify-content-between">
                                    <img src="<?= base_url('images/ff.jpg') ?>" class="card-img-top" alt="Free Fire">
                                    <div class="card-body">
                                        <h5 class="card-title">Free Fire</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-3 mb-4">
                                <a href="<?= base_url(session()->get('role') . '/v_topup') ?>" class="card card-game text-center h-100 d-flex flex-column justify-content-between">
                                    <img src="<?= base_url('images/gensin.jpg') ?>" class="card-img-top" alt="Genshin Impact">
                                    <div class="card-body">
                                        <h5 class="card-title">Genshin Impact</h5>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-md-3 mb-4">
                                <a href="<?= base_url(session()->get('role') . '/v_topup') ?>" class="card card-game text-center h-100 d-flex flex-column justify-content-between">
                                    <img src="<?= base_url('images/valo.jpg') ?>" class="card-img-top" alt="Valorant">
                                    <div class="card-body">
                                        <h5 class="card-title">Valorant</h5>
                                    </div>
                                </a>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h1>Selamat Datang di ClepStore</h1>
                        <p>Silakan login untuk mengakses dashboard Anda.</p>
                        <a href="<?= base_url('login') ?>" class="btn btn-primary">Login Sekarang</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>