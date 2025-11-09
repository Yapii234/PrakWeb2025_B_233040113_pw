<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <!-- Menampilkan nama pengguna dengan sanitasi HTML -->
        <h1 class="mb-4">Selamat Datang, <?= htmlspecialchars($user['name']); ?></h1>

        <!-- Menampilkan email pengguna -->
        <p class="mb-3">Email: <?= htmlspecialchars($user['email']); ?></p>

        <!-- Link untuk kembali ke halaman daftar pengguna -->
        <a href="index.php" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>
</body>
</html>
