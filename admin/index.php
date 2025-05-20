<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>فندق تعز - لوحة التحكم</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Titillium+Web:300&display=swap');

    body {
      margin: 0;
       font-family: 'Cairo', sans-serif;
      /* font-family: 'Titillium Web', sans-serif; */
      background-color: #f4f4f4;
      direction: rtl;
    }

    .header {
      background-color: #212121;
      color: #ffc107;
      padding: 0 20px;
      font-size: 25px;
      font-weight: bold;
      position: fixed;
      top: 0;
      right: 0;
      width: 100%;
      height: 50px;
      box-sizing: border-box;
      z-index: 1001;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logout-button {
      background-color: transparent;
      color: #ffc107;
      border: 2px solid #ffc107;
      padding: 5px 12px;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      transition: 0.3s;
    }

    .logout-button:hover {
      background-color: #ffc107;
      color: #212121;
    }

    .main-menu {
      background: #ffc107;
      border-left: 1px solid #e5e5e5;
      position: fixed;
      top: 50px;
      bottom: 0;
      right: 0;
      width: 180px;
      overflow-y: auto;
      z-index: 1000;
    }

    .main-menu ul {
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .main-menu li {
      width: 100%;
    }

    .main-menu li a {
      display: block;
      color: black;
      text-decoration: none;
      padding: 15px 20px;
      font-size: 15px;
      font-weight: bold;
      transition: background-color 0.2s ease;
    }

    .main-menu li:hover a {
      background-color: #000;
      color: #fff;
    }

    .main-content {
      margin-right: 190px;
      padding: 20px;
      padding-top: 70px;
    }

    .dashboard-title {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
    }

    .card {
      background-color: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      text-align: center;
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      margin-bottom: 10px;
      font-size: 18px;
      color: #333;
    }

    .card p {
      font-size: 28px;
      font-weight: bold;
      color: #ffc107;
      margin: 0;
    }
  </style>
</head>
<body>

  <div class="header">
    فندق تعز
    <button class="logout-button">تسجيل الخروج</button>
  </div>

  <nav class="main-menu">
    <ul>
      <li><a href="#">لوحة التحكم</a></li>
      <li><a href="#">الحجوزات</a></li>
      <li><a href="#">المستخدمون</a></li>
      <li><a href="#">استفسارات الزوار</a></li>
      <li><a href="#">الغرف</a></li>
      <li><a href="#">المرافق والخدمات</a></li>
      <li><a href="#">العروض الترويجية</a></li>
      <li><a href="#">الإعدادات</a></li>
    </ul>
  </nav>

  <!-- تصميم صفحهdashbord -->
  <div class="main-content">
    <div class="dashboard-title"></div>

    <div class="cards-container">
      <div class="card">
        <h3>إجمالي الحجوزات</h3>
        <p>120</p>
      </div>

      <div class="card">
        <h3>الغرف المتاحة</h3>
        <p>35</p>
      </div>

      <div class="card">
        <h3>العملاء المسجلين</h3>
        <p>85</p>
      </div>

      <div class="card">
        <h3>الرسائل الجديدة</h3>
        <p>9</p>
      </div>
    </div>
  </div>

</body>
</html>

