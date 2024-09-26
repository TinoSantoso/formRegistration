<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <!-- show message success or failed -->
        <?php if (isset($_SESSION['message'])) : ?> 
                <div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
                <?php
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                ?>
                
        <?php endif; ?>

        <div class="card">
            <div class="card-header bg-dark text-white">Form Pendaftaran</div>
                <div class="card-body">

                    <?php
                    // Cek apakah kita sedang mengedit data
                        $edit_mode = false;
                        $edit_id = -1;
                        if (isset($_GET['edit'])) {
                            $edit_id = $_GET['edit'];
                            $edit_mode = true;
                            $user = $_SESSION['users'][$edit_id];
                        }
                    ?>
                    <form method="POST" action="register.php">
                        <input type="hidden" name="edit_id" value="<?= $edit_mode ? $edit_id : -1; ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $edit_mode ? $user['name'] : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $edit_mode ? $user['email'] : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Age</label>
                            <input type="number" class="form-control" name="usia" value="<?= $edit_mode ? $user['age'] : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select">
                                <option value="pelajar" <?= $edit_mode && $user['category'] == 'pelajar' ? 'selected' : '';?> >Pelajar</option>
                                <option value="mahasiswa" <?= $edit_mode && $user['category'] == 'mahasiswa' ? 'selected' : '';?> >Mahasiswa</option>
                                <option value="professional" <?= $edit_mode && $user['category'] == 'professional' ? 'selected' : '';?> >Professional</option>
                            </select>
                        </div>
                
                        <button type="submit" class="btn btn-primary w-100 mt-2"><?= $edit_mode ? 'Update' : 'Daftar'; ?></button>
                    </form>
                </div>
        </div>
        <div class="mt-3">
            <a href="listUsers.php" class="btn btn-secondary">Lihat data user</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>