<?php
require_once 'config.php';
session_start(); 


$messageErr = '';
if (isset($_POST['submit'])) {
    $email    = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // استعلام محضّر لمنع حقن SQL
    $stmt = $conn->prepare('SELECT user_id, username, email, password FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['personal'] = [
                'user_id'    => $row['user_id'],
                'username'  => $row['username'],
                'email' => $row['email'],
                'user_type' => 'مستخدم عادي'
            ];
            header('Location: pages/taizhotel.php');
            exit;
        } else {
            $messageErr = 'خطأ في كلمة السر';
        }
    } else {
        $messageErr = 'خطأ في البريد الإلكتروني';
    }
    $stmt->close();
}
?><!DOCTYPE html><html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - فندق الأحلام</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background: url('assets/images/login-bg.jpg') center/cover no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-login {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.2);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }
        .form-floating > label {
            text-align: right;
        }
        .logo {
            display: block;
            margin: 0 auto 1rem;
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="card-login text-dark">
        <img src="assets/images/logo.png" alt="Logo" class="logo">
        <h3 class="text-center mb-4">تسجيل الدخول</h3>
        <?php if ($messageErr): ?>
            <div class="alert alert-danger text-center"><?= $messageErr ?></div>
        <?php endif; ?>
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                <label for="floatingEmail">البريد الإلكتروني</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="كلمة السر" required>
                <label for="floatingPassword">كلمة السر</label>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">دخول</button>
            </div>
            <p class="text-center">ليس لديك حساب؟ <a href="register.php">إنشاء حساب</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>