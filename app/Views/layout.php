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

    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/kaiadmin.min.css" />

    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <?= $this->include('components/sidebar') ?>
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
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
                    </div>
                <?= $this->include('components/header') ?>
                <div class="content my-10 px-4">
                    <div class="page-inner">
                        <div class="alert alert-primary alert-dismissible fade show mx-4 mt-4 shadow-sm rounded-3" role="alert" style="font-size: 16px;">
                            👋 Halo, <strong><?= session()->get('nama') ?></strong>! Selamat datang di <strong>clepStore</strong> (<?= ucfirst(session()->get('role')) ?>)!

                        </div>
                        
                        <?= $this->renderSection('content') ?> 
                        
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

                /* Tambahkan atau modifikasi bagian ini untuk .page-inner agar bisa di-scroll */
                .page-inner {
                    max-height: calc(100vh - 180px); /* Sesuaikan 180px ini jika perlu */
                    overflow-y: auto; /* Memungkinkan scroll vertikal */
                    padding-bottom: 20px; /* Tambahkan padding agar footer tidak menutupi konten saat discroll */
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
    <script src="<?= base_url() ?>kaiadmin/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url() ?>kaiadmin/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>kaiadmin/assets/js/core/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/chart.js/chart.min.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/chart-circle/circles.min.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/datatables/datatables.min.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/jsvectormap/world.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <script src="<?= base_url() ?>kaiadmin/assets/js/kaiadmin.min.js"></script>

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