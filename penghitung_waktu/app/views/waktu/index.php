```php
<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="container">
    <header class="topbar">
        <div>
            <h1>Penghitung Waktu</h1>
            <p>Halo, <?= htmlspecialchars($_SESSION['user']['nama']) ?>!</p>
        </div>

        <a class="btn danger-btn" href="index.php?page=logout">Logout</a>
    </header>

    <?php if (!empty($_SESSION['alert'])): ?>
        <div class="alert <?= $_SESSION['alert']['type'] ?>">
            <?= htmlspecialchars($_SESSION['alert']['message']) ?>
        </div>

        <?php unset($_SESSION['alert']); ?>
    <?php endif; ?>

    <div class="card">
        <h2>Hitung Selisih Waktu</h2>
        <p class="muted">Masukkan waktu mulai dan waktu selesai.</p>

        <form method="POST">
            <div class="grid">
                <div>
                    <label>Waktu Mulai</label>
                    <input type="time" name="mulai" required>
                </div>

                <div>
                    <label>Waktu Selesai</label>
                    <input type="time" name="selesai" required>
                </div>
            </div>

            <button class="btn">Hitung Waktu</button>
        </form>
    </div>

    <?php if ($hasil && $hasil['success']): ?>
        <div class="card result">
            <h2>Hasil Perhitungan</h2>

            <div class="result-number">
                <?= $hasil['jam'] ?> jam
                <?= $hasil['menit'] ?> menit
                <?= $hasil['detik'] ?> detik
            </div>

            <p>Selisih waktu berhasil dihitung.</p>
        </div>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
```
