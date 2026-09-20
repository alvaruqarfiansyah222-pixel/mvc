<?php

ob_start();

?>

<!-- Form Data Pelanggan -->
<div class="panel form">

    <form method="post" action="?page=pelanggan&action=save">

        <input
            type="hidden"
            name="id"
            value="<?= $edit['id'] ?? '' ?>"
        >

        <input
            type="text"
            name="nama"
            placeholder="Nama"
            required
            value="<?= htmlspecialchars($edit['nama'] ?? '') ?>"
        >

        <input
            type="text"
            name="no_telepon"
            placeholder="No. telepon"
            value="<?= htmlspecialchars($edit['no_telepon'] ?? '') ?>"
        >

        <input
            type="text"
            name="alamat"
            placeholder="Alamat"
            value="<?= htmlspecialchars($edit['alamat'] ?? '') ?>"
        >

        <button type="submit">
            Simpan
        </button>

    </form>

</div>


<!-- Tabel Data Pelanggan -->
<div class="panel">

    <table>

        <tr>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data as $r): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($r['nama']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['no_telepon']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['alamat']) ?>
                </td>

                <td>

                    <a
                        class="btn"
                        href="?page=pelanggan&action=edit&id=<?= $r['id'] ?>"
                    >
                        Edit
                    </a>

                    <a
                        class="btn danger"
                        href="?page=pelanggan&action=delete&id=<?= $r['id'] ?>"
                        onclick="return confirm('Yakin ingin menghapus pelanggan ini?')"
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

layout('Data Pelanggan', $c);

?>