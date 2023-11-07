<?php
include("server.php"); // Include the database connection file
session_start();
if (!isset($_SESSION['username'])) {
    // ถ้าผู้ใช้ไม่ได้เข้าสู่ระบบ
    echo "You need to login first."; // แสดงข้อความแจ้งเตือนหรือทำการ redirect ไปยังหน้าที่เหมาะสม
    exit(); // จบการทำงานของ script
}

    $userId = $_SESSION['username']; // ใช้ user_id ของผู้ใช้ที่เข้าสู่ระบบ
    $serviceId = $_POST["service"];
    $phonenum = $_POST["phonenum"];
    $date = $_POST["reservation_date"];
    $slot = $_POST["slot"];


    // Insert the reservation into the database
    $sql = "INSERT INTO reservation (service_id, phonenum, reservation_date, time_slot) 
            VALUES ('$serviceId', '$phonenum' , '$date', '$slot')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully created!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    
        // เปลี่ยนเส้นทางหน้าไปยังหน้า "Reservation Success"
        header("Location: payment.php");
        exit();
    
    
    


    
    $conn->close();

?>

