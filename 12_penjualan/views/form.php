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

    <title>Penjualan</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container form-container">

    <header class="header">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Penjualan
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
                Produk
            </label>

            <input
                type="text"
                name="produk"
                value="<?= htmlspecialchars($row['produk'] ?? '') ?>"
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
                    value="Fashion"
                    <?= (($row['kategori'] ?? '') === 'Fashion') ? 'selected' : '' ?>
                >
                    Fashion
                </option>

                <option
                    value="Makanan"
                    <?= (($row['kategori'] ?? '') === 'Makanan') ? 'selected' : '' ?>
                >
                    Makanan
                </option>

                <option
                    value="Lainnya"
                    <?= (($row['kategori'] ?? '') === 'Lainnya') ? 'selected' : '' ?>
                >
                    Lainnya
                </option>

            </select>


            <label>
                Harga
            </label>

            <input
                type="number"
                name="harga"
                value="<?= htmlspecialchars($row['harga'] ?? '') ?>"
                min="0"
                required
            >


            <label>
                Jumlah
            </label>

            <input
                type="number"
                name="jumlah"
                value="<?= htmlspecialchars($row['jumlah'] ?? '') ?>"
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