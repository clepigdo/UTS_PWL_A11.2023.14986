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
                    <div class="card bg-dark text-white shadow-lg p-3 p-md-4 mx-auto" style="max-width: 700px; border-radius: 15px;">
                        <div class="card-body">
                            <h3 class="text-center mb-4 text-warning">Konfirmasi Pembayaran</h3>

                            <div class="p-3 mb-4" style="background-color: #495057; border-radius: 8px;">
                                <h6 class="text-white mb-3">Detail Pesanan</h6>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-white-50">Order ID:</span>
                                    <span class="fw-bold"><?= 'CLEP-' . esc($pesanan['id']) ?></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-white-50">Item:</span>
                                    <span class="fw-bold"><?= esc($pesanan['nominal']) ?> Diamonds</span>
                                </div>
                                <hr class="border-secondary">
                                <div class="d-flex justify-content-between fs-5">
                                    <span class="text-white-50">Total Bayar (termasuk PPN 11%):</span>
                                    <span class="fw-bold text-warning">Rp <?= number_format($harga_akhir, 0, ',', '.') ?></span>
                                </div>
                            </div>

                            <div class="d-grid mt-4">
                                <button id="tombol-bayar" class="btn btn-warning fw-bold fs-5 py-2">
                                    LANJUTKAN KE PEMBAYARAN
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <small class="text-white-50">Dengan melanjutkan, Anda setuju dengan Syarat & Ketentuan kami. Pembayaran aman dan terenkripsi oleh Midtrans.</small>
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
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= getenv('MIDTRANS_CLIENT_KEY') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                // 2. Ambil Snap Token yang sudah kita buat di controller
                const snapToken = "<?= esc($token) ?>";
                const $tombolBayar = $('#tombol-bayar');

                // Pastikan token ada sebelum mengaktifkan tombol
                if (snapToken) {
                    $tombolBayar.prop('disabled', false);
                } else {
                    $tombolBayar.prop('disabled', true).text('Terjadi Kesalahan');
                }

                // 3. Tambahkan event handler untuk tombol bayar
                $tombolBayar.on('click', function(e) {
                    e.preventDefault();

                    // 4. Panggil jendela pembayaran Midtrans Snap
                    snap.pay(snapToken, {
                        onSuccess: function(result) {
                            /* Pengguna berhasil menyelesaikan pembayaran */
                            console.log('SUCCESS', result);
                            alert("Pembayaran Berhasil!");
                            // Arahkan ke halaman histori atau status pesanan
                            window.location.href = "<?= base_url('/admin/riwayat_pemesanan') ?>";
                        },
                        onPending: function(result) {
                            /* Menunggu pembayaran (misal: transfer bank) */
                            console.log('PENDING', result);
                            alert("Menunggu pembayaran Anda!");
                            window.location.href = "<?= base_url('/admin/riwayat_pemesanan') ?>";
                        },
                        onError: function(result) {
                            /* Terjadi error saat pembayaran */
                            console.log('ERROR', result);
                            alert("Pembayaran Gagal!");
                        },
                        onClose: function() {
                            /* Pengguna menutup pop-up tanpa menyelesaikan pembayaran */
                            console.log('Pop-up pembayaran ditutup.');
                            // Anda bisa memberikan notifikasi lembut di sini jika perlu
                        }
                    });
                });
            });
        </script>
        <script>
            // Ganti seluruh script lama Anda dengan yang ini
            $(document).ready(function() {
                const $diamondCards = $('.diamond-card');
                const $formSection = $('#form-section');
                const $hiddenNominalInput = $('#selected-nominal');

                // BARU: Ambil elemen untuk menampilkan ringkasan
                const $summaryNominal = $('#summary-nominal');
                const $summaryHarga = $('#summary-harga');

                $diamondCards.on('click', function() {
                    const $clickedCard = $(this);

                    $diamondCards.removeClass('selected');
                    $clickedCard.addClass('selected');

                    // Ambil SEMUA data dari kartu yang di-klik
                    const nominalValue = $clickedCard.data('nominal-value'); // Untuk dikirim ke database (e.g., "86")
                    const nominalText = $clickedCard.data('nominal-text'); // Untuk ditampilkan (e.g., "86 Diamonds")
                    const harga = $clickedCard.data('harga'); // Untuk ditampilkan (e.g., "Rp 22.000")

                    // 1. Isi input tersembunyi (UNTUK DATABASE)
                    // Nilai ini (misal: "86") akan disimpan di kolom 'nominal' database Anda
                    $hiddenNominalInput.val(nominalValue);

                    // 2. BARU: Tampilkan detail pilihan di area ringkasan (UNTUK PENGGUNA)
                    $summaryNominal.text(nominalText);
                    $summaryHarga.text(harga);

                    // Tampilkan form jika masih tersembunyi
                    if ($formSection.is(':hidden')) {
                        $formSection.slideDown('fast');
                    }

                    $('html, body').animate({
                        scrollTop: $formSection.offset().top - 80
                    }, 300);
                });
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