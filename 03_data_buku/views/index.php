<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Data Buku</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<main class="container">

    <header class="header">

        <div>

            <h1>
                Data Buku
            </h1>

            <p>
                Latihan PHP MVC + MySQL untuk persiapan ujian.
            </p>

        </div>


        <a
            class="btn"
            href="?action=create"
        >
            + Tambah Data
        </a>

    </header>


    <section class="card">

        <div class="table-wrap">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody>

                    <?php foreach ($rows as $r): ?>

                        <tr>

                            <td>
                                <?= $r['id'] ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['judul']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['penulis']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['kategori']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['stok']) ?>
                            </td>


                            <td>

                                <a
                                    href="?action=edit&id=<?= $r['id'] ?>"
                                >
                                    Edit
                                </a>

                                <span>
                                    |
                                </span>

                                <a
                                    class="danger"
                                    href="?action=delete&id=<?= $r['id'] ?>"
                                    onclick="return confirm('Yakin hapus data?')"
                                >
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </section>

</main>

</body>

</html>