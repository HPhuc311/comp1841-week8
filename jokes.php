<?php
try {
    // Dòng 3: Bao gồm kết nối cơ sở dữ liệu
    include __DIR__ . '/includes/DatabaseConnection.php';

    // Dòng 4: BẮT BUỘC phải bao gồm file chứa hàm totalJokes() và allJokes()
    include __DIR__ . '/includes/DatabaseFunctions.php'; 
    
    // Thay thế truy vấn SQL và fetch bằng hàm thư viện
    $jokes = allJokes($pdo); 
    
    $title = 'Joke list';
    
    // Sử dụng hàm thư viện
    $totalJokes = totalJokes($pdo); 
    
    ob_start();
    include __DIR__ . '/templates/jokes.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include __DIR__ . '/templates/layout.html.php';
?>