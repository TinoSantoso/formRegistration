<?php 
session_start(); 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edit_id = $_POST['edit_id'] ?? -1;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['usia'];
        $category = $_POST['category'];
        
        if (is_numeric($age) && $age > 0) {
            $user = [
                "name" => $name,
                "email" => $email,
                "age" => $age,
                "category" => $category
            ];
    
            if ($edit_id != -1 && isset($_SESSION['users'][$edit_id])) {
                // Jika sedang mengedit, update user di index yang sesuai
                $_SESSION['users'][$edit_id] = $user;
                $_SESSION['type'] = 'success';
                $_SESSION['message'] = 'Data user berhasil diperbarui!';
            }else {
                if (!isset($_SESSION['users'])) {
                    $_SESSION['users'] = [];
                }
                $_SESSION['users'][] = $user;
                $_SESSION['type'] = "success";
                $_SESSION['message'] = "Data user berhasil ditambahkan";
            }
        }else {
            $_SESSION['type'] = "danger";
            $_SESSION['message'] = "Data user gagal ditambahkan";
        }
        
        header("Location: index.php");
        exit();
    }
    
?>