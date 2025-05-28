<?php
require_once '../config.php';
session_start();
$massageError;
$id;
$room_id=0;
if($_SERVER['REQUEST_METHOD']==='POST'){
  $typeBooking=$_POST['bookingType'];
  $user_id=$_SESSION['user_id'];
  if(!isset($_SESSION['room_id'])){
    die( "error in room id");
  }else{
    $room_id=(int)$_SESSION['room_id'];
  }
  $check_in=$_POST['checkIn'];
  $check_out=$_POST['checkOut'];
  $type_payment=$_POST['paymentStatus'];
  $din=new DateTime($check_in);
  $dout=new DateTime($check_out);
  $diff=$din->diff($dout);
  $day=$diff->days;
  $pric=100.8;
  $booking_amont=$pric * $day;
  try{
    $insert = $conn->prepare('INSERT INTO booking_order (user_id , room_id, check_in, check_out,type_payment,booking_amont,type_booking) 
        VALUES (:u_id,:ro_id,:ch_in,:ch_out,:t_p,:b_a,:t_b)');
        $insert->bindParam(':u_id', $user_id, PDO::PARAM_INT);
        $insert->bindParam(':ro_id', $room_id, PDO::PARAM_INT);
        $insert->bindParam(':ch_in', $check_in, PDO::PARAM_STR);
        $insert->bindParam(':ch_out', $check_out, PDO::PARAM_STR);
        $insert->bindParam(':t_p', $type_payment, PDO::PARAM_STR);
        $insert->bindParam(':b_a', $booking_amont, PDO::PARAM_STR);
         $insert->bindParam(':t_b', $typeBooking, PDO::PARAM_STR);
        if ($insert->execute()) {
            header('Location: taizhotel.php');
            exit;
        } 
        else{
          $massegeError= "  error ";
        }
  }catch(PDOException $e){
    echo "error".$e->getMessage();
    http_response_code(500);
  }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>نموذج حجز فندق</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />

  <!-- خط Cairo من Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />

  <style>
    body {
      background: url('assets/images/login-bg.jpg') center/cover no-repeat;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Cairo', sans-serif;
    }

    .card-booking {
      backdrop-filter: blur(10px);
      background-color: rgba(255, 255, 255, 0.9);
      border: 2px solid #ffc107;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.3);
      padding: 2rem;
      max-width: 500px;
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
  </style>
</head>
<body>

  <div class="card-booking text-dark">
    <h1>TAIZ HOTEL</h1>
    <h3>نموذج حجز فندق</h3>

    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">

      <div class="form-floating mb-3">
        <select class="form-select" id="bookingType" name="bookingType" required>
          <option value="" disabled selected>اختر نوع الحجز</option>
          <option value="فردي">فردي</option>
          <option value="زوجي">زوجي</option>
          <option value="عائلي">عائلي</option>
        </select>
        <label for="bookingType">نوع الحجز</label>
      </div>

      <div class="form-floating mb-3">
        <input type="date" name="checkIn" class="form-control" id="checkIn" required>
        <label for="checkIn">تاريخ الحجز</label>
      </div>

      <div class="form-floating mb-3">
        <input type="date" name="checkOut" class="form-control" id="checkOut" required>
        <label for="checkOut">تاريخ الخروج</label>
      </div>

      <div class="form-floating mb-3">
        <select class="form-select" id="paymentStatus" name="paymentStatus" required>
          <option value="" disabled selected>اختر حالة الدفع</option>
          <option value="مدفوع">مدفوع</option>
          <option value="غير مدفوع">غير مدفوع</option>
        </select>
        <label for="paymentStatus">حالة الدفع</label>
      </div>

      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-warning btn-lg">تأكيد الحجز</button>
      </div>

    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
