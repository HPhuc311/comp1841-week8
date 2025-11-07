<?php
// editjoke.php - Hoàn thành phần "Implementing editing jokes"
include __DIR__ . '/includes/DatabaseConnection.php';
include __DIR__ . '/includes/DatabaseFunctions.php'; // Thêm include

// Kiểm tra nếu dữ liệu POST được gửi lên (khi người dùng nhấn nút Save)
if (isset($_POST['joketext']) && isset($_POST['authorid']) && isset($_POST['categoryid'])) { 
    // Xử lý POST: Cập nhật dữ liệu
    try {
        // Thay thế logic UPDATE cũ bằng hàm thư viện
        updateJoke($pdo, $_POST['id'], $_POST['joketext'], $_POST['authorid'], $_POST['categoryid']);
        
        header('location: jokes.php');
        exit();
    } catch (PDOException $e) {
        $title = 'Error editing joke';
        $output = 'Database error: ' . $e->getMessage();
        include __DIR__ . '/templates/layout.html.php';
        exit();
    }
} else {
    // THÊM KIỂM TRA ĐIỀU KIỆN TẠI ĐÂY
    if (!isset($_GET['id'])) {
        // Nếu không có ID, chuyển hướng người dùng
        header('location: jokes.php'); 
        exit();
    }
    
    // Xử lý GET: Lấy truyện cười để hiển thị form
    try {
        // Thay thế logic truy vấn joke cũ bằng hàm thư viện
        $joke = getJoke($pdo, $_GET['id']);
        
        // Thay thế logic truy vấn Authors và Categories cũ bằng hàm thư viện
        $authors = allAuthors($pdo);
        $categories = allCategories($pdo);

        $title = 'Edit Joke';
        ob_start();
        // $joke, $authors, và $categories sẽ có sẵn trong template
        include __DIR__ . '/templates/editjoke.html.php'; 
        $output = ob_get_clean();
        include __DIR__ . '/templates/layout.html.php';
        
    } catch (PDOException $e) {
        $title = 'Error fetching joke data';
        $output = 'Database error: ' . $e->getMessage();
        include __DIR__ . '/templates/layout.html.php';
        exit();
    }
}
?>