<?php
// Cập nhật đường dẫn: includes/ ở thư mục gốc (../includes/)
include __DIR__ . '/../includes/DatabaseConnection.php'; 
include __DIR__ . '/../includes/DatabaseFunctions.php'; 

// KIỂM TRA: Đảm bảo cả 3 trường cần thiết đều được gửi lên
if (isset($_POST['joketext']) && isset($_POST['categoryid']) && isset($_POST['authorid'])) {
    try {
        insertJoke($pdo, $_POST['joketext'], $_POST['authorid'], $_POST['categoryid']);
        
        // Redirect: Giữ nguyên, sẽ chuyển hướng đến admin/jokes.php
        header('location: jokes.php'); 
        exit();
    } catch (PDOException $e) {
        $title = 'Error adding joke';
        $output = 'Database error: ' . $e->getMessage(); 
    }
} else {
    try {
        $authors = allAuthors($pdo); 
        $categories = allCategories($pdo); 
        
    } catch (PDOException $e) {
        $title = 'Database Error';
        $output = 'Could not fetch required data (authors or categories): ' . $e->getMessage();
        // Cập nhật layout
        include __DIR__ . '/../templates/admin_layout.html.php'; 
        exit();
    }
    
    $title = 'Add a new joke';
    ob_start();
    // Template view: Ở thư mục gốc (../templates/)
    include __DIR__ . '/../templates/addjoke.html.php'; 
    $output = ob_get_clean();
}

// Cập nhật layout: Sử dụng admin_layout
include __DIR__ . '/../templates/admin_layout.html.php'; 
?>