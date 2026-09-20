<?php

$row = $row ?? null;

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Perpustakaan</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container form-container">

    <header class="header">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Perpustakaan
        </h1>

        <a href="index.php">
            ← Kembali
        </a>

    </header>


    <section class="card">

        <?php if (!empty($error)): ?>

            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>

        <?php endif; ?>


        <form
            method="post"
            action="<?= $row ? '?action=update' : '?action=store' ?>"
        >

            <?php if ($row): ?>

                <input
                    type="hidden"
                    name="id"
                    value="<?= htmlspecialchars($row['id']) ?>"
                >

            <?php endif; ?>


            <label>
                Nama Peminjam
            </label>

            <input
                type="text"
                name="nama_peminjam"
                value="<?= htmlspecialchars($row['nama_peminjam'] ?? '') ?>"
                required
            >


            <label>
                Buku
            </label>

            <input
                type="text"
                name="buku"
                value="<?= htmlspecialchars($row['buku'] ?? '') ?>"
                required
            >


            <label>
                Tanggal Pinjam
            </label>

            <input
                type="date"
                name="tanggal_pinjam"
                value="<?= htmlspecialchars($row['tanggal_pinjam'] ?? '') ?>"
                required
            >


            <label>
                Lama Pinjam (hari)
            </label>

            <input
                type="number"
                name="lama_pinjam"
                value="<?= htmlspecialchars($row['lama_pinjam'] ?? '') ?>"
                min="0"
                required
            >


            <button
                class="btn"
                type="submit"
            >
                Simpan
            </button>

        </form>

    </section>

</main>

</body>

</html>