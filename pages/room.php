<?php
require_once '../config.php';
session_start();

try {
    $stmt = $conn->prepare("SELECT * FROM rooms WHERE r_status ='Available' AND r_removed = 0");
    $stmt->execute();
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Connection failed: " . $ex->getMessage());
}
?>

<!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .room-card {
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .room-card:hover {
            transform: translateY(-5px);
        }
        .room-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .room-info {
            padding: 20px;
        }
    </style>
</head>
<body>
     <form action="booking.php" method="GET">
    <header class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1>Discover Our Rooms and Book Your Stay</h1>
        </div>
    </header><main class="container my-5">
    <?php if ($rooms): ?>
    <div class="row g-4">
        
        <?php foreach ($rooms as $room): ?>
            <div class="col-md-6 col-lg-4">
                <div class="room-card bg-white">
                    
                    <?php $imag=htmlspecialchars($room['r_imag'] )?>
                    <img src="<?php echo "../assets/images/rooms/".$imag ?>" alt="">
                    <div class="room-info">
                        <h5><?= htmlspecialchars($room['r_name']) ?></h5>
                        <p><?= nl2br(htmlspecialchars($room['r_description'])) ?></p>
                        <ul class="list-unstyled">
                            <li><strong>Area:</strong> <?= htmlspecialchars($room['r_area']) ?> m²</li>
                            <li><strong>Adults:</strong> <?= htmlspecialchars($room['adult_capacity']) ?></li>
                            <li><strong>Children:</strong> <?= htmlspecialchars($room['child_capacity']) ?></li>
                            <li><strong>Price:</strong> <?= htmlspecialchars($room['r_price']) ?> SAR/night</li>
                            <?php
                            $_SESSION['room_id']=$room['r_id'];
                            ?>
                        </ul>
                        <?php echo '<a class="btn btn-success w-100 mt-3" href="booking.php? room_i='.$room['r_id'].'">Book Now</a>'?>
                    </div>
                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <div class="alert alert-warning text-center" role="alert">
            No rooms available at the moment.
        </div>
    <?php endif; ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</form>
</body>
</html>