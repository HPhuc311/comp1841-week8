<?php
// Cập nhật đường dẫn: includes/ ở thư mục gốc (../includes/)
include __DIR__ . '/../includes/DatabaseConnection.php';
include __DIR__ . '/../includes/DatabaseFunctions.php'; 

try {
    deleteJoke($pdo, $_POST['id']);
    
    // Redirect: Giữ nguyên, sẽ chuyển hướng đến admin/jokes.php
    header('location: jokes.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete joke: ' . $e->getMessage();
    // Cập nhật layout: Sử dụng admin_layout
    include __DIR__ . '/../templates/admin_layout.html.php'; 
}
?>