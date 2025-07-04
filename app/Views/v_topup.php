<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Topup <?= ucfirst(session()->get('role') ?? 'User') ?> - ClepStore</title>
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
            </div>

            <div class="container">
                <div class="container my-5">
                    <div id="topupCarousel" class="carousel slide" data-bs-ride="carousel">

                        <!-- Titik Navigasi -->
                        <div class="carousel-indicators mb-4">
                            <button type="button" data-bs-target="#topupCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#topupCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#topupCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner position-relative">

                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <img src="<?= base_url() ?>/images/valo1.jpg" class="d-block mx-auto carousel-img" alt="Slide 1">
                            </div>

                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <img src="<?= base_url() ?>/images/valo1.jpg" class="d-block mx-auto carousel-img" alt="Slide 2">
                            </div>

                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <img src="<?= base_url() ?>/images/valo1.jpg" class="d-block mx-auto carousel-img" alt="Slide 3">
                            </div>

                            <!-- Tombol Geser Kiri -->
                            <button class="carousel-control-prev inside-control" type="button" data-bs-target="#topupCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>

                            <!-- Tombol Geser Kanan -->
                            <button class="carousel-control-next inside-control" type="button" data-bs-target="#topupCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>

                        </div>

                    </div>
                </div>

                <div class="container py-5">

                    <!-- TABS -->
                    <div class="d-flex justify-content-center mb-4">
                        <button class="tab-btn active">★ Favorite</button>
                        <button class="tab-btn">🎮 Games</button>
                        <button class="tab-btn">🎟 Voucher</button>
                        <button class="tab-btn">✨ Others</button>
                    </div>

                    <!-- GAME CARDS -->
                    <div class="row g-4">
                        <div class="col-6 col-md-3">
                            <a href="<?= base_url() ?>/topup_ml/index" class="text-decoration-none">
                                <div class="game-card">
                                    <img src="<?= base_url() ?>/images/valo1.jpg" alt="Mobile Legends ID">
                                    <div class="text-white game-title">MOBILE LEGENDS</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-md-3 ">
                            <div class="game-card">
                                <img src="<?= base_url() ?>/images/valo1.jpg" alt="Honor of Kings">
                                <div class="text-white game-title">PUBG MOBILE</div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 ">
                            <div class="game-card">
                                <img src="<?= base_url() ?>/images/valo1.jpg" alt="Mobile Legends MY">
                                <div class="text-white game-title">VALORANT</div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 ">
                            <div class="game-card">
                                <img src="<?= base_url() ?>/images/valo1.jpg" alt="Free Fire">
                                <div class="text-white game-title">ROBLOX</div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 mt-2">
                        <div class="col-6 col-md-3 ">
                            <div class="game-card">
                                <img src="<?= base_url() ?>/images/valo1.jpg" alt="Mobile Legends ID">
                                <div class="text-white game-title">POINT BLANK</div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 ">
                            <div class="game-card">
                                <img src="<?= base_url() ?>/images/valo1.jpg" alt="Honor of Kings">
                                <div class="text-white game-title">Honor of Kings</div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 ">
                            <div class="game-card">
                                <img src="<?= base_url() ?>/images/valo1.jpg" alt="Mobile Legends MY">
                                <div class="text-white game-title">Mobile Legends MY</div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 ">
                            <div class="game-card">
                                <img src="<?= base_url() ?>/images/valo1.jpg" alt="Free Fire">
                                <div class="text-white game-title">Free Fire</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Custom CSS -->
                <style>
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
                <?= $this->include('components/footer') ?>
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