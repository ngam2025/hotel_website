<?php
session_start();
require_once '../config.php'; 

$messageErr = '';

if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT admin_id, admin_name, password FROM admin WHERE admin_name = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // Direct comparison without hashing
            if ($password === $admin['password']) {
                $_SESSION['admin'] = [
                    'admin_id' => $admin['admin_id'],
                    'admin_name' => $admin['admin_name']
                ];
                header("Location: index.php");
                exit;
            } else {
                $messageErr = "Incorrect password.";
            }
        } else {
            $messageErr = "Username not found.";
        }
    } catch (PDOException $e) {
        $messageErr = "An error occurred: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login - Hotel Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- Cairo font from Google Fonts -->
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
            text-align: left;
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
        <h3>Admin Login</h3>
       <?php if ($messageErr): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($messageErr) ?></div>
       <?php endif; ?>

        <form method="post" action="">
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" name="submit" class="btn btn-warning btn-lg">Admin Login</button>
            </div>
            <p class="text-center text-muted">For admins only</p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
