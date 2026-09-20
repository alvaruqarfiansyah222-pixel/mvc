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

<div class="container">

    <div class="top">

        <div>

            <h1>
                Booking Lapangan
            </h1>

            <p>
                BOKING DIHOTEL KAMI
            </p>

        </div>


        <a
            class="btn"
            href="?action=create"
        >
            + Tambah Booking
        </a>

    </div>


    <div class="card">

        <div class="table-wrap">

            <table>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nama Pemesan</th>
                        <th>Lapangan</th>
                        <th>Jam</th>
                        <th>Jumlah Orang</th>
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
                                <?= htmlspecialchars($r['nama']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($r['lapangan']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($r['jam']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($r['jumlah_orang']) ?>
                            </td>

                            <td>

                                <a
                                    href="?action=edit&id=<?= $r['id'] ?>"
                                >
                                    Edit
                                </a>

                                |

                                <a
                                    class="danger"
                                    href="?action=delete&id=<?= $r['id'] ?>"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                >
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>