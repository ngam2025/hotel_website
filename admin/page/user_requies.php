<?php 
require_once '../../config.php';
include '../sideNAV.php'; 

$sql="SELECT q.query_id , q.subject ,q.massage ,q.send_at ,u.username , u.email 
FROM user_queries AS q JOIN users As u
ON q.user_id=u.user_id;";
$stm = $conn->prepare($sql);
$stm->execute();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room List</title>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
  

<style>
  body {
    margin: 0;
    padding-top: 5px;
    padding-left: 140px; 
    font-family: 'Cairo', sans-serif;
    background-color: #fff;
  }
  h2{
    padding-left: 50px;
    padding-top: 50px;
  }
.panel {
  width: 100%;
  max-width: 1020px;
  margin: 40px auto;
  padding:  10px;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.panel-header {
  display: flex;
  justify-content: flex-end;
  margin-bottom: 10px;
}

.btn-add {
  background-color: #ffc107;
  padding: 8px 14px;
  color: #212529;
  text-decoration: none;
  border-radius: 5px;
  font-size: 14px;
  border: none;
  transition: background-color 0.3s ease;
}

.btn-add:hover {
  background-color: #e0a800;
  color: #fff;
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

img {
  width: 50px;
  height: 35px;
  object-fit: cover;
  border-radius: 5px;
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

.btn-delete {
  background-color: #dc3545;
}

.btn-delete:hover {
  background-color: #c82333;
}

.btn-update {
  background-color: #28a745;
}

.btn-update:hover {
  background-color: #218838;
}


</style>

  

    </style>
</head>
<body>
    <h2>Users Requies</h2>
<div class="panel">
   
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Username</th>
        <th>E-mail</th>
        <th>porprty</th>
        
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $stm->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <tr>
          <td><?= $row['query_id'] ?></td>
          <td><?= $row['subject'] ?></td>
          <td><?= $row['massage'] ?></td>
          <td><?= $row['username'] ?></td>
          <td><?= $row['email'] ?></td>
           
         
          <td>
            <a href="deletr.php?id=<?= $row['query_id'] ?>" class="btn btn-delete">Delete</a>
            <a href="response.php?id=<?= $row['email'] ?>" class="btn btn-update">Response</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>




<nav class="main-menu">
       <ul>
      <li><a href="../index.php">Dashboard</a></li>
      <li><a href="bookingViwe.php">Booking</a></li>
      <li><a href="#">Users</a></li>
      <!-- <li><a href="#">Visitor Inquiries</a></li> -->
      <li><a href="rooms.php">Rooms</a></li>
      <li><a href="user_requies.php">User Qurry</a></li>
      <li><a href="#">Promotions</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </nav>
</body>
</html>
