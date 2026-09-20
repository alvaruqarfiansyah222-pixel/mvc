<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Booking Hotel</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<div class="container small">

    <div class="top">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Booking Hotel
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
                    value="<?= $row['id'] ?>"
                >

            <?php endif; ?>


            <label>
                Nama Tamu
            </label>

            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($row['nama'] ?? '') ?>"
                required
            >


            <label>
                Tipe Kamar
            </label>

            <select
                name="tipe_kamar"
                required
            >

                <option
                    value="Standard"
                    <?= (($row['tipe_kamar'] ?? '') === 'Standard') ? 'selected' : '' ?>
                >
                    Standard
                </option>

                <option
                    value="Deluxe"
                    <?= (($row['tipe_kamar'] ?? '') === 'Deluxe') ? 'selected' : '' ?>
                >
                    Deluxe
                </option>

                <option
                    value="Suite"
                    <?= (($row['tipe_kamar'] ?? '') === 'Suite') ? 'selected' : '' ?>
                >
                    Suite
                </option>

            </select>


            <label>
                Jumlah Malam
            </label>

            <input
                type="number"
                name="malam"
                value="<?= htmlspecialchars($row['malam'] ?? '') ?>"
                required
                min="1"
            >


            <label>
                Jumlah Orang
            </label>

            <input
                type="number"
                name="orang"
                value="<?= htmlspecialchars($row['orang'] ?? '') ?>"
                required
                min="1"
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