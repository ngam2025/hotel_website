<?php 
session_start();
if(empty($_SESSION['user_id']) && !empty($_COOKIE['loged_in']) && empty($_SESSION['username']) && !empty($_COOKIE['username']) && empty($_SESSION['userImage']) && !empty($_COOKIE['userImage'])){
  $_SESSION['user_id']=$_COOKIE['loged_in'];
  $_SESSION['username']=$_COOKIE['username'];
  $_SESSION['userImage']=$_COOKIE['userImage'];
}
if(!empty($_SESSION['user_id']) && !empty($_SESSION['username']) && !empty($_SESSION['userImage'])){
  header('Location:../pages/taizhotel.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Taiz Hotel</title>
    <link rel="stylesheet" href="/assets/css/stylehotel.css">
</head>

<body>
   
  <nav id="top">
    <h2><span>TAIZ</span> HOTEL</h2>
    
    <ul>
      <li><a href="register.php">انشاء حساب</a></li>
      <li><a href="login.php" >تسجيل الدخول</a></li>
      
      
    </ul>
  </nav>
    
  <section>
    Welcome to the five-star Taiz Hotel<br>
    enjoy a great stay!
  </section>
  <a href="#top"><button class="totop">↥</button></a>
  <div class="cards">
    <div class="card1">
      Welcome to <br>
      experience the ultimate luxury, book your room or suite now.<br>
      all services you need are here as long as you live 24 hour a day<br>
      
    </div>
    
    <div class="card2">
      The best hotel five-star in the area, Taiz Hotel<br>
      -Best Services -Unparallel Comfort! <br>
      <a href="about.html">
      <label>More information → </label>
      <button type="button" class="bt"> About us </button>
      </a> 
    </div>
    <img src="/assets/images/carousel/3.png">
    
  </div>

  

  
  <p class="location">Location: Taiz, Bir bash, street no:123456 <br>
    Taiz Hotel</p>

  <div class="list-services">
    <ul>
      <li>Online Booking</li>
      <li>Pay by Credit Card</li>
      <li>Online Order</li>
    </ul>

    <ul>
      <li>Five-star service</li>
      <li>Modern Romms-Suites</li>
      <li>Bure look</li>
    </ul>

    <ul>
      <li>Healthy Food</li>
      <li>Order Food from Best Resturant</li>
      <li>Special Offers</li>
    </ul>
  </div>

  <footer>
    <img src="/assets/images/whatsapp.png">
    <img src="/assets/images/facebook.png">
    <img src="/assets/images/twitter.png">
    <img src="/assets/images/instagram.png">
    <img src="/assets/images/youtube.png">
    <p>&copy; All rights are save</p>
  </footer>
  <footer id="footer">
    <p>Copyright &copy; 2024 All rights reserved | made by <b> <a href="https://Restaurant HotelTiaz.com "
                target="_blank"> Ngamaldeen AL-ziazi</a> </b></p>
</footer>

</body>
</html>