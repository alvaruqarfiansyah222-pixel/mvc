<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Data Guru</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container form-container">

    <header class="header">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Data Guru
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
                    value="<?= $row['id'] ?>"
                >

            <?php endif; ?>


            <label>
                Nama Guru
            </label>

            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($row['nama'] ?? '') ?>"
                required
            >


            <label>
                NIP
            </label>

            <input
                type="text"
                name="nip"
                value="<?= htmlspecialchars($row['nip'] ?? '') ?>"
                required
            >


            <label>
                Mata Pelajaran
            </label>

            <input
                type="text"
                name="mapel"
                value="<?= htmlspecialchars($row['mapel'] ?? '') ?>"
                required
            >


            <label>
                No. HP
            </label>

            <input
                type="text"
                name="no_hp"
                value="<?= htmlspecialchars($row['no_hp'] ?? '') ?>"
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