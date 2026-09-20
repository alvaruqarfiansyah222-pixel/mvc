<?php

ob_start();

?>

<!-- Form Data Buku -->
<div class="panel form">

    <form method="post" action="?page=buku&action=save">

        <input
            type="hidden"
            name="id"
            value="<?= $edit['id'] ?? '' ?>"
        >

        <input
            type="text"
            name="kode"
            placeholder="Kode buku"
            required
            value="<?= $edit['kode'] ?? '' ?>"
        >

        <input
            type="text"
            name="judul"
            placeholder="Judul"
            required
            value="<?= $edit['judul'] ?? '' ?>"
        >

        <input
            type="text"
            name="pengarang"
            placeholder="Pengarang"
            value="<?= $edit['pengarang'] ?? '' ?>"
        >

        <input
            type="text"
            name="penerbit"
            placeholder="Penerbit"
            value="<?= $edit['penerbit'] ?? '' ?>"
        >

        <input
            type="number"
            name="tahun"
            placeholder="Tahun"
            value="<?= $edit['tahun'] ?? '' ?>"
        >

        <input
            type="number"
            name="stok"
            placeholder="Stok"
            min="0"
            value="<?= $edit['stok'] ?? 0 ?>"
        >

        <button type="submit">
            Simpan
        </button>

    </form>

</div>


<!-- Tabel Data Buku -->
<div class="panel">

    <table>

        <tr>
            <th>Kode</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data as $r): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($r['kode']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['judul']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['pengarang']) ?>
                </td>

                <td>
                    <?= $r['stok'] ?>
                </td>

                <td>

                    <a
                        class="btn"
                        href="?page=buku&action=edit&id=<?= $r['id'] ?>"
                    >
                        Edit
                    </a>

                    <a
                        class="btn danger"
                        href="?page=buku&action=delete&id=<?= $r['id'] ?>"
                        onclick="return confirm('Yakin ingin menghapus buku ini?')"
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

layout('Data Buku', $c);

?>