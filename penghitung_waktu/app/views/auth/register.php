<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="auth-wrap">
    <div class="auth-card">

        <h1>Register</h1>

        <p class="muted">
            Buat akun baru.
        </p>

        <?php if (!empty($_SESSION['alert'])): ?>
            <div class="alert <?= $_SESSION['alert']['type'] ?>">
                <?= htmlspecialchars($_SESSION['alert']['message']) ?>
            </div>

            <?php unset($_SESSION['alert']); ?>
        <?php endif; ?>

        <form method="POST" action="index.php?page=register">

            <label>Nama</label>
            <input
                type="text"
                name="nama"
                required
            >

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
                minlength="6"
                required
            >

            <button
                type="submit"
                class="btn"
            >
                Register
            </button>

        </form>

        <p class="center">
            Sudah punya akun?
            <a href="index.php?page=login">Login</a>
        </p>

    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>