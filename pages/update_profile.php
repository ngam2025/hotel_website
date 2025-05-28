<?php
session_start();
require_once '../config.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Method not allowed");
}


if (
    !isset($_POST['csrf_token'], $_SESSION['csrf_token']) ||
    !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
) {
    die("Invalid CSRF token");
}


$username = htmlspecialchars($_POST['username']);
$email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$date     = htmlspecialchars($_POST['date']);


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email");
}


$image_name = null;
if (isset($_FILES['imag']) && $_FILES['imag']['error'] === UPLOAD_ERR_OK) {
    $image      = $_FILES['imag'];
    $image_tmp  = $image['tmp_name'];
    $image_name = uniqid('user_', true) . '-' . basename($image['name']);

    $upload_dir = __DIR__ . '/../assets/images/users/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, recursive: true);
    }

    $target = $upload_dir . $image_name;
    move_uploaded_file($image_tmp, $target);
}


$sql = "UPDATE users SET username = :username, email = :email, date = :date";
if ($image_name) {
    $sql .= ", imag = :imag";
}
$sql .= " WHERE user_id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':date', $date);
if ($image_name) {
    $stmt->bindValue(':imag', $image_name);
    $_SESSION['userImage']=$image_name;
}
$stmt->bindValue(':id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();

header('Location: profile.php');

exit;