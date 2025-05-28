<?php
session_start();
require_once '../config.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


$stmt = $conn->prepare("SELECT username, email, date, imag FROM users WHERE user_id = :id");
$stmt->execute([':id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    die("  username not found.");
}
else{
    $_SESSION['userImage']=$user['imag'];
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title> Update Profile </title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
    }
    .profile-card {
      max-width: 600px;
      margin: 40px auto;
      padding: 30px;
      border-radius: 10px;
      background: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
    label {
      font-weight: bold;
      display: block;
      margin-bottom: 8px;
      color: #555;
    }
    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    button {
      display: block;
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #45a049;
    }
    .preview {
      text-align: center;
      margin-bottom: 15px;
    }
    .preview img {
      max-width: 120px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

<div class="profile-card">
  <h2>  Update Profile</h2>
  
  <div class="preview">
    <?php if ($user['imag']): ?>
      <img src="../assets/images/users/<?= htmlspecialchars($user['imag']) ?>" alt=" image">
    <?php endif; ?>
  </div>

  <form action="update_profile.php" method="post" enctype="multipart/form-data">
    <label> Username:</label>
    <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>

    <label> E-mail:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

    <label> Data of proth:</label>
    <input type="date" name="date" value="<?= htmlspecialchars($user['date']) ?>">

    <label>  profile_image:</label>
    <input type="file" name="imag" accept="image/*">

    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

    <button type="submit"> Save Update</button>
  </form>
</div>

</body>
</html>