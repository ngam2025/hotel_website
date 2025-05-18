<!DOCTYPE html><html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>فندق تعز</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .navbar { background: #343a40; }
    .navbar-brand { font-weight: bold; color: #ffc107 !important; }
    .nav-link { color: #fff !important; }
    .hero {
      background: url('/assets/images/background6.jpg') center/cover no-repeat;
      height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-shadow: 0 0 10px rgba(0,0,0,0.7);
    }
    .btn-custom {
      border-radius: 2rem;
      padding: 0.75rem 1.5rem;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">فندق تعز</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">تسجيل دخول</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-warning btn-custom ms-2" href="register.php">إنشاء حساب</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>  <!-- Hero Section -->  <section class="hero">
    <div class="text-center">
      <h1 class="display-4 fw-bold">مرحبا بكم في فندق تعز</h1>
      <p class="lead">رفاهية وأناقة تحت سقف واحد</p>
      <a href="login.php" class="btn btn-light btn-custom me-2">تسجيل دخول</a>
      <a href="register.php" class="btn btn-warning btn-custom">إنشاء حساب</a>
    </div>
  </section>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script></body>
</html>