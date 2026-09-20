<?php

ob_start();

?>

<!-- Form Data Mobil -->
<div class="panel form">

    <form method="post" action="?page=mobil&action=save">

        <input
            type="hidden"
            name="id"
            value="<?= $edit['id'] ?? '' ?>"
        >

        <input
            type="text"
            name="nopol"
            placeholder="Nomor polisi"
            required
            value="<?= htmlspecialchars($edit['nopol'] ?? '') ?>"
        >

        <input
            type="text"
            name="nama"
            placeholder="Nama mobil"
            required
            value="<?= htmlspecialchars($edit['nama'] ?? '') ?>"
        >

        <input
            type="text"
            name="merk"
            placeholder="Merek"
            value="<?= htmlspecialchars($edit['merk'] ?? '') ?>"
        >

        <input
            type="number"
            name="tahun"
            placeholder="Tahun"
            value="<?= htmlspecialchars($edit['tahun'] ?? '') ?>"
        >

        <input
            type="number"
            name="harga_harian"
            placeholder="Harga per hari"
            required
            min="0"
            value="<?= htmlspecialchars($edit['harga_harian'] ?? '') ?>"
        >

        <button type="submit">
            Simpan
        </button>

    </form>

</div>


<!-- Tabel Data Mobil -->
<div class="panel">

    <table>

        <tr>
            <th>No Polisi</th>
            <th>Mobil</th>
            <th>Merek</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data as $r): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($r['nopol']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['nama']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['merk']) ?>
                </td>

                <td>
                    Rp <?= number_format($r['harga_harian'], 0, ',', '.') ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['status']) ?>
                </td>

                <td>

                    <a
                        class="btn"
                        href="?page=mobil&action=edit&id=<?= $r['id'] ?>"
                    >
                        Edit
                    </a>

                    <a
                        class="btn danger"
                        href="?page=mobil&action=delete&id=<?= $r['id'] ?>"
                        onclick="return confirm('Yakin ingin menghapus mobil ini?')"
                    >
                        Hapus
                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</div>


<?php

$c = ob_get_clean();

require 'views/layout.php';

layout('Data Mobil', $c);

?>