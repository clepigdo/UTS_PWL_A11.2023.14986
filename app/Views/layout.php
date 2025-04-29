<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard <?= ucfirst(session()->get('role') ?? 'User') ?> - ClepStore</title>
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
                <div class="content my-10 px-4">
                    <div class="page-inner">
                        <div class="alert alert-primary alert-dismissible fade show mx-4 mt-4 shadow-sm rounded-3" role="alert" style="font-size: 16px;">
                            👋 Halo, <strong><?= session()->get('nama') ?></strong>! Selamat datang di <strong>clepStore</strong> (<?= ucfirst(session()->get('role')) ?>)!

                        </div>
                        <div class="about-container">
                            <?php if ($role === 'admin'): ?>
                                <h1>Selamat Datang di ClepStore</h1>
                                <p>Selamat datang, <strong><?= $username ?></strong>! Berikut ringkasan aktivitas:</p>
                                <ul class="list-group text-start">
                                    <li class="list-group-item">📊 Total Transaksi Hari Ini: <strong>120</strong></li>
                                    <li class="list-group-item">👥 Jumlah Pengguna Terdaftar: <strong>58</strong></li>
                                    <li class="list-group-item">📦 Pemesanan Belum Diproses: <strong>10</strong></li>
                                </ul>
                            <?php elseif ($role === 'user'): ?>
                                <h1>Dashboard Pengguna ClepStore</h1>
                                <p>Selamat datang, <strong><?= $username ?></strong>! Ini informasi akun Anda:</p>
                                <ul class="list-group text-start">
                                    <li class="list-group-item">💰 Saldo Topup: <strong>Rp 100.000</strong></li>
                                    <li class="list-group-item">📦 Status Pemesanan Terakhir: <strong>Selesai</strong></li>
                                    <li class="list-group-item">🗓️ Total Pemesanan Anda: <strong>3 kali</strong></li>
                                </ul>
                            <?php else: ?>
                                <h1>Selamat Datang di ClepStore</h1>
                                <p>Silakan login untuk mengakses dashboard Anda.</p>
                            <?php endif; ?>
                        </div>
                        <style>
                            .about-container {
                                text-align: center;
                                padding: 40px;
                                max-width: 800px;
                                margin: 0 auto;
                            }

                            h1 {
                                font-size: 3rem;
                                font-weight: bold;
                                margin-bottom: 20px;
                            }

                            p {
                                font-size: 1.2rem;
                                line-height: 1.8;
                                margin-bottom: 30px;
                            }

                            .btn-primary {
                                background-color: #ff7e5f;
                                border: none;
                                padding: 12px 30px;
                                font-size: 1rem;
                                border-radius: 30px;
                                transition: 0.3s;
                            }

                            .btn-primary:hover {
                                background-color: #feb47b;
                                color: #000;
                            }

                            @media (max-width: 768px) {
                                h1 {
                                    font-size: 2.4rem;
                                }

                                p {
                                    font-size: 1rem;
                                }
                            }
                            .footer{
                                margin-top: 130px;
                            }
                        </style>

                    </div>
                </div>
                <?php if (session()->getFlashdata('login_success')): ?>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                title: 'Selamat datang!',
                                text: "Halo <?= session()->get('nama') ?>, Anda login sebagai <?= ucfirst(session()->get('role')) ?> di clepStore!",
                                icon: 'success',
                                confirmButtonText: 'Lanjutkan',
                                confirmButtonColor: '#3085d6',
                                timer: 3000,
                                timerProgressBar: true,
                                showCloseButton: true
                            });
                        });
                    </script>
                <?php endif; ?>
                <?= $this->include('components/footer') ?>
            </div>

            <!-- Custom CSS -->
            <style>
                .main-panel {
                    display: flex;
                    flex-direction: column;
                    min-height: 100vh;
                }

                .content {
                    flex: 1 0 auto;
                    /* Membuat content mengisi ruang */
                }

                .footer {
                    flex-shrink: 0;
                    background-color: #f8f9fa;
                    padding: 15px 20px;
                }

                /* Container Carousel */
                #topupCarousel .carousel-inner {
                    overflow: visible;
                }

                /* Gambar Carousel */
                .carousel-img {
                    width: 60%;
                    border-radius: 20px;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
                    position: relative;
                }

                /* Tombol Geser di dalam gambar */
                .inside-control {
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    background-color: rgba(0, 0, 0, 0.5);
                    border: none;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    padding: 0;
                    z-index: 10;
                }

                .carousel-control-prev.inside-control {
                    left: 10%;
                }

                .carousel-control-next.inside-control {
                    right: 10%;
                }

                /* Panah Icon */
                .carousel-control-prev-icon,
                .carousel-control-next-icon {
                    background-size: 80% 80%;
                    width: 1.5rem;
                    height: 1.5rem;
                }

                /* Titik indicator */
                .carousel-indicators [data-bs-target] {
                    width: 12px;
                    height: 12px;
                    border-radius: 50%;
                    background-color: #888;
                }

                .carousel-indicators .active {
                    background-color: #fff;
                }
            </style>

        </div>

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