<?php

ob_start();

?>

<!-- Form Data Anggota -->
<div class="panel form">

    <form method="post" action="?page=anggota&action=save">

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
            value="<?= $edit['nama'] ?? '' ?>"
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
            value="<?= $edit['email'] ?? '' ?>"
        >

        <input
            type="text"
            name="telepon"
            placeholder="Telepon"
            value="<?= $edit['telepon'] ?? '' ?>"
        >

        <button type="submit">
            Simpan
        </button>

    </form>

</div>


<!-- Tabel Data Anggota -->
<div class="panel">

    <table>

        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($data as $r): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($r['nama']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['email']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($r['telepon']) ?>
                </td>

                <td>

                    <a
                        class="btn"
                        href="?page=anggota&action=edit&id=<?= $r['id'] ?>"
                    >
                        Edit
                    </a>

                    <a
                        class="btn danger"
                        href="?page=anggota&action=delete&id=<?= $r['id'] ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')"
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

layout('Data Anggota', $c);

?>