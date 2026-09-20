<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Booking Hotel - MVC</title>

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
                Booking Hotel
            </h1>

            <p>
                Contoh MVC PHP + MySQL untuk latihan ujian.
            </p>

        </div>


        <a
            class="btn"
            href="?action=create"
        >
            + Tambah Data
        </a>

    </div>


    <div class="card">

        <div class="table-wrap">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tipe Kamar</th>
                        <th>Malam</th>
                        <th>Orang</th>
                        <th>Harga Per Malam</th>
                        <th>Total</th>
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
                                <?= htmlspecialchars((string) $r['tipe_kamar']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['malam']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['orang']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['harga_per_malam']) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars((string) $r['total']) ?>
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
                                    onclick="return confirm('Hapus data ini?')"
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