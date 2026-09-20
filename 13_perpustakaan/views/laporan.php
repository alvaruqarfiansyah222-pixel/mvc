<?php

ob_start();

?>

<!-- Laporan Peminjaman -->
<div class="panel">

    <table>

        <tr>
            <th>Buku</th>
            <th>Anggota</th>
            <th>Pinjam</th>
            <th>Kembali</th>
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
                    <?= $r['tanggal_kembali'] ?? '-' ?>
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