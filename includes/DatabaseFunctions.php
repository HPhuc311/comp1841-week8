<?php
// BẮT ĐẦU: REUSABLE QUERY FUNCTION
// Hàm truy vấn tái sử dụng, xử lý chuẩn bị và thực thi câu lệnh SQL
// Hỗ trợ mảng tham số $parameters để thay thế placeholder trong câu truy vấn
function query($pdo, $sql, $parameters = []) {
    // Đảm bảo $query được gán giá trị từ prepare()
    // Dòng này đã được sửa lỗi đánh máy (thiếu dấu =)
    $query = $pdo->prepare($sql);
    
    // Nếu prepare() thất bại (thường do lỗi cú pháp SQL)
    if ($query === false) {
        // Có thể thêm xử lý lỗi chi tiết hơn ở đây (như log lỗi)
        throw new Exception("SQL Prepare Failed: " . $sql);
    }
    
    $query->execute($parameters); // Thực thi và truyền tham số
    return $query;
}

// HÀM CHỨC NĂNG VỀ TRUYỆN CƯỜI (JOKE FUNCTIONS)
// Đếm tổng số truyện cười
function totalJokes($pdo) {
    $query = query($pdo, 'SELECT COUNT(*) FROM joke');
    $row = $query->fetch();
    return $row[0];
}

// Lấy thông tin một truyện cười cụ thể bằng ID
function getJoke($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM joke WHERE id = :id', $parameters);
    return $query->fetch();
}

// Cập nhật một truyện cười
function updateJoke($pdo, $jokeId, $joketext, $authorid, $categoryid) {
    $sql = 'UPDATE joke SET 
                joketext = :joketext, 
                authorid = :authorid, 
                categoryid = :categoryid 
            WHERE id = :id';
    
    $parameters = [
        ':joketext' => $joketext,
        ':authorid' => $authorid,
        ':categoryid' => $categoryid,
        ':id' => $jokeId
    ];
    query($pdo, $sql, $parameters);
}

// Xóa một truyện cười
function deleteJoke($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM joke WHERE id = :id', $parameters);
}

// Thêm truyện cười mới
function insertJoke($pdo, $joketext, $authorid, $categoryid) {
    $sql = 'INSERT INTO joke (joketext, jokedate, authorid, categoryid)
            VALUES (:joketext, CURDATE(), :authorid, :categoryid)';
    
    $parameters = [
        ':joketext' => $joketext,
        ':authorid' => $authorid,
        ':categoryid' => $categoryid
    ];
    query($pdo, $sql, $parameters);
}

// Lấy danh sách tất cả truyện cười với thông tin tác giả và thể loại
function allJokes($pdo) {
    $sql = 'SELECT joke.id, joketext, jokedate, author.name AS authorName, categoryName
            FROM joke
            INNER JOIN author ON authorid = author.id
            INNER JOIN category ON categoryid = category.id
            ORDER BY jokedate DESC';
    
    $jokes = query($pdo, $sql);
    return $jokes->fetchAll();
}


// HÀM CHỨC NĂNG VỀ TÁC GIẢ (AUTHOR FUNCTIONS)
// Lấy tất cả tác giả
function allAuthors($pdo) {
    $authors = query($pdo, 'SELECT id, name FROM author');
    return $authors->fetchAll();
}

// HÀM CHỨC NĂNG VỀ THỂ LOẠI (CATEGORY FUNCTIONS)
// Lấy tất cả thể loại
function allCategories($pdo) {
    $categories = query($pdo, 'SELECT id, categoryName FROM category');
    return $categories->fetchAll();
}
?>