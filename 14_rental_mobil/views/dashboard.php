<?php

ob_start();

?>

<!-- Statistik Dashboard -->
<div class="cards">

    <?php
    $stats = [
        ['Total Mobil', $s['mobil']],
        ['Tersedia', $s['tersedia']],
        ['Dirental', $s['dirental']],
        ['Pelanggan', $s['pelanggan']]
    ];
    ?>

    <?php foreach ($stats as $x): ?>

        <div class="card">

            <div class="muted">
                <?= htmlspecialchars($x[0]) ?>
            </div>

            <div class="num">
                <?= $x[1] ?>
            </div>

        </div>

    <?php endforeach; ?>

</div>


<!-- Rental Terbaru -->
<div class="panel">

    <h3>Rental Terbaru</h3>

    <table>

        <tr>
            <th>Mobil</th>
            <th>Pelanggan</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Total</th>
            <th>Status</th>
        </tr>

        <?php foreach ($data as $r): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($r['mobil']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['pelanggan']) ?>
                </td>

                <td>
                    <?= $r['tanggal_mulai'] ?>
                </td>

                <td>
                    <?= $r['tanggal_selesai'] ?>
                </td>

                <td>
                    Rp <?= number_format($r['total'], 0, ',', '.') ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['status']) ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</div>


<?php

$c = ob_get_clean();

require 'views/layout.php';

layout('Dashboard', $c);

?>