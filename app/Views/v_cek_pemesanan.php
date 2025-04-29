<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Pemesanan <?= ucfirst(session()->get('role') ?? 'User') ?> - ClepStore</title>
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
    <style>
        body,
        html {
            height: 100%;
        }

        .footer {
            margin-top: 700px;
        }
        
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/kaiadmin.min.css" />

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
                <div class="row text-center my-4">
                    <!-- Card Statistik Pengguna -->
                    <!-- Container utama -->
                    <div class="container-fluid mt-4">

                        <!-- Baris 1: Deskripsi dan Waktu -->
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <div class="p-4 bg-light rounded shadow-sm">
                                    <h4 class="fw-bold mb-2">Selamat datang kembali, Admin!</h4>
                                    <p class="text-muted">Lihat statistik terbaru dan pantau aktivitas platform secara real-time.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-4 bg-white rounded shadow-sm text-end">
                                    <p class="mb-1 text-muted">Tanggal & Waktu</p>
                                    <h5 class="fw-bold" id="datetime">--:--:--</h5>
                                    <span class="badge bg-success">🟢 Sistem Aktif</span>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 2: Statistik -->
                        <div class="row g-4">
                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow h-100 border-0">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="me-4">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                                <i class="fas fa-users fa-lg"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="text-muted mb-1">Total Pengguna</h6>
                                            <h4 class="fw-bold mb-0">1,245</h4>
                                            <small>Bergabung hingga hari ini</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow h-100 border-0">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="me-4">
                                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                                <i class="fas fa-shopping-cart fa-lg"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="text-muted mb-1">Total Penjualan</h6>
                                            <h4 class="fw-bold mb-0">3,764</h4>
                                            <small>Transaksi yang berhasil</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="card shadow h-100 border-0">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="me-4">
                                            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width:60px; height:60px;">
                                                <i class="fas fa-coins fa-lg"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="text-muted mb-1">Pendapatan</h6>
                                            <h4 class="fw-bold mb-0">Rp 87.500.000</h4>
                                            <small>Akumulasi hingga saat ini</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Baris 3: Ilustrasi dan Grafik -->
                        
                    </div>

                    <!-- Script untuk waktu -->
                    <script>
                        function updateTime() {
                            const now = new Date();
                            const timeStr = now.toLocaleTimeString();
                            document.getElementById("datetime").textContent = timeStr;
                        }
                        setInterval(updateTime, 1000);
                        updateTime();
                    </script>

                </div>

            </div>
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