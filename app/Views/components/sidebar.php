<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="<?= base_url('/') ?>" class="logo">
                <img
                    src="<?= base_url('images/logoku.png') ?>"
                    alt="navbar brand"
                    class="navbar-brand mt-4"
                    height="50" />
                <h3 class="ms-4 mt-4 text-white">ClepStore</h3>
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

    <?php 
        $uri = service('uri');
        $segment1 = $uri->getSegment(1); // Role: admin/user
        $segment2 = $uri->getSegment(2); // Page: dashboard/ulasan/v_topup/etc
        $currentUrl = current_url();
    ?>

    <!-- ✅ Scroll CSS native ditambahkan di sini -->
    <div class="sidebar-wrapper" style="overflow-y: auto; max-height: 100vh;">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                
                <li class="nav-item <?= ($segment2 == 'dashboard') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url(session()->get('role') . '/dashboard') ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item <?= ($segment2 == 'v_topup') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url(session()->get('role') . '/v_topup') ?>">
                        <i class="fas fa-layer-group"></i>
                        <p>Topup</p>
                    </a>
                </li>

                <li class="nav-item <?= ($segment2 == 'riwayat_pemesanan') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url(session()->get('role') . '/riwayat_pemesanan') ?>">
                        <i class="fas fa-th-list"></i>
                        <p>Riwayat Pemesanan</p>
                    </a>
                </li>

                <?php if (session()->get('role') === 'admin') : ?>
                    <li class="nav-item <?= ($segment2 == 'cek_pemesanan') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('admin/cek_pemesanan') ?>">
                            <i class="fas fa-check-circle"></i>
                            <p>Cek Pemesanan</p>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-item <?= ($segment2 == 'ulasan') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url(session()->get('role') . '/ulasan') ?>">
                        <i class="fas fa-comments"></i>
                        <p>Ulasan</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
