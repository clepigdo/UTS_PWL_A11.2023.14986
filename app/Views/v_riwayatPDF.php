<?php
$bulanIndonesia = [
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
];

$bulanSekarang = $bulanIndonesia[date('F')];
$tahunSekarang = date('Y');
?>
<h1>Data Pemesanan Bulan <?= $bulanSekarang . ' ' . $tahunSekarang ?></h1>

<table border="1" width="100%" cellpadding="5">
    <tr>
        <th>No</th>
        <th>id User</th>
        <th>id Server</th>
        <th>Nominal</th>
        <th>Harga</th>
        <th>Metode Pembayaran</th>
        <th>Status Pembayaran</th>
        <th>Tanggal</th>
    </tr>

        <?php
        $no = 1;
        foreach ($topups as $row) : 
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['user_id'] ?></td>
            <td><?= $row['server_id'] ?></td>
            <td><?= $row['nominal'] ?></td>
            <td><?= "Rp " . number_format($row['harga'], 0, ",", ".") ?></td>
            <td><?= $row['metode_pembayaran'] ?></td>
            <td><?= $row['status_pembayaran'] ?></td>
            <td><?= date('Y-m-d H:i', strtotime($row['created_at'])) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
Downloaded on <?= date("Y-m-d H:i:s") ?>