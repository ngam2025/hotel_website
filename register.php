<?php
require_once 'config.php';
$messageErr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name       = htmlspecialchars($_POST['username']);
    $email      = htmlspecialchars($_POST['email']);
    $gender     = htmlspecialchars($_POST['gender']);
    $password   = $_POST['password'];
    $rpassword  = $_POST['rpassword'];
    $dof        = $_POST['date'];
    $image      = $_FILES['image'];

    $image_tmp  = $image['tmp_name'];
    $image_name = uniqid('user_', true) . '-' . basename($image['name']);
    $target     = __DIR__ . '/uploads/' . $image_name;
    move_uploaded_file($image_tmp, $target);

    $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $messageErr = 'هذا المستخدم موجود من قبل';
    } elseif ($password !== $rpassword) {
        $messageErr = 'يجب أن تكون كلمة السر متطابقة';
    } else {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $insert = $conn->prepare('INSERT INTO users (username , gender, email, password, date, imag) VALUES (?, ?, ?, ?, ?, ?)');
        $insert->bind_param('ssssss', $name, $gender, $email, $password_hash, $dof, $image_name);
        if ($insert->execute()) {
            header('Location: login.php');
            exit;
        } else {
            $messageErr = 'فشل في إنشاء الحساب، حاول لاحقًا';
        }
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>إنشاء حساب جديد - نظام حجوزات فندق</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            /* background: url('assets/images/login-bg.jpg') center/cover no-repeat; */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cairo', sans-serif;
        }

        .card-register {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #ffc107;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.3);
            padding: 2rem;
            max-width: 500px;
            width: 100%;
        }

        .form-floating > label {
            text-align: right;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0ac06;
        }

        h1 {
            font-size: 1.8rem;
            text-align: center;
            color: #ffc107;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        h3 {
            color: #343a40;
            text-align: center;
            margin-bottom: 1.5rem;
        }
          a {
            color: #ffc107;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card-register text-dark">
        <h1>TAIZ HOTEL</h1>
        <h3>إنشاء حساب جديد</h3>
        <?php if ($messageErr): ?>
            <div class="alert alert-danger text-center"><?= $messageErr ?></div>
        <?php endif; ?>
        <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingName" placeholder="الاسم الكامل" required>
                <label for="floatingName">الاسم الكامل</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                <label for="floatingEmail">البريد الإلكتروني</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="كلمة السر" required>
                <label for="floatingPassword">كلمة السر</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="rpassword" class="form-control" id="floatingRPassword" placeholder="تأكيد كلمة السر" required>
                <label for="floatingRPassword">تأكيد كلمة السر</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" name="date" class="form-control" id="floatingDate" required>
                <label for="floatingDate">تاريخ الميلاد</label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">الصورة الشخصية</label>
                <input class="form-control" type="file" name="image" id="formFile" accept="image/*" required>
            </div>
            <div class="mb-3">
                <select name="gender" class="form-select" required>
                    <option selected disabled>اختر الجنس</option>
                    <option value="male">ذكر</option>
                    <option value="female">أنثى</option>
                </select>
            </div>
            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-warning btn-lg">إنشاء الحساب</button>
            </div>
            <p class="text-center text-muted">هل لديك حساب؟ <a href="login.php">تسجيل الدخول</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
