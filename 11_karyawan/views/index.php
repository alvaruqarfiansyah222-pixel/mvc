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

<main class="container">

    <header class="header">

        <div>

            <h1>
                Data Karyawan
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
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>Status</th>
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
                                <?= htmlspecialchars((string) $r['jabatan']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['gaji']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['status']) ?>
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