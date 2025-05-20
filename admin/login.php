<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل دخول المشرف - نظام حجوزات فندق</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    
    <!-- خط Cairo من Google Fonts -->
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
    </style>
</head>
<body>
    <div class="card-login text-dark">
        <h1>TAIZ HOTEL</h1>
        <h3>تسجيل دخول المشرف</h3>
        <div class="alert alert-danger text-center" style="display: none;" id="errorMsg">رسالة الخطأ تظهر هنا</div>
        <form method="post" action="">
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="admin@example.com" required>
                <label for="floatingEmail">البريد الإلكتروني </label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="كلمة المرور" required>
                <label for="floatingPassword">كلمة المرور</label>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" name="submit" class="btn btn-warning btn-lg">دخول المشرف</button>
            </div>
            <p class="text-center text-muted">واجهة مخصصة للمشرفين فقط</p>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
