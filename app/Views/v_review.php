<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    /* Hapus CSS yang menimpa layout utama */
    /* .main-panel {
        overflow-y: auto !important;
        height: 100vh !important;
    } */

    .page-inner {
        overflow-y: visible;
        min-height: 100vh;
    }

    .container {
        overflow: visible;
    }
</style>

<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Ulasan Pengguna</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Ulasan</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <!-- Form Ulasan -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Kirim Ulasan Anda</div>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php 
                        $submitUrl = ($role === 'admin') 
                            ? base_url('admin/ulasan/submit') 
                            : base_url('user/ulasan/submit');
                    ?>
                    <form action="<?= $submitUrl ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="username">Nama Pengguna</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?= session()->get('nama') ?? old('username') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating (1-5)</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5"
                                value="<?= old('rating') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Komentar</label>
                            <textarea class="form-control" id="comment" name="comment" rows="5"
                                required><?= old('comment') ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Daftar Ulasan -->
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Daftar Ulasan</div>
                </div>
                <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                    <?php if (empty($reviews)) : ?>
                        <p>Belum ada ulasan.</p>
                    <?php else : ?>
                        <div class="list-group">
                            <?php foreach ($reviews as $review) : ?>
                                <div class="list-group-item mb-3 shadow-sm rounded">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?= esc($review['username']) ?></h5>
                                        <small class="text-muted"><?= date('d M Y H:i', strtotime($review['created_at'])) ?></small>
                                    </div>
                                    <p class="mb-1">Rating:
                                        <?php for ($i = 0; $i < $review['rating']; $i++) : ?>
                                            <i class="fas fa-star text-warning"></i>
                                        <?php endfor; ?>
                                        <?php for ($i = $review['rating']; $i < 5; $i++) : ?>
                                            <i class="far fa-star text-warning"></i>
                                        <?php endfor; ?>
                                        (<?= $review['rating'] ?>/5)
                                    </p>
                                    <p class="mb-1"><?= esc($review['comment']) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
