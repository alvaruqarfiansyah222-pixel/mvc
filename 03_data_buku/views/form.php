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

    <title>Data Buku</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container form-container">

    <header class="header">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Data Buku
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
                Judul Buku
            </label>

            <input
                type="text"
                name="judul"
                value="<?= htmlspecialchars($row['judul'] ?? '') ?>"
                required
            >


            <label>
                Penulis
            </label>

            <input
                type="text"
                name="penulis"
                value="<?= htmlspecialchars($row['penulis'] ?? '') ?>"
                required
            >


            <label>
                Kategori
            </label>

            <select
                name="kategori"
                required
            >

                <option
                    value="Pelajaran"
                    <?= (($row['kategori'] ?? '') === 'Pelajaran') ? 'selected' : '' ?>
                >
                    Pelajaran
                </option>

                <option
                    value="Novel"
                    <?= (($row['kategori'] ?? '') === 'Novel') ? 'selected' : '' ?>
                >
                    Novel
                </option>

                <option
                    value="Teknologi"
                    <?= (($row['kategori'] ?? '') === 'Teknologi') ? 'selected' : '' ?>
                >
                    Teknologi
                </option>

                <option
                    value="Referensi"
                    <?= (($row['kategori'] ?? '') === 'Referensi') ? 'selected' : '' ?>
                >
                    Referensi
                </option>

            </select>


            <label>
                Stok
            </label>

            <input
                type="number"
                name="stok"
                value="<?= htmlspecialchars($row['stok'] ?? '') ?>"
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