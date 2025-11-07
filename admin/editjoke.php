<?php
// editjoke.php - Hoàn thành phần "Implementing editing jokes"
// Cập nhật đường dẫn: includes/ ở thư mục gốc (../includes/)
include __DIR__ . '/../includes/DatabaseConnection.php'; 
include __DIR__ . '/../includes/DatabaseFunctions.php'; 

// Kiểm tra nếu dữ liệu POST được gửi lên (khi người dùng nhấn nút Save)
if (isset($_POST['joketext']) && isset($_POST['authorid']) && isset($_POST['categoryid'])) { 
    // Xử lý POST: Cập nhật dữ liệu
    try {
        updateJoke($pdo, $_POST['id'], $_POST['joketext'], $_POST['authorid'], $_POST['categoryid']);
        
        // Redirect: Giữ nguyên, sẽ chuyển hướng đến admin/jokes.php
        header('location: jokes.php'); 
        exit();
    } catch (PDOException $e) {
        $title = 'Error editing joke';
        $output = 'Database error: ' . $e->getMessage();
        // Cập nhật layout
        include __DIR__ . '/../templates/admin_layout.html.php'; 
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
        $joke = getJoke($pdo, $_GET['id']);
        $authors = allAuthors($pdo);
        $categories = allCategories($pdo);

        $title = 'Edit Joke';
        ob_start();
        // Template view: Ở thư mục gốc (../templates/)
        include __DIR__ . '/../templates/editjoke.html.php'; 
        $output = ob_get_clean();
        // Cập nhật layout: Sử dụng admin_layout
        include __DIR__ . '/../templates/admin_layout.html.php'; 
        
    } catch (PDOException $e) {
        $title = 'Error fetching joke data';
        $output = 'Database error: ' . $e->getMessage();
        // Cập nhật layout
        include __DIR__ . '/../templates/admin_layout.html.php'; 
        exit();
    }
}
?>