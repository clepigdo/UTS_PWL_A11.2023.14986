<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Riwayat <?= ucfirst(session()->get('role') ?? 'User') ?> - ClepStore</title>
    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport" />
    <link
        rel="icon"
        href="<?= base_url() ?>kaiadmin/assets/img/kaiadmin/favicon.ico"
        type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url() ?>/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts and icons -->
    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["<?= base_url() ?>kaiadmin/assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/kaiadmin.min.css" />
    <style>

    </style>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?= $this->include('components/sidebar') ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img
                                src="<?= base_url() ?>kaiadmin/assets/img/kaiadmin/logo_light.svg"
                                alt="navbar brand"
                                class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?= $this->include('components/header') ?>
                <!-- End Navbar -->
            </div>

            <div class="container py-5">
                <div class="row">
                    <div class="col-md-11 col-lg-10 col-xl-9 mx-auto">
                        <div class="page-header">
                            <h3 class="fw-bold mb-3 text-black">Riwayat Pemesanan Anda</h3>
                            <div class="ms-auto">
                                <a href="<?= base_url(session()->get('role') . '/v_topup') ?>" class="btn btn-warning fw-bold">
                                    <i class="fas fa-plus me-1"></i> Buat Pesanan Baru
                                </a>
                            </div>
                        </div>
                        <p class="op-7 mb-4 text-black-50">Semua transaksi yang pernah Anda lakukan akan tercatat di sini.</p>

                        <?php if (empty($orders)): ?>
                            <div class="card bg-dark text-white shadow-lg p-3 p-md-4">
                                <div class="card-body text-center">
                                    <p class="fs-5">Anda belum memiliki riwayat pemesanan.</p>
                                    <a href="<?= base_url(session()->get('role') . '/v_topup') ?>" class="btn btn-warning fw-bold mt-2">Mulai Top-Up Sekarang</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                                <?php
                                $statusClass = '';
                                $statusText = '';
                                $borderColorClass = 'border-secondary';
                                switch ($order['status_pembayaran']) {
                                    case 'paid':
                                    case 'settlement':
                                        $statusClass = 'bg-success';
                                        $statusText = 'Sukses';
                                        $borderColorClass = 'border-success';
                                        break;
                                    case 'pending':
                                        $statusClass = 'bg-warning text-dark';
                                        $statusText = 'Menunggu Pembayaran';
                                        $borderColorClass = 'border-warning';
                                        break;
                                    default:
                                        $statusClass = 'bg-danger';
                                        $statusText = 'Gagal / Kadaluarsa';
                                        $borderColorClass = 'border-danger';
                                }
                                ?>
                                <div class="card bg-dark text-white shadow-sm border-0 border-start border-4 <?= $borderColorClass ?> mb-4" style="border-radius: 10px;">
                                    <div class="card-body py-3 px-4">
                                        <div class="d-block d-md-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="row">
                                                    <div class="col-lg-7 col-md-6 mb-3 mb-md-0">
                                                        <h5 class="fw-bold mb-1"><?= esc($order['nominal']) ?> Diamonds</h5>
                                                        <small class="text-white-50">Mobile Legends</small>
                                                        <div class="mt-2 text-white-50 fs-sm">Order ID: CLEP-<?= esc($order['id']) ?></div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-6">
                                                        <div class="d-flex flex-column">
                                                            <span class="text-white-50 fs-sm">Tanggal</span>
                                                            <span class="fw-bold"><?= date('d F Y, H:i', strtotime($order['created_at'])) ?></span>
                                                        </div>
                                                        <div class="d-flex flex-column mt-2">
                                                            <span class="text-white-50 fs-sm">Total Harga</span>
                                                            <span class="fw-bold fs-5">Rp <?= number_format($order['harga'], 0, ',', '.') ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ms-md-4 mt-3 mt-md-0 text-center text-md-end" style="min-width: 180px;">
                                                <span class="badge <?= $statusClass ?> p-2 fs-6 mb-2"><?= $statusText ?></span>
                                                <?php if ($order['status_pembayaran'] == 'pending'): ?>
                                                    <a href="<?= base_url('payment/process/' . $order['id']) ?>" class="btn btn-sm btn-warning fw-bold d-block mt-2">Lanjutkan Pembayaran</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </div>


            <style>
                .fs-sm {
                    font-size: 0.85rem;
                }
            </style>
            <?= $this->include('components/footer') ?>
        </div>
        <!--   Core JS Files   -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/core/jquery-3.7.1.min.js"></script>
        <script src="<?= base_url() ?>kaiadmin/assets/js/core/popper.min.js"></script>
        <script src="<?= base_url() ?>kaiadmin/assets/js/core/bootstrap.min.js"></script>

        <!-- jQuery Scrollbar -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

        <!-- Chart JS -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/chart.js/chart.min.js"></script>

        <!-- jQuery Sparkline -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

        <!-- Chart Circle -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/chart-circle/circles.min.js"></script>

        <!-- Datatables -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/datatables/datatables.min.js"></script>

        <!-- Bootstrap Notify -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

        <!-- jQuery Vector Maps -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/jsvectormap/world.js"></script>

        <!-- Sweet Alert -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

        <!-- Kaiadmin JS -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/kaiadmin.min.js"></script>

        <!-- Kaiadmin DEMO methods, don't include it in your project! -->
        <script src="<?= base_url() ?>kaiadmin/assets/js/setting-demo.js"></script>
        <script src="<?= base_url() ?>kaiadmin/assets/js/demo.js"></script>
        <script>
            $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
                type: "line",
                height: "70",
                width: "100%",
                lineWidth: "2",
                lineColor: "#177dff",
                fillColor: "rgba(23, 125, 255, 0.14)",
            });

            $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
                type: "line",
                height: "70",
                width: "100%",
                lineWidth: "2",
                lineColor: "#f3545d",
                fillColor: "rgba(243, 84, 93, .14)",
            });

            $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
                type: "line",
                height: "70",
                width: "100%",
                lineWidth: "2",
                lineColor: "#ffa534",
                fillColor: "rgba(255, 165, 52, .14)",
            });
        </script>
</body>

</html>