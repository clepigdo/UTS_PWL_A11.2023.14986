<!-- app/Views/v_login.php -->
<?= $this->extend('layout_clear') ?>
<?= $this->section('content') ?>

<!-- CSS khusus login, langsung di sini -->
<style>
  body {
    background: linear-gradient(to right, #2b2b52, #1e1e2f);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;
  }

  .login-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    width: 100%;
    max-width: 400px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
  }

  .login-logo img {
    width: 100px;
    margin-bottom: 20px;
  }

  .form-control {
    border-radius: 10px;
  }

  .btn-login {
    background-color: #4b6cb7;
    background-image: linear-gradient(to right, #182848, #4b6cb7);
    border: none;
    border-radius: 10px;
    padding: 10px;
    color: white;
  }

  .btn-login:hover {
    background-image: linear-gradient(to right, #4b6cb7, #182848);
  }

  .form-label {
    font-weight: bold;
  }
</style>

<div class="login-card text-center">
  <div class="login-logo">
    <img src="<?= base_url('images/logoku.png') ?>" alt="ClepTopup Logo">
  </div>
  <h3 class="mb-4">Welcome To ClepStore</h3>

  <?php if (session()->getFlashData('failed')): ?>
    <div class="alert alert-danger"><?= session()->getFlashData('failed') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashData('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashData('success') ?></div>
  <?php endif; ?>

  <?= form_open('login', ['class' => 'row g-3 needs-validation', 'novalidate' => '']) ?>

  <div class="col-12 text-start">
    <label for="username" class="form-label">Username</label>
    <?= form_input([
      'name'        => 'username',
      'id'          => 'username',
      'class'       => 'form-control',
      'placeholder' => 'Enter username',
      'required'    => ''
    ]) ?>
    <div class="invalid-feedback">Please enter your username.</div>
  </div>

  <div class="col-12 text-start">
    <label for="password" class="form-label">Password</label>
    <?= form_password([
      'name'        => 'password',
      'id'          => 'password',
      'class'       => 'form-control',
      'placeholder' => 'Password',
      'required'    => ''
    ]) ?>
    <div class="invalid-feedback">Please enter your password!</div>
  </div>

  <div class="col-12 d-grid">
    <?= form_submit('submit', 'Login', ['class' => 'btn btn-login']) ?>
  </div>

  <?= form_close() ?>

  <!-- ▼▼▼ TAMBAHKAN BAGIAN INI ▼▼▼ -->
  <div class="mt-4">
    <small>Belum punya akun? <a href="<?= base_url('register') ?>" class="text-warning fw-bold">Daftar di sini</a></small>
  </div>
  <!-- ▲▲▲ AKHIR DARI BAGIAN YANG DITAMBAHKAN ▲▲▲ -->

</div>

<!-- JS untuk validasi Bootstrap 5 -->
<script>
  (function() {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>

<?= $this->endSection() ?>