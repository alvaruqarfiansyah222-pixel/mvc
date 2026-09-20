<?php

ob_start();

?>

<!-- Statistik Dashboard -->
<div class="cards">

    <?php
    $stats = [
        ['Total Buku', $s['buku']],
        ['Anggota', $s['anggota']],
        ['Dipinjam', $s['dipinjam']],
        ['Stok', $s['stok']]
    ];
    ?>

    <?php foreach ($stats as $x): ?>

        <div class="card">

            <div class="muted">
                <?= $x[0] ?>
            </div>

            <div class="num">
                <?= $x[1] ?>
            </div>

        </div>

    <?php endforeach; ?>

</div>


<!-- Peminjaman Terbaru -->
<div class="panel">

    <h3>Peminjaman Terbaru</h3>

    <table>

        <tr>
            <th>Buku</th>
            <th>Anggota</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>

        <?php foreach ($data as $r): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($r['judul']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['nama']) ?>
                </td>

                <td>
                    <?= $r['tanggal_pinjam'] ?>
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