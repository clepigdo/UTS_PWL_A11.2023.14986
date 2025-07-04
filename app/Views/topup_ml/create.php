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
                <div class="page-inner">
                    <div class="card bg-dark text-white shadow-lg p-3 p-md-4" style="border-radius: 15px;">
                        <div class="card-body">
                            <h3 class="text-center mb-4 text-warning">Top-Up Mobile Legends</h3>

                            <h5 class="mb-3">1. Pilih Nominal</h5>
                            <div class="row g-3">
                                <div class="col-6 col-md-4">
                                    <div class="diamond-card text-center" data-nominal-value="86" data-nominal-text="86 Diamonds" data-harga="22000">
                                        <div class="fw-bold">86 Diamonds</div>
                                        <div class="text-white-50 small">78 + 8 Bonus</div>
                                        <div class="price-badge mt-2">Rp 22.000</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="diamond-card text-center" data-nominal-value="172" data-nominal-text="172 Diamonds" data-harga="44000">
                                        <div class="fw-bold">172 Diamonds</div>
                                        <div class="text-white-50 small">156 + 16 Bonus</div>
                                        <div class="price-badge mt-2">Rp 44.000</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="diamond-card text-center" data-nominal-value="257" data-nominal-text="257 Diamonds" data-harga="66000">
                                        <div class="fw-bold">257 Diamonds</div>
                                        <div class="text-white-50 small">234 + 23 Bonus</div>
                                        <div class="price-badge mt-2">Rp 66.000</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="diamond-card text-center" data-nominal-value="344" data-nominal-text="344 Diamonds" data-harga="88000">
                                        <div class="fw-bold">344 Diamonds</div>
                                        <div class="text-white-50 small">312 + 32 Bonus</div>
                                        <div class="price-badge mt-2">Rp 88.000</div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="diamond-card text-center" data-nominal-value="429" data-nominal-text="429 Diamonds" data-harga="110000">
                                        <div class="fw-bold">429 Diamonds</div>
                                        <div class="text-white-50 small">395 + 34 Bonus</div>
                                        <div class="price-badge mt-2">Rp 110.000</div>
                                    </div>
                                </div>
                            </div>

                            <div id="form-section" class="mt-4" style="display: none;">
                                <hr class="border-secondary">
                                <hr class="border-secondary">

                                <div id="selection-summary" class="p-3 mb-4" style="background-color: #495057; border-left: 5px solid #ffc107; border-radius: 6px;">
                                    <h6 class="text-warning mb-2">Ringkasan Pesanan</h6>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-white-50">Item:</span>
                                        <span id="summary-nominal" class="fw-bold">-- Belum Dipilih --</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <span class="text-white-50">Harga:</span>
                                        <span id="summary-harga" class="fw-bold">--</span>
                                    </div>
                                </div>
                                <form action="<?= base_url('topup_ml/store') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" id="selected-nominal" name="nominal">

                                    <h5 class="mb-3 mt-4">2. Lengkapi Data</h5>
                                    <div class="mb-3">
                                        <label for="user_id" class="form-label">User ID</label>
                                        <input type="text" class="form-control bg-dark text-white border-secondary" id="user_id" name="user_id" placeholder="Masukkan User ID" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="server_id" class="form-label">Server ID</label>
                                        <input type="text" class="form-control bg-dark text-white border-secondary" id="server_id" name="server_id" placeholder="Masukkan Server ID (4-5 digit)" required>
                                    </div>

                                    <h5 class="mb-3 mt-4">3. Pilih Pembayaran</h5>
                                    <input type="hidden" id="metode_pembayaran" name="metode_pembayaran" value="">

                                    <div id="payment-selection-grid" class="row g-3">
                                        <?php if (!empty($daftar_pembayaran)): ?>
                                            <?php foreach ($daftar_pembayaran as $kode => $details): ?>
                                                <div class="col-6">
                                                    <div class="payment-card" data-payment-code="<?= esc($kode) ?>">
                                                        <?php if (isset($details['label'])): ?>
                                                            <span class="payment-label"><?= esc($details['label']) ?></span>
                                                        <?php endif; ?>
                                                        <div class="d-flex align-items-center">
                                                            <img src="<?= base_url('images/payments/' . esc($details['logo'])) ?>" class="payment-logo" alt="<?= esc($details['nama']) ?>">
                                                            <span class="payment-name ms-2"><?= esc($details['nama']) ?></span>
                                                        </div>
                                                        <div class="payment-price fw-bold text-end">--</div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-warning fw-bold">Top-Up Sekarang</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Custom CSS -->
                <style>
                    .payment-card {
                        border: 2px solid #4a5568;
                        background-color: #343a40;
                        border-radius: 0.5rem;
                        padding: 0.75rem 1rem;
                        cursor: pointer;
                        transition: all 0.2s ease-in-out;
                        position: relative;
                    }

                    .payment-card:hover {
                        transform: translateY(-3px);
                        border-color: #6c757d;
                    }

                    .payment-card.selected {
                        border-color: #ffc107;
                        background-color: #495057;
                        box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
                    }

                    .payment-logo {
                        height: 20px;
                        width: auto;
                    }

                    .payment-price {
                        font-size: 0.95rem;
                    }

                    .payment-label {
                        position: absolute;
                        top: -10px;
                        right: 10px;
                        background-color: #dc3545;
                        color: white;
                        font-size: 0.7rem;
                        padding: 2px 6px;
                        border-radius: 4px;
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
                // === Variabel Elemen ===
                const $diamondCards = $('.diamond-card');
                const $paymentCards = $('.payment-card');
                const $hiddenNominalInput = $('#selected-nominal');
                const $hiddenPaymentInput = $('#metode_pembayaran');
                const $summaryNominal = $('#summary-nominal');
                const $summaryHarga = $('#summary-harga');
                const $formSection = $('#form-section');

                const PPN_RATE = 0.11; // Pajak 11%

                // === Fungsi Utama ===
                function updateSelection(cardElement) {
                    const $card = $(cardElement);
                    $diamondCards.removeClass('selected');
                    $card.addClass('selected');
                    console.log("Nilai mentah dari data-harga:", $card.data('harga'));

                    const nominalValue = $card.data('nominal-value');
                    const nominalText = $card.data('nominal-text');
                    const hargaDasar = parseFloat($card.data('harga'));

                    // Hitung harga termasuk PPN
                    const hargaDenganPpn = Math.round(hargaDasar * (1 + PPN_RATE));

                    // Update input tersembunyi untuk form
                    $hiddenNominalInput.val(nominalValue);

                    // Update Ringkasan Pesanan (jika ada)
                    if ($summaryNominal.length) {
                        $summaryNominal.text(nominalText);
                        $summaryHarga.text('Rp ' + formatRupiah(hargaDasar));
                    }

                    // Update harga di semua kartu pembayaran
                    $('.payment-price').text('Rp ' + formatRupiah(hargaDenganPpn));

                    // Tampilkan form jika tersembunyi (untuk halaman Create)
                    if ($formSection.length && $formSection.is(':hidden')) {
                        $formSection.slideDown('fast');
                    }
                }

                function selectPayment(cardElement) {
                    const $card = $(cardElement);
                    $paymentCards.removeClass('selected');
                    $card.addClass('selected');

                    const paymentCode = $card.data('payment-code');
                    $hiddenPaymentInput.val(paymentCode);
                }

                function formatRupiah(angka) {
                    return new Intl.NumberFormat('id-ID').format(angka);
                }

                // === Event Handlers ===
                $diamondCards.on('click', function() {
                    updateSelection(this);
                });

                $paymentCards.on('click', function() {
                    selectPayment(this);
                });

                // === Inisialisasi untuk Halaman Edit ===
                const initiallySelectedCard = $('.diamond-card.selected');
                if (initiallySelectedCard.length > 0) {
                    updateSelection(initiallySelectedCard);
                }

                // Pilih metode pembayaran yang sudah tersimpan di halaman edit
                const savedPaymentMethod = "<?= $topup['metode_pembayaran'] ?? '' ?>";
                if (savedPaymentMethod) {
                    $hiddenPaymentInput.val(savedPaymentMethod);
                    $('.payment-card[data-payment-code="' + savedPaymentMethod + '"]').addClass('selected');
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