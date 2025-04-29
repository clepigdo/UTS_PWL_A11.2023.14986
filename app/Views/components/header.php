<nav
    class="navbar bg-header navbar-header  navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
            <form class="w-200">
                <div class="input-group" style="width: 400px; margin-left: 10px;">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Search ..." />
                </div>
            </form>
        </nav>

        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <li
                class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true">
                    <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-search animated fadeIn ">
                    <form class="navbar-left navbar-form nav-search">
                        <div class="input-group">
                            <input
                                type="text"
                                placeholder="Search ..."
                                class="form-control p-3" />
                        </div>
                    </form>
                </ul>
            </li>
            <li class="nav-item topbar-user dropdown hidden-caret">
                <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false">
                    <div class="avatar-sm">
                        <img
                            src="<?= base_url() ?>kaiadmin/assets/img/profile.jpg"
                            alt="..."
                            class="avatar-img rounded-circle" />
                    </div>
                    <span class="profile-username">
                        <span class=" text-white op-7">Hi,</span>
                        <span class=" text-white fw-bold"><?= session()->get('username'); ?> (<?= session()->get('role'); ?>)</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <img
                                        src="<?= base_url() ?>kaiadmin/assets/img/profile.jpg"
                                        alt="image profile"
                                        class="avatar-img rounded" />
                                </div>
                                <div class="u-text">
                                    <h4>ClepStore</h4>
                                    <p class="text-muted">clepstore12@gmail.com</p>

                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('index.php/logout') ?>">Logout</a>

                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>