<?php
try {
    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/includes/DatabaseFunctions.php'; 
    
    $jokes = allJokes($pdo); 
    
    $title = 'Joke list';
    $totalJokes = totalJokes($pdo); 
    
    ob_start();
    // THAY ĐỔI: Sử dụng template dành cho công chúng, không có nút Admin
    include __DIR__ . '/templates/public_jokes.html.php'; 
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

// SỬ DỤNG layout.html.php (layout công cộng)
include __DIR__ . '/templates/layout.html.php';
?>