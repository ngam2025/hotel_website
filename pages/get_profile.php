<?php
include '../config.php';
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'يجب تسجيل الدخول']);
    exit();
}

try {
    $stmt = $conn->prepare("
        SELECT 
            username,
            email,
            date, 
            DATE_FORMAT(created_at, '%Y-%m-%d') as join_date,
            gender,
            imag  
        FROM users 
        WHERE user_id = :id
    ");
    $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    
    $user = $stmt->fetch();
    
    if ($user) {
        echo json_encode([
            'success' => true,
            'data' => array_map('htmlspecialchars', $user)
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'المستخدم غير موجود']);
    }
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'خطأ في الخادم']);
}
?>