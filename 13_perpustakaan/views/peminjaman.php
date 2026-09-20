<?php

ob_start();

?>

<!-- Form Peminjaman -->
<div class="panel">

    <form method="post" action="?page=peminjaman&action=save">

        <!-- Pilih Buku -->
        <select name="id_buku" required>

            <option value="">
                Pilih buku
            </option>

            <?php foreach ($buku as $b): ?>

                <?php if ($b['stok'] > 0): ?>

                    <option value="<?= $b['id'] ?>">
                        <?= htmlspecialchars($b['judul']) ?>
                        (stok <?= $b['stok'] ?>)
                    </option>

                <?php endif; ?>

            <?php endforeach; ?>

        </select>


        <!-- Pilih Anggota -->
        <select name="id_anggota" required>

            <option value="">
                Pilih anggota
            </option>

            <?php foreach ($anggota as $a): ?>

                <option value="<?= $a['id'] ?>">
                    <?= htmlspecialchars($a['nama']) ?>
                </option>

            <?php endforeach; ?>

        </select>


        <button type="submit">
            Pinjam
        </button>

    </form>

</div>


<!-- Data Peminjaman -->
<div class="panel">

    <table>

        <tr>
            <th>Buku</th>
            <th>Anggota</th>
            <th>Pinjam</th>
            <th>Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
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

                <td>

                    <?php if ($r['status'] == 'Dipinjam'): ?>

                        <a
                            class="btn"
                            href="?page=peminjaman&action=kembali&id=<?= $r['id'] ?>"
                            onclick="return confirm('Yakin buku ini sudah dikembalikan?')"
                        >
                            Kembalikan
                        </a>

                    <?php else: ?>

                        -

                    <?php endif; ?>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</div>


<?php

$c = ob_get_clean();

require 'views/layout.php';

layout('Peminjaman', $c);

?>