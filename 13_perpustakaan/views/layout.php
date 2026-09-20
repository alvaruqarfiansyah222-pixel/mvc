<?php

function layout($t, $c)
{
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($t) ?> - Perpustakaan</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="layout">

        <!-- Sidebar -->
        <aside class="side">

            <div class="brand">
                📚 Perpustakaan
            </div>

            <nav>
                <a href="?page=dashboard">Dashboard</a>
                <a href="?page=buku">Data Buku</a>
                <a href="?page=anggota">Data Anggota</a>
                <a href="?page=peminjaman">Peminjaman</a>
                <a href="?page=laporan">Laporan</a>
            </nav>

        </aside>

        <!-- Konten -->
        <main class="main">

            <h2>
                <?= htmlspecialchars($t) ?>
            </h2>

            <?= $c ?>

        </main>

    </div>

</body>

</html>

<?php
}
?>