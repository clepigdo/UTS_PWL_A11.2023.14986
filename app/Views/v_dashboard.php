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
        <div class="col-md-12">
            <div class="card bg-info-gradient text-white shadow-lg p-4 mb-4" style="border-radius: 15px;">
                <div class="card-body">
                    <h2 class="text-white text-center mb-3">Selamat Datang di ClepStore!</h2>
                    <p class="lead text-white-50 text-center">
                        ClepStore adalah platform terdepan untuk segala kebutuhan top-up game dan layanan digital Anda. Nikmati pengalaman transaksi yang cepat, aman, dan terpercaya untuk game favorit Anda!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if ($role === 'admin'): ?>

        <?php else: /* Untuk peran 'user' dan peran lainnya */ ?>
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
        <?php endif; ?>
    </div>
</div>

<style>
    .bg-purple {
        background-color: #8067F0 !important;
    }
</style>

<?= $this->endSection() ?>