<?php
require_once '../../config.php';
include '../sideNAV.php';
// session_start();

try {
    $stmt = $conn->prepare("SELECT bo.*, u.username 
                            FROM booking_order bo
                            JOIN users u ON bo.user_id = u.user_id
                            ORDER BY bo.check_in DESC");
    $stmt->execute();
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>قائمة الحجوزات</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      padding-top: 5px;
      padding-left: 140px; 
      font-family: 'Cairo', sans-serif;
      background-color: #fff;
    }

    h2 {
      padding-left: 50px;
      padding-top: 50px;
    }

    .panel {
      width: 100%;
      max-width: 1020px;
      margin: 40px auto;
      padding: 10px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      max-width: 1000px;
      border-collapse: collapse;
      font-size: 13px;
      background-color: #f9f9f9;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    thead th {
      background-color: rgb(217, 221, 225);
      color: #212529;
      padding: 10px 8px;
      text-align: center;
    }

    tbody td {
      padding: 8px 8px;
      border: 1px solid #ddd;
      text-align: center;
      color: #333;
      vertical-align: middle;
      white-space: nowrap;
    }

    tbody tr:hover {
      background-color: rgba(239, 223, 177, 0.2);
    }

    .status-paid {
      color: green;
      font-weight: bold;
    }

    .status-unpaid {
      color: red;
      font-weight: bold;
    }

    .btn {
      display: inline-block;
      padding: 6px 12px;
      margin: 2px;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 13px;
      transition: background-color 0.3s ease;
    }

   
  </style>
</head>
<body>

<h2>قائمة الحجوزات</h2>

<div class="panel">
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>اسم المستخدم</th>
        <th>رقم الغرفة</th>
        <th>نوع الحجز</th>
        <th>الوصول</th>
        <th>المغادرة</th>
        <th>حالة الدفع</th>
        <th>المبلغ</th>
    
      </tr>
    </thead>
    <tbody>
      <?php if ($bookings): ?>
        <?php foreach ($bookings as $index => $booking): ?>
          <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($booking['username']) ?></td>
            <td><?= htmlspecialchars($booking['room_id']) ?></td>
            <td><?= htmlspecialchars($booking['type_booking']) ?></td>
            <td><?= htmlspecialchars($booking['check_in']) ?></td>
            <td><?= htmlspecialchars($booking['check_out']) ?></td>
            <td class="<?= $booking['type_payment'] === 'مدفوع' ? 'status-paid' : 'status-unpaid' ?>">
              <?= htmlspecialchars($booking['type_payment']) ?>
            </td>
            <td><?= number_format($booking['booking_amont'], 2) ?> $</td>
          
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="9">لا توجد حجوزات حالياً.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<nav class="main-menu">
  <ul>
    <li><a href="../index.php">Dashboard</a></li>
    <li><a href="bookingViwe.php">Booking</a></li>
    <li><a href="#">Users</a></li>
    <li><a href="rooms.php">Rooms</a></li>
    <li><a href="user_requies.php">User Qurry</a></li>
    <li><a href="#">Promotions</a></li>
    <li><a href="#">Settings</a></li>
  </ul>
</nav>

</body>
</html>
