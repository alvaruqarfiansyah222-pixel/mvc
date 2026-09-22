<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="auth-wrap">
    <div class="auth-card">

        <h1>Penghitung Waktu</h1>

        <p class="muted">
            Silakan login untuk melanjutkan.
        </p>

        <?php if (!empty($_SESSION['alert'])): ?>
            <div class="alert <?= $_SESSION['alert']['type'] ?>">
                <?= htmlspecialchars($_SESSION['alert']['message']) ?>
            </div>

            <?php unset($_SESSION['alert']); ?>
        <?php endif; ?>

        <form method="POST" action="index.php?page=login">

            <label>Email</label>
            <input
                type="email"
                name="email"
                required
            >

            <label>Password</label>
            <input
                type="password"
                name="password"
                required
            >

            <button
                type="submit"
                class="btn"
            >
                Login
            </button>

        </form>

        <p class="center">
            Belum punya akun?
            <a href="index.php?page=register">Register</a>
        </p>

    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>