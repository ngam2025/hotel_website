
<?php
include 'sideNAV.php';
require_once '../config.php';


   
try {
 $stmt = $conn->prepare("SELECT COUNT(*) FROM rooms WHERE r_status = :status AND r_removed=1");
    $stmt->execute([':status' => 'Unavailable']);
    $unavailableRooms = $stmt->fetchColumn();


    // عدد الغرف المتاحة
    $stmt = $conn->prepare("SELECT COUNT(*) FROM rooms WHERE r_status = :status AND r_removed=0");
    $stmt->execute([':status' => 'available']);
    $availableRooms = $stmt->fetchColumn();

    // عدد العملاء المسجلين
    $stmt = $conn->query("SELECT COUNT(*) FROM users");
    $registeredCustomers = $stmt->fetchColumn();

    // عدد الرسائل الجديدة
    $stmt = $conn->query("SELECT COUNT(*) FROM user_queries");
    $totalMessages = $stmt->fetchColumn();

} catch (PDOException $e) {
    echo "Error fetching data: " . $e->getMessage();
    $totalBookings = $availableRooms = $registeredCustomers = $totalMessages = 0;
}

?>

   
   
   
   
   
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Taiz Hotel - Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Titillium+Web:300&display=swap');
    
  .main-content {
    margin-left: 190px; /* ازاحة المحتوى لليسار لتوفير مساحة للـ side nav على اليسار */
    padding: 20px;
    padding-top: 200px;
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
<body>
  <div class="main-content">
    <div class="cards-container">
      
      <div class="card">
        <h3>Unavailable Rooms</h3>
        <p><?= htmlspecialchars($unavailableRooms) ?></p>
      </div>

      <div class="card">
        <h3>Available Rooms </h3>
        <p><?= htmlspecialchars($availableRooms) ?></p>
      </div>

      <div class="card">
        <h3>Registered Customers</h3>
        <p><?= htmlspecialchars($registeredCustomers) ?></p>
      </div>

      <div class="card">
        <h3>New Messages</h3>
        <p><?= htmlspecialchars($totalMessages) ?></p>
      </div>
    </div>
  </div>

<!-- side navigation -->

<nav class="main-menu">
    <ul>
      <li><a href="index.php">Dashboard</a></li>
      <li><a href="page/bookingViwe.php">Booking</a></li>
      <li><a href="#">Users</a></li>
      <!-- <li><a href="#">Visitor Inquiries</a></li> -->
      <li><a href="page/rooms.php">Rooms</a></li>
      <li><a href="page/user_requies.php">User Qurry</a></li>
      <li><a href="#">Promotions</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </nav>
</body>
</html>

