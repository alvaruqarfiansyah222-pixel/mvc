<?php

function layout($t, $c)
{
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($t) ?> - Rental Mobil
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="layout">

        <!-- SIDEBAR -->
        <aside class="side">

            <div class="brand">
                🚗 Rental Mobil
            </div>

            <nav>

                <a href="?page=dashboard">
                    Dashboard
                </a>

                <a href="?page=mobil">
                    Data Mobil
                </a>

                <a href="?page=pelanggan">
                    Data Pelanggan
                </a>

                <a href="?page=rental">
                    Rental
                </a>

                <a href="?page=laporan">
                    Laporan
                </a>

            </nav>

        </aside>


        <!-- CONTENT -->
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