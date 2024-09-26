<?php
session_start();

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    // Hapus user data peserta by index di session
    unset($_SESSION['users'][$delete_id]);
}

// Set pesan sukses
$_SESSION['message'] = 'Data user telah dihapus!';
$_SESSION['type'] = 'success';

// Redirect kembali ke halaman daftar peserta
header("Location: listUsers.php");
exit();