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

    <title>Absensi Siswa</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container form-container">

    <header class="header">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Absensi Siswa
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
                Nama Siswa
            </label>

            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($row['nama'] ?? '') ?>"
                required
            >


            <label>
                Kelas
            </label>

            <input
                type="text"
                name="kelas"
                value="<?= htmlspecialchars($row['kelas'] ?? '') ?>"
                required
            >


            <label>
                Tanggal
            </label>

            <input
                type="date"
                name="tanggal"
                value="<?= htmlspecialchars($row['tanggal'] ?? '') ?>"
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
                    value="Hadir"
                    <?= (($row['status'] ?? '') === 'Hadir') ? 'selected' : '' ?>
                >
                    Hadir
                </option>

                <option
                    value="Izin"
                    <?= (($row['status'] ?? '') === 'Izin') ? 'selected' : '' ?>
                >
                    Izin
                </option>

                <option
                    value="Sakit"
                    <?= (($row['status'] ?? '') === 'Sakit') ? 'selected' : '' ?>
                >
                    Sakit
                </option>

                <option
                    value="Alfa"
                    <?= (($row['status'] ?? '') === 'Alfa') ? 'selected' : '' ?>
                >
                    Alfa
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