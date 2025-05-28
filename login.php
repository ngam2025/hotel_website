<?php
require_once 'config.php';
$timeCookie = time() + 10*60*60;
session_start(); 
$messageErr = '';
if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    try{
        $stmt = $conn->prepare("SELECT user_id, username, email, password FROM users WHERE email =:s");
        $stmt->bindParam(":s", $email, PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
           $_SESSION['user'] = [
   'user_id' => $row['user_id'],
   'name' => $row['username']
];



                setCookie('loged_in', $row['user_id'], $timeCookie, '/', 'localhost');
                
                header('Location: pages/taizhotel.php');
                exit;
            } else {
                $messageErr = 'خطأ في كلمة السر';
            }
        } else {
            $messageErr = 'خطأ في البريد الإلكتروني';
        }
    } catch(PDOException $e) {
        echo "error" . $e->getMessage();
        http_response_code(500);
    }
}
?>
<!DOCTYPE html><html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>تسجيل الدخول - TAIZ HOTEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('assets/images/login-bg.jpg') center/cover no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cairo', sans-serif;
        }
        .card-login {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
            border: 2px solid #ffc107;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.3);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
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
        .alert-danger {
            font-weight: 600;
        }
        a {
            color: #ffc107;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        p.text-muted {
            margin-top: 1rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="card-login text-dark">
        <h1>TAIZ HOTEL</h1>
        <h3>تسجيل الدخول</h3>
        <?php if ($messageErr): ?>
            <div class="alert alert-danger text-center" id="error-box">
                <?= htmlspecialchars($messageErr) ?>
                <button type="button" class="btn btn-danger mt-3" onclick="document.getElementById('error-box').style.display='none'">حسنًا</button>
            </div>
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
                <button type="submit" name="submit" class="btn btn-warning btn-lg">دخول</button>
            </div>
            <p class="text-center text-muted">ليس لديك حساب؟ <a href="register.php">إنشاء حساب</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>