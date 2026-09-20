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

    <title>Inventaris Barang</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container form-container">

    <header class="header">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Inventaris Barang
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
                Nama Barang
            </label>

            <input
                type="text"
                name="nama_barang"
                value="<?= htmlspecialchars($row['nama_barang'] ?? '') ?>"
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
                    value="Elektronik"
                    <?= (($row['kategori'] ?? '') === 'Elektronik') ? 'selected' : '' ?>
                >
                    Elektronik
                </option>

                <option
                    value="Furniture"
                    <?= (($row['kategori'] ?? '') === 'Furniture') ? 'selected' : '' ?>
                >
                    Furniture
                </option>

                <option
                    value="ATK"
                    <?= (($row['kategori'] ?? '') === 'ATK') ? 'selected' : '' ?>
                >
                    ATK
                </option>

                <option
                    value="Lainnya"
                    <?= (($row['kategori'] ?? '') === 'Lainnya') ? 'selected' : '' ?>
                >
                    Lainnya
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


            <label>
                Kondisi
            </label>

            <select
                name="kondisi"
                required
            >

                <option
                    value="Baik"
                    <?= (($row['kondisi'] ?? '') === 'Baik') ? 'selected' : '' ?>
                >
                    Baik
                </option>

                <option
                    value="Rusak Ringan"
                    <?= (($row['kondisi'] ?? '') === 'Rusak Ringan') ? 'selected' : '' ?>
                >
                    Rusak Ringan
                </option>

                <option
                    value="Rusak Berat"
                    <?= (($row['kondisi'] ?? '') === 'Rusak Berat') ? 'selected' : '' ?>
                >
                    Rusak Berat
                </option>

            </select>


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