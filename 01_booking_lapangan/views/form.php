<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Booking Lapangan</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<div class="container small">

    <div class="top">

        <h1>
            <?= $row ? 'Edit' : 'Tambah' ?> Booking Lapangan
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
                Nama Pemesan
            </label>

            <input
                type="text"
                name="nama"
                value="<?= htmlspecialchars($row['nama'] ?? '') ?>"
                required
            >


            <label>
                Lapangan
            </label>

            <select
                name="lapangan"
                required
            >

                <option
                    value="Lapangan A"
                    <?= (($row['lapangan'] ?? '') === 'Lapangan A') ? 'selected' : '' ?>
                >
                    Lapangan A
                </option>

                <option
                    value="Lapangan B"
                    <?= (($row['lapangan'] ?? '') === 'Lapangan B') ? 'selected' : '' ?>
                >
                    Lapangan B
                </option>

                <option
                    value="Lapangan C"
                    <?= (($row['lapangan'] ?? '') === 'Lapangan C') ? 'selected' : '' ?>
                >
                    Lapangan C
                </option>

            </select>


            <label>
                Jam
            </label>

            <select
                name="jam"
                required
            >

                <option
                    value="06:00 - 09:00"
                    <?= (($row['jam'] ?? '') === '06:00 - 09:00') ? 'selected' : '' ?>
                >
                    06:00 - 09:00
                </option>

                <option
                    value="09:00 - 12:00"
                    <?= (($row['jam'] ?? '') === '09:00 - 12:00') ? 'selected' : '' ?>
                >
                    09:00 - 12:00
                </option>

                <option
                    value="13:00 - 16:00"
                    <?= (($row['jam'] ?? '') === '13:00 - 16:00') ? 'selected' : '' ?>
                >
                    13:00 - 16:00
                </option>

                <option
                    value="16:00 - 19:00"
                    <?= (($row['jam'] ?? '') === '16:00 - 19:00') ? 'selected' : '' ?>
                >
                    16:00 - 19:00
                </option>

            </select>


            <label>
                Jumlah Orang
            </label>

            <input
                type="number"
                name="jumlah_orang"
                value="<?= htmlspecialchars($row['jumlah_orang'] ?? '') ?>"
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