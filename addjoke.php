<?php
include __DIR__ . '/includes/DatabaseConnection.php';
include __DIR__ . '/includes/DatabaseFunctions.php'; // Thêm include

// KIỂM TRA: Đảm bảo cả 3 trường cần thiết đều được gửi lên
if (isset($_POST['joketext']) && isset($_POST['categoryid']) && isset($_POST['authorid'])) {
    try {
        // Thay thế logic INSERT cũ bằng hàm thư viện
        insertJoke($pdo, $_POST['joketext'], $_POST['authorid'], $_POST['categoryid']);
        
        header('location: jokes.php');
        exit();
    } catch (PDOException $e) {
        $title = 'Error adding joke';
        // Hiển thị lỗi nếu có vấn đề về Database (bao gồm lỗi Foreign Key 1452)
        $output = 'Database error: ' . $e->getMessage(); 
    }
} else {
    try {
        // Thay thế logic truy vấn cũ bằng hàm thư viện
        $authors = allAuthors($pdo); 
        $categories = allCategories($pdo); 
        
    } catch (PDOException $e) {
        // Xử lý lỗi nếu không thể lấy data
        $title = 'Database Error';
        $output = 'Could not fetch required data (authors or categories): ' . $e->getMessage();
        include __DIR__ . '/templates/layout.html.php';
        exit();
    }
    
    $title = 'Add a new joke';
    ob_start();
    // Chuyển $authors và $categories sang template
    include __DIR__ . '/templates/addjoke.html.php'; 
    $output = ob_get_clean();
}

include __DIR__ . '/templates/layout.html.php';
?>