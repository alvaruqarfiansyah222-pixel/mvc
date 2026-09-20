<?php

ob_start();

?>

<div class="panel">

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

layout('Laporan', $c);

?>