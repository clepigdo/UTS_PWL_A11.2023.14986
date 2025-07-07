<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard <?= ucfirst(session()->get('role') ?? 'User') ?> - ClepStore</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?= base_url() ?>kaiadmin/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
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
                families: ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
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
    <link rel="stylesheet" href="<?= base_url() ?>kaiadmin/assets/css/demo.css" />


    <style>
        html,
        body {
            overflow: hidden;
            height: 100%;
        }

        .main-panel {
            height: 100vh;
            /* Tinggi panel utama setinggi layar */
            overflow-y: auto;
            /* Tampilkan scrollbar vertikal hanya jika dibutuhkan */
            display: flex;
            flex-direction: column;

        }

        .content {
            flex-grow: 1;
            /* Paksa area konten untuk meregang dan mendorong footer ke bawah */
            margin-top: 60px;
        }
    </style>


</head>

<body>
    <div class="wrapper">
        <?= $this->include('components/sidebar') ?>
        <div class="main-panel">
            <div class="main-header">
                <!-- ... (Isi main-header Anda tetap sama) ... -->
                <div class="main-header-logo">
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="<?= base_url() ?>kaiadmin/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                            <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
                        </div>
                        <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
                    </div>
                </div>
                <?= $this->include('components/header') ?>
            </div>

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

            <!-- HAPUS BLOK <style> YANG LAMA DARI SINI -->

        </div>
    </div>

    <!-- ... (semua tag <script> Anda di bawah sini) ... -->
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
        // ... (kode sparkline Anda) ...
    </script>
</body>

</html>