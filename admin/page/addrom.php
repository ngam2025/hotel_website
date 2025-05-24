<?php
require_once '../../config.php';

$messageErr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $r_name         = $_POST['r_name'];
    $r_area         = $_POST['r_area'];
    $r_price        = $_POST['r_price'];
    $quantity       = $_POST['quantity'];
    $adult_capacity = $_POST['adult_capacity'];
    $child_capacity = $_POST['child_capacity'];
    $r_description  = $_POST['r_description'];
    $r_status       = $_POST['r_status'];
    $r_removed      = 0;

 $image = $_FILES['r_image']; 
$image_tmp = $image['tmp_name'];
$image_name = uniqid('room_', true) . '-' . basename($image['name']);

    
    // المسار الجديد لتخزين الصور
    $upload_dir     = __DIR__ . '/../../assets/images/rooms/';
    $target         = $upload_dir . $image_name;

  
    if (move_uploaded_file($image_tmp, $target)) {
        try {
            $insert = $conn->prepare("INSERT INTO rooms 
            (r_name, r_area, r_price, quantity, adult_capacity, child_capacity, r_description, r_imag, r_status, r_removed) 
            VALUES 
            (:name, :area, :price, :quantity, :adult, :child, :descr, :image, :status, :removed)");

            $insert->bindParam(':name', $r_name, PDO::PARAM_STR);
            $insert->bindParam(':area', $r_area, PDO::PARAM_STR);
            $insert->bindParam(':price', $r_price, PDO::PARAM_INT);
            $insert->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $insert->bindParam(':adult', $adult_capacity, PDO::PARAM_INT);
            $insert->bindParam(':child', $child_capacity, PDO::PARAM_INT);
            $insert->bindParam(':descr', $r_description, PDO::PARAM_STR);
            $insert->bindParam(':image', $image_name, PDO::PARAM_STR);
            $insert->bindParam(':status', $r_status, PDO::PARAM_STR);
            $insert->bindParam(':removed', $r_removed, PDO::PARAM_INT);

            if ($insert->execute()) {
                header("Location: rooms.php");
                exit;
            } else {
                echo "فشل في إدخال البيانات.";
            }
        } catch (PDOException $e) {
            echo "خطأ في قاعدة البيانات: " . $e->getMessage();
        }
    } else {
        echo "فشل في رفع الصورة. تأكد من صلاحيات مجلد assets/image/rooms.";
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Add New Room</title>
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
        /* Fix label alignment for LTR */
        .form-floating > label {
            text-align: left;
        }
    </style>
</head>
<body>

<div class="card-room">
    <h3>Add New Room</h3>
    <?php if ($messageErr): ?>
        <div class="alert alert-danger text-center"><?= $messageErr ?></div>
    <?php endif; ?>
    <form method="POST" enctype="multipart/form-data">
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
        <div class="mb-3">
            <label class="form-label">Room Image</label>
            <input type="file" name="r_image" class="form-control" required>
        </div>
        <div class="form-floating mb-3">
            <select name="r_status" class="form-select" required>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select>
            <label>Room Status</label>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-warning btn-lg">Add Room</button>
        </div>
    </form>
</div>

</body>
</html>
