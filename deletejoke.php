<?php
include __DIR__ . '/includes/DatabaseConnection.php';
include __DIR__ . '/includes/DatabaseFunctions.php'; // Thêm include

try {
    // Thay thế logic DELETE cũ bằng hàm thư viện
    deleteJoke($pdo, $_POST['id']);
    
    header('location: jokes.php');
} catch (PDOException $e) {
    // Thêm xử lý lỗi như đã gợi ý trong tài liệu
    $title = 'An error has occurred';
    $output = 'Unable to delete joke: ' . $e->getMessage();
    include __DIR__ . '/templates/layout.html.php';
}
?>