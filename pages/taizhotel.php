<?php
    require_once '../config.php';
    session_start();
    
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_SESSION['user']['user_id'])){
    $subject       = htmlspecialchars($_POST['subject']);
    $message      = htmlspecialchars($_POST['message']);
    $user_id=$_SESSION['user']['user_id'];
    
    
    
    }
    try{
        $insert = $conn->prepare('INSERT INTO user_queries (subject , massage, user_id)VALUES (:sub,:mess,:user_id)');
        $insert->bindParam(':sub', $subject, PDO::PARAM_STR);
        $insert->bindParam(':mess', $message, PDO::PARAM_STR);
        $insert->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        if($insert->execute()>0){
            echo "sending successfully";
        }else{
            echo "fialed sending";
        }
        
    }catch(PDOException $e){
        http_response_code(500);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
      <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet"> -->

<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiaz Hotel</title>
    <!-- Style Link -->
    <link rel="stylesheet" href="/assets/css/Style.css">
    <link rel="stylesheet" href="/assets/css/alert.css">
  
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
</head>

<body>
   
    <!-- Header Start -->
    <header>
        <div id="navbar">
            
            <nav role="navigation">
                <ul>
                    <li><a href="taizhotel.php">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="room.php">ROOMS</a></li>
                    <li><a href="#contact">User Queries</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <div class="content">
            <h1>Welcome To <span class="primary-text"> hotell </span> Taiz</h1>
            <p>Here you can find Most Suites and Rooms Hotell</p>
            
            
        </div>
    </header>
    <!-- Header End -->
    <>
        <!-- About Section Start -->
        <section id="about">
            <div class="container">
                <div class="title">
                    <h2>The  Hotel  Taiz</h2>
                    <p>More than 2+ years of experience</p>
                </div>
                <div class="about-content">
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, quibusdam saepe natus
                            numquam dolorum aliquam ducimus molestias tenetur? Quaerat, atque blanditiis. Debitis
                            voluptatem
                            sequi quibusdam nihil eveniet obcaecati soluta rem.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat nesciunt aspernatur earum
                            sequi
                            consequatur, quasi iste quod nam esse adipisci neque commodi voluptate deserunt architecto
                            rerum. Blanditiis labore sed sapiente.</p>
                        <a href="#" class="btn btn-secondary">LEARN MORE</a>
                    </div>
                    <img src="../assets/images/carousel/4.png" alt="carousel">
                </div>
            </div>
        </section>
        <!-- About Section End -->
        <!-- Rooms Section Start -->
        <section id="offers">
            <div class="container">
                <div class="title">
                    <h2>Our Special Offers</h2>
                    <p>More than 5+ years of experience</p>
                </div>
                <div class="offers-items">
                    <div>
                        <img src="../assets/images/rooms/IMG_78809.png" alt="room name Pasta">
                        <div>
                            <h3>room name</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quibusdam.</p>
                            <p><del>$ 100.00</del> <span class="primary-text">$80.00</span></p>
                        </div>
                    </div>
                    <div>
                        <img src="../assets/images/rooms/1.jpg" alt="Rooms">
                        <div>
                            <h3>room name </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Name, quibusdam.</p>
                            <p><del>$ 55.00</del> <span class="primary-text">$20.00</span></p>
                        </div>
                    </div>
                    <div>
                        <img src="../assets/images/rooms/2.png" alt="room name">
                        <div>
                            <h3>room name</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Name, quibusdam.</p>
                            <p><del>$ 55.00</del> <span class="primary-text">$20.00</span></p>
                        </div>
                        
                    </div>
                   
                </div>
               
            </div>
        </section>
        
        <!-- Daytime section end-->
        <!-- Gallery Section Start -->
        <section id="gallery">
            <div class="container">
                <h2>Our Rooms</h2>
                <div class="img-gallery">
                    <img src="../assets/images/rooms/IMG_11892.png" alt="gallery1">
                    <img src="../assets/images/rooms/1.jpg" alt="gallery2">
                    <img src="../assets/images/rooms/IMG_11892.png" alt="gallery3">
                    <img src="../assets/images/rooms/IMG_17474.png" alt="gallery4">
                    <img src="../assets/images/rooms/IMG_39782.png" alt="gallery5">
                    <img src="../assets/images/rooms/IMG_44867.png" alt="gallery6">
                    <img src="../assets/images/rooms/IMG_65019.png" alt="gallery7">
                    <img src="../assets/images/rooms/IMG_67761.png" alt="gallery7">
                    <img src="../assets/images/rooms/IMG_44867.png" alt="gallery8">
                    <img src="../assets/images/rooms/IMG_78809.png" alt="gallery9">
                    <img src="../assets/images/rooms/4.png" alt="">
                    <img src="../assets/images/rooms/2.png" alt="">
                </div>
                <button class="btn btn-third"><a href="#">EXPLORE FULL MENU</a></button>
            </div>
        </section>
        <!-- Gallary Section End -->
        <!-- Contact Section Start -->
        <section id="contact">
            <div class="container">
                <div class="contact-content">
                    <div class="contact-info">
                        <div>
                            <h3>ADDRESS</h3>
                            <p><i class="fa-solid fa-location-dot"></i> Hosary Mosque, 11 November, Yemen</p>
                            <p><i class="fa-solid fa-phone"></i> Phone: 780022325</p>
                            <p><i class="fa-regular fa-envelope"></i></p>
                        </div>
                        <div>
                            <h3>WORKING HOURS</h3>
                            <p>8:00 am to 11:00 pm on Weekdays</p>
                            <p>11:00 am to 1:00 Am on Weekends</p>
                        </div>
                        <div>
                            <h3>FOLLOW US</h3>
                           
                        </div>
                    </div>
                    <form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
                        <input type="text"  name="subject" id="name" placeholder="Subject" required>
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Message" required></textarea>
                        <button type="submit" name="submit" class="btn btn-third">SEND MESSAGE</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- Contact Section End -->
    </main>
    <footer id="footer">
        <p>Copyright &copy; 2024 All rights reserved | made by <b> <a href=" https://github.com/ngam2025/hotel_website "
                    target="_blank"> Ngamaldeen AL-ziazi</a> </b></p>
    </footer>
    <div id="alert-container">

    </div>
    <script src="/assets/js/alert.js"></script>

</body>

</html>