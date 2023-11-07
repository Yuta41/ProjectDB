<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
    // ถ้าผู้ใช้ไม่ได้เข้าสู่ระบบ
    header("Location: login.php"); // ส่งผู้ใช้ไปยังหน้าเข้าสู่ระบบ
    exit(); // จบการทำงานของ script
}
  
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
  }

  

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['username']; // ใช้ user_id ของผู้ใช้ที่เข้าสู่ระบบ
    $serviceId = $_POST["service"];
    $phonenum = $_POST["phonenum"];
    $date = $_POST["reservation_date"];
    $slot = $_POST["slot"];

    // โค้ด PHP สำหรับการบันทึกข้อมูลการจองลงในฐานข้อมูล
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>

  <link rel="stylesheet" href="style_2.css">
</head>
<body>
  <div class="header">
    <h2>Reservation</h2>
    </div>
   
    <div class="reserv_content">
      
        <form action="process_reservation.php" method="post">
            <label for="service">Select Service:</label>
            <select name="service" id="service">
              <option value="1">นวดไทยโยคะ</option>
              <option value="2">นวดทางการแพทย์</option>
              <option value="3">นวดสปา</option>
              <option value="4">นวดผ่อนคลายเพื่อสุขภาพ</option>
              <option value="5">นวดแบบฟรีสไตล์</option>
                <?php
                
                // Fetch services from the database and populate the dropdown
                // Example query: SELECT * FROM services;
                ?>
            </select>

            <label for="phonenum">Phone Number:</label>
            <input type="text" name="phonenum" id="phonenum" required>


            <label for="date">Reservation Date:</label>
            <input type="date" name="reservation_date" id="date" required>

            <label for="slot">Select Time Slot:</label>
            <select name="slot" id="slot" required>
                <option value="10:00am-12:00pm">10:00 am - 12:00 pm</option>
                <option value="12:00pm-2:00pm">12:00 pm - 2:00 pm</option>
                <option value="2:00pm-4:00pm">2:00 pm - 4:00 pm</option>
                <option value="4:00pm-6:00pm">4:00 pm - 6:00 pm</option>
                <option value="6:00pm-8:00pm">6:00 pm - 8:00 pm</option>
                <!-- เพิ่ม options ต่อไปตามต้องการ -->
            </select>

            <button type="submit" >Submit Reservation</button>
            </form>

            

        </form>
    </div>
    

    <script>
        // Ensure that the datetime input field does not allow past dates and times
        const dateTimePicker = document.getElementById("datetime");
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, "0");
        const day = String(now.getDate()).padStart(2, "0");
        const hours = String(now.getHours()).padStart(2, "0");
        const minutes = String(now.getMinutes()).padStart(2, "0");
        const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
        dateTimePicker.setAttribute("min", minDateTime);
    </script>

    <div class="homecontent">
      <!== notification message==>
      <?php if (isset($_SESSION['success'])) :?>
         <div class ="success">
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </h3>
         </div>
      <?php endif ?>
      

      
  
      <!== logged in user information ==>
      <?php if (isset($_SESSION['username'])): ?>
         <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
         <p><a href="index.php?logout='1'" stlye="color: red;">Logout</a></p>
      <?php endif ?>
     </div>
    
  
</body>
</html>


