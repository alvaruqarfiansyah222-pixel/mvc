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

<main class="container">

    <header class="header">

        <div>

            <h1>
                Data Guru
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
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Mapel</th>
                        <th>No HP</th>
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
                                <?= htmlspecialchars((string) $r['nama']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['nip']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['mapel']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['no_hp']) ?>
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