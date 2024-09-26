<?php
session_start();

// Hapus semua data peserta dari session
unset($_SESSION['users']);

// Set pesan sukses
$_SESSION['message'] = 'Semua data peserta telah dihapus!';
$_SESSION['type'] = 'success';

// Redirect kembali ke halaman daftar peserta
header("Location: listUsers.php");
exit();