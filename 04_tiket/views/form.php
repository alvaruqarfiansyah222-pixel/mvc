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

    <title>Tiket</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<div class="container small">

    <div class="top">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Tiket
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
                Nama Pembeli
            </label>

            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($row['nama'] ?? '') ?>"
                required
            >


            <label>
                Kategori Tiket
            </label>

            <select
                name="kategori"
                required
            >

                <option
                    value="Reguler"
                    <?= (($row['kategori'] ?? '') === 'Reguler') ? 'selected' : '' ?>
                >
                    Reguler
                </option>

                <option
                    value="VIP"
                    <?= (($row['kategori'] ?? '') === 'VIP') ? 'selected' : '' ?>
                >
                    VIP
                </option>

                <option
                    value="VVIP"
                    <?= (($row['kategori'] ?? '') === 'VVIP') ? 'selected' : '' ?>
                >
                    VVIP
                </option>

            </select>


            <label>
                Jumlah Tiket
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