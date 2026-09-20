<?php

$row = $row ?? null;

?>

<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Rental</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<div class="container small">

    <div class="top">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Rental
        </h1>

        <a href="index.php">
            ← Kembali
        </a>

    </div>


    <div class="card">

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
                Nama Penyewa
            </label>

            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($row['nama'] ?? '') ?>"
                required
            >


            <label>
                Barang
            </label>

            <select
                name="barang"
                required
            >

                <option
                    value="Motor"
                    <?= (($row['barang'] ?? '') === 'Motor') ? 'selected' : '' ?>
                >
                    Motor
                </option>

                <option
                    value="Mobil"
                    <?= (($row['barang'] ?? '') === 'Mobil') ? 'selected' : '' ?>
                >
                    Mobil
                </option>

                <option
                    value="Laptop"
                    <?= (($row['barang'] ?? '') === 'Laptop') ? 'selected' : '' ?>
                >
                    Laptop
                </option>

                <option
                    value="Kamera"
                    <?= (($row['barang'] ?? '') === 'Kamera') ? 'selected' : '' ?>
                >
                    Kamera
                </option>

            </select>


            <label>
                Lama Sewa (hari)
            </label>

            <input
                type="number"
                name="lama"
                value="<?= htmlspecialchars($row['lama'] ?? '') ?>"
                min="1"
                required
            >


            <label>
                Jumlah
            </label>

            <input
                type="number"
                name="jumlah"
                value="<?= htmlspecialchars($row['jumlah'] ?? '') ?>"
                min="1"
                required
            >


            <button
                class="btn"
                type="submit"
            >
                Simpan
            </button>

        </form>

    </div>

</div>

</body>

</html>