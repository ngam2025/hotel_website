<?php
require_once '../../config.php';

$messageErr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_id        = $_GET['id']; // تأكد أن معرف الغرفة يأتي من الرابط
    $r_name         = $_POST['r_name'];
    $r_area         = $_POST['r_area'];
    $r_price        = $_POST['r_price'];
    $quantity       = $_POST['quantity'];
    $adult_capacity = $_POST['adult_capacity'];
    $child_capacity = $_POST['child_capacity'];
    $r_description  = $_POST['r_description'];
    $r_status       = $_POST['r_status'];
    
    $query = "UPDATE rooms SET r_name=:name, r_area=:area, r_price=:price, quantity=:quantity,
              adult_capacity=:adult, child_capacity=:child, r_description=:descr, r_status=:status
              WHERE r_id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $r_name,PDO::PARAM_STR );
    $stmt->bindParam(':area', $r_area,PDO::PARAM_STR);
    $stmt->bindParam(':price', $r_price,PDO::PARAM_INT);
    $stmt->bindParam(':quantity', $quantity,PDO::PARAM_INT);
    $stmt->bindParam(':adult', $adult_capacity,PDO::PARAM_INT);
    $stmt->bindParam(':child', $child_capacity,PDO::PARAM_INT);
    $stmt->bindParam(':descr', $r_description,PDO::PARAM_STR);
    $stmt->bindParam(':status', $r_status,PDO::PARAM_STR);
    $stmt->bindParam(':id', $room_id,PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: rooms.php");
        exit;
    } else {
        $messageErr = "فشل في تحديث البيانات.";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Edit Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .card-room {
            background: #fff;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h3 {
            color: #ffc107;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0ac06;
        }
        .form-floating > label {
            text-align: left;
        }
    </style>
</head>
<body>

<div class="card-room">
    <h3>Edit Room</h3>
    <?php if ($messageErr): ?>
        <div class="alert alert-danger text-center"><?= $messageErr ?></div>
    <?php endif; ?>
    <form method="POST"> 
        <div class="form-floating mb-3">
            <input type="text" name="r_name" class="form-control" placeholder="Room Name" required>
            <label>Room Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="r_area" class="form-control" placeholder="Area" required>
            <label>Area</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="r_price" class="form-control" placeholder="Price" required>
            <label>Price</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
            <label>Quantity</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="adult_capacity" class="form-control" placeholder="Adult Capacity" required>
            <label>Adult Capacity</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="child_capacity" class="form-control" placeholder="Child Capacity" required>
            <label>Child Capacity</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="r_description" class="form-control" placeholder="Description" style="height: 100px;"></textarea>
            <label>Description</label>
        </div>
        <div class="form-floating mb-3">
            <select name="r_status" class="form-select" required>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select>
            <label>Room Status</label>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-warning btn-lg">Update Room</button>
        </div>
    </form>
</div>

</body>
</html>
