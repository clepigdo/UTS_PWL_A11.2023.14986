<!-- app/Views/v_register.php -->
<?= $this->extend('layout_clear') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: linear-gradient(to right, #2b2b52, #1e1e2f);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
    }

    .register-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .register-logo img {
        width: 80px;
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-register {
        background-color: #ffc107;
        border: none;
        border-radius: 10px;
        color: #182848;
        font-weight: bold;
    }

    .btn-register:hover {
        background-color: #ffca2c;
    }
</style>

<div class="register-card text-center">
    <div class="register-logo">
        <img src="<?= base_url('images/logoku.png') ?>" alt="ClepTopup Logo">
    </div>
    <h3 class="mb-4">Buat Akun ClepStore</h3>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0 ps-3">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= form_open('register') ?>
    <div class="mb-3 text-start">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap" value="<?= old('nama') ?>" required>
    </div>
    <div class="mb-3 text-start">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Buat username unik" value="<?= old('username') ?>" required>
    </div>
    <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Minimal 6 karakter" required>
    </div>
    <div class="mb-3 text-start">
        <label for="pass_confirm" class="form-label">Konfirmasi Password</label>
        <input type="password" name="pass_confirm" id="pass_confirm" class="form-control" placeholder="Ketik ulang password" required>
    </div>
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-register p-2">Register</button>
    </div>
    <div class="mt-3">
        <small>Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-warning fw-bold">Login di sini</a></small>
    </div>
    <?= form_close() ?>
</div>

<?= $this->endSection() ?>