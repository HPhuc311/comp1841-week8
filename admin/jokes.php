<?php
try {
    // Cập nhật đường dẫn: includes/ ở thư mục gốc (../includes/)
    include __DIR__ . '/../includes/DatabaseConnection.php';

    include __DIR__ . '/../includes/DatabaseFunctions.php'; 
    
    $jokes = allJokes($pdo); 
    
    $title = 'Admin Joke list'; // Đổi tiêu đề để phân biệt
    
    $totalJokes = totalJokes($pdo); 
    
    ob_start();
    // Template view: Ở thư mục gốc (../templates/). File jokes.html.php này phải chứa nút Edit/Delete.
    include __DIR__ . '/../templates/jokes.html.php'; 
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// Cập nhật layout: Sử dụng admin_layout
include __DIR__ . '/../templates/admin_layout.html.php';
?>