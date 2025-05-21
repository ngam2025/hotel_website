<?PHP
try{
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = 'hoteldb';
$conn = new PDO("mysql:servername=127.0.0.1;dbname=hoteldb" , username:'root',password:'' );
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "error".$e->getMessage();

} 