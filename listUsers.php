<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <!-- Show message success or failed -->
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
            <div class="card-header bg-dark text-white">List peserta</div>
            <div class="card-body">
                <?php
                    if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
                        echo '<table class="table table-striped table-hover">';
                        echo '<thead><tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Category</th>
                        <th>Action</th>
                        </tr></thead>';
                        echo '<tbody>';
                        foreach ($_SESSION['users'] as $index => $user) {
                            echo '<tr>';
                            echo '<td>' . $user['name'] . '</td>';
                            echo '<td>' . $user['email'] . '</td>';
                            echo '<td>' . $user['age'] . '</td>';
                            echo '<td>' . ucfirst($user['category']) . '</td>';
                            echo '<td>';
                            echo '<a href="index.php?edit=' . $index . '" class="btn btn-sm btn-warning me-2">Edit</a>';
                            echo '<a href="removeUser.php?delete=' . $index . '" class="btn btn-sm btn-danger">Remove</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                    }else {
                        echo '<div class="alert alert-danger">Tidak ada data</div>';
                    }
                ?>
            </div>
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-primary w-100 mb-2">Add new user</a>
            <a href="clearAll.php" class="btn btn-secondary w-100">Clear all user</a>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>