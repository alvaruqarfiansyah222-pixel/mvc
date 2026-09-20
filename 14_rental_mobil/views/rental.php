<?php

ob_start();

?>

<!-- Form Rental -->
<div class="panel">

    <form method="post" action="?page=rental&action=save">

        <select name="id_mobil" required>

            <option value="">
                Pilih mobil
            </option>

            <?php foreach ($mobil as $m): ?>

                <option value="<?= $m['id'] ?>">

                    <?= htmlspecialchars($m['nama']) ?>
                    -
                    <?= htmlspecialchars($m['nopol']) ?>

                    (Rp <?= number_format($m['harga_harian'], 0, ',', '.') ?>/hari)

                </option>

            <?php endforeach; ?>

        </select>


        <select name="id_pelanggan" required>

            <option value="">
                Pilih pelanggan
            </option>

            <?php foreach ($pelanggan as $p): ?>

                <option value="<?= $p['id'] ?>">
                    <?= htmlspecialchars($p['nama']) ?>
                </option>

            <?php endforeach; ?>

        </select>


        <input
            type="date"
            name="tanggal_mulai"
            id="tanggal_mulai"
            required
        >


        <input
            type="date"
            name="tanggal_selesai"
            id="tanggal_selesai"
            required
        >


        <button type="submit">
            Simpan Rental
        </button>

    </form>

</div>


<!-- Data Rental -->
<div class="panel">

    <table>

        <tr>
            <th>Mobil</th>
            <th>Pelanggan</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
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

                <td>

                    <?php if ($r['status'] == 'Berjalan'): ?>

                        <a
                            class="btn"
                            href="?page=rental&action=selesai&id=<?= $r['id'] ?>"
                            onclick="return confirm('Yakin rental ini sudah selesai?')"
                        >
                            Selesai
                        </a>

                    <?php else: ?>

                        -

                    <?php endif; ?>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</div>


<script>
    const mulai = document.getElementById('tanggal_mulai');
    const selesai = document.getElementById('tanggal_selesai');

    mulai.addEventListener('change', function () {
        selesai.min = this.value;
    });
</script>


<?php

$c = ob_get_clean();

require 'views/layout.php';

layout('Rental', $c);

?>