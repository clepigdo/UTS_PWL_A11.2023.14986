<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Cek Pemesanan</h4>
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
                <a href="#">Admin</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Cek Pemesanan</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Cari Pesanan Berdasarkan ID</div>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/cek_pemesanan') ?>" method="get">
                        <div class="form-group">
                            <label for="order_id">ID Pesanan</label>
                            <input type="text" class="form-control" id="order_id" name="order_id" 
                                placeholder="Masukkan ID Pesanan" value="<?= esc($input_order_id ?? '') ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cari Pesanan</button>
                    </form>

                    <?php if ($order) : ?>
                        <div class="mt-4">
                            <h5>Detail Pesanan (ID: <?= esc($order['id']) ?>)</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>User ID Game</th>
                                            <td><?= esc($order['user_id']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Server ID</th>
                                            <td><?= esc($order['server_id']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nominal</th>
                                            <td><?= esc($order['nominal']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td><?= esc($order['harga']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Metode Pembayaran</th>
                                            <td><?= esc($order['metode_pembayaran']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status Pembayaran</th>
                                            <td><?= esc($order['status_pembayaran']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Pemesanan</th>
                                            <td><?= esc($order['created_at']) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php elseif ($input_order_id) : ?>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>