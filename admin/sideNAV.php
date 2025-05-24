<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Taiz Hotel - Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Titillium+Web:300&display=swap');

    body {
      margin: 0;
      font-family: 'Cairo', sans-serif;
      background-color: #f4f4f4;
      direction: ltr;
    }

    .header {
      background-color: #212121;
      color: #ffc107;
      padding: 0 20px;
      font-size: 25px;
      font-weight: bold;
      position: fixed;
      top: 0;
      left: 0;
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
  /* background: #ffc107; */
      border-right: 1px solid #e5e5e5;
      position: fixed;
      top: 50px;
      bottom: 0;
      left: 0;
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

  </style>
</head>
<body>

  <div class="header">
    Taiz Hotel
    <button class="logout-button" src="logout.php">Logout</button>
  </div>

  <nav class="main-menu">
    <ul>
      <li><a href="page/dashbord.php">Dashboard</a></li>
      <li><a href="#">Reservations</a></li>
      <li><a href="#">Users</a></li>
      <li><a href="#">Visitor Inquiries</a></li>
      <li><a href="page/rooms.php">Rooms</a></li>
      <li><a href="#">Facilities & Services</a></li>
      <li><a href="#">Promotions</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </nav>
