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
                <div class="container py-5">
                    <div class="card bg-dark text-white shadow-lg p-3 p-md-4" style="border-radius: 15px;">
                        <div class="card-body">
                            <h3 class="text-center mb-4 text-warning">Edit Top-Up Mobile Legends</h3>

                            <form action="<?= base_url('topup_ml/update/' . $topup['id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" id="selected-nominal" name="nominal" value="<?= esc($topup['nominal']) ?>">

                                <h5 class="mb-3">1. Pilih Nominal</h5>
                                <div class="row g-3">
                                    <?php if (!empty($daftar_nominal)): ?>
                                        <?php foreach ($daftar_nominal as $value => $details): ?>
                                            <?php
                                            // Cek apakah nominal ini yang sedang dipilih/disimpan di database
                                            $isSelected = (esc($topup['nominal']) == $value) ? 'selected' : '';
                                            ?>
                                            <div class="col-6 col-md-4">
                                                <div class="diamond-card text-center <?= $isSelected ?>"
                                                    data-nominal-value="<?= $value ?>"
                                                    data-nominal-text="<?= esc($details['text']) ?>"
                                                    data-harga="<?= esc($details['harga']) ?>">

                                                    <div class="fw-bold"><?= esc($details['text']) ?></div>
                                                    <div class="text-white-50 small"><?= esc($details['bonus'] ?? '') ?></div>
                                                    <div class="price-badge mt-2">Rp <?= number_format($details['harga'], 0, ',', '.') ?></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>

                                <hr class="border-secondary my-4">

                                <div id="form-section">
                                    <div id="selection-summary" class="p-3 mb-4" style="background-color: #495057; border-left: 5px solid #ffc107; border-radius: 6px;">
                                        <h6 class="text-warning mb-2">Ringkasan Pesanan</h6>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-white-50">Item:</span>
                                            <span id="summary-nominal" class="fw-bold">--</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-1">
                                            <span class="text-white-50">Harga:</span>
                                            <span id="summary-harga" class="fw-bold">--</span>
                                        </div>
                                    </div>

                                    <h5 class="mb-3 mt-4">2. Detail Akun</h5>
                                    <div class="mb-3">
                                        <label for="user_id" class="form-label">User ID</label>
                                        <input type="text" class="form-control bg-dark text-white border-secondary" id="user_id" name="user_id" placeholder="Masukkan User ID" value="<?= esc($topup['user_id']) ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="server_id" class="form-label">Server ID</label>
                                        <input type="text" class="form-control bg-dark text-white border-secondary" id="server_id" name="server_id" placeholder="Masukkan Server ID" value="<?= esc($topup['server_id']) ?>" required>
                                    </div>

                                    <h5 class="mb-3 mt-4">3. Metode Pembayaran</h5>
                                    <div class="mb-4">
                                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                        <select class="form-select bg-dark text-white border-secondary" id="metode_pembayaran" name="metode_pembayaran" required>
                                            <option value="Dana" <?= (esc($topup['metode_pembayaran']) == 'Dana') ? 'selected' : '' ?>>DANA</option>
                                            <option value="OVO" <?= (esc($topup['metode_pembayaran']) == 'OVO') ? 'selected' : '' ?>>OVO</option>
                                            <option value="Gopay" <?= (esc($topup['metode_pembayaran']) == 'Gopay') ? 'selected' : '' ?>>GoPay</option>
                                            <option value="ShopeePay" <?= (esc($topup['metode_pembayaran']) == 'ShopeePay') ? 'selected' : '' ?>>ShopeePay</option>
                                            <option value="Transfer Bank" <?= (esc($topup['metode_pembayaran']) == 'Transfer Bank') ? 'selected' : '' ?>>Transfer Bank</option>
                                        </select>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-warning fw-bold">Update Top-Up</button>
                                    </div>
                                </div>
                            </form>
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
            $(document).ready(function() {
                const $diamondCards = $('.diamond-card');
                const $hiddenNominalInput = $('#selected-nominal');
                const $summaryNominal = $('#summary-nominal');
                const $summaryHarga = $('#summary-harga');

                function updateSelection(cardElement) {
                    const $card = $(cardElement);
                    $diamondCards.removeClass('selected');
                    $card.addClass('selected');

                    const nominalValue = $card.data('nominal-value');
                    const nominalText = $card.data('nominal-text');
                    const harga = $card.data('harga');

                    $hiddenNominalInput.val(nominalValue);
                    $summaryNominal.text(nominalText);
                    $summaryHarga.text('Rp ' + new Intl.NumberFormat('id-ID').format(harga));
                }

                $diamondCards.on('click', function() {
                    updateSelection(this);
                });

                const initiallySelectedCard = $('.diamond-card.selected');
                if (initiallySelectedCard.length > 0) {
                    updateSelection(initiallySelectedCard);
                }
            });
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