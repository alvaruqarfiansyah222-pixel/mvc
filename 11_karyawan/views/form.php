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

    <title>Data Karyawan</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container form-container">

    <header class="header">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Data Karyawan
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
                Nama Karyawan
            </label>

            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($row['nama'] ?? '') ?>"
                required
            >


            <label>
                Jabatan
            </label>

            <input
                type="text"
                name="jabatan"
                value="<?= htmlspecialchars($row['jabatan'] ?? '') ?>"
                required
            >


            <label>
                Gaji
            </label>

            <input
                type="number"
                name="gaji"
                value="<?= htmlspecialchars($row['gaji'] ?? '') ?>"
                min="0"
                required
            >


            <label>
                Status
            </label>

            <select
                name="status"
                required
            >

                <option
                    value="Tetap"
                    <?= (($row['status'] ?? '') === 'Tetap') ? 'selected' : '' ?>
                >
                    Tetap
                </option>

                <option
                    value="Kontrak"
                    <?= (($row['status'] ?? '') === 'Kontrak') ? 'selected' : '' ?>
                >
                    Kontrak
                </option>

                <option
                    value="Magang"
                    <?= (($row['status'] ?? '') === 'Magang') ? 'selected' : '' ?>
                >
                    Magang
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