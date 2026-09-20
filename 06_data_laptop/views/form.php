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

    <title>Data Laptop</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container form-container">

    <header class="header">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Data Laptop
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
                Pemilik
            </label>

            <input
                type="text"
                name="pemilik"
                value="<?= htmlspecialchars($row['pemilik'] ?? '') ?>"
                required
            >


            <label>
                Merek
            </label>

            <input
                type="text"
                name="merek"
                value="<?= htmlspecialchars($row['merek'] ?? '') ?>"
                required
            >


            <label>
                Tipe
            </label>

            <input
                type="text"
                name="tipe"
                value="<?= htmlspecialchars($row['tipe'] ?? '') ?>"
                required
            >


            <label>
                Tahun
            </label>

            <input
                type="number"
                name="tahun"
                value="<?= htmlspecialchars($row['tahun'] ?? '') ?>"
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