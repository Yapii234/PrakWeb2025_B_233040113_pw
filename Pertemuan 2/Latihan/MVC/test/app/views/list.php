<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Pengguna</h1>
        <a href="index.php?action=create" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
        <!-- Tabel untuk menampilkan daftar semua pengguna -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop untuk menampilkan setiap pengguna -->
                <?php foreach ($users as $user): ?>
                <tr>
                    <!-- Menampilkan nama dengan sanitasi HTML untuk keamanan -->
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <!-- Menampilkan email dengan sanitasi HTML -->
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <!-- Link untuk melihat detail pengguna berdasarkan ID -->
                    <td>
                        <a href="index.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                        <a href="index.php?action=edit&id=<?= $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?action=delete&id=<?= $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
