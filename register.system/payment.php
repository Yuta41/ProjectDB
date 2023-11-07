
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style_payment.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" href="style.css">
    <title>Payment</title>
</head>
<body>

   


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>payment</title>

  <link rel="stylesheet" href="style_payment.css">
</head>
<body>
<body>

<div class ="header">
    <h2>Payment</h2>
    </div>
     <div class="image_payment">  
     <div class ="form_payment">
        <img src="\register.system\paymentpic.jpg" >
     
     <h3 for="username">ชำระเงิน 800 บาท</h3>

     
     



    <div class="container col-12 m-5">
       <div class="col-6 m-auto">

        <?php
      if(isset($_POST['btn_img']))
      {
        $con = mysqli_connect("localhost","root","","register_db");

        $filename = $_FILES["choosefile"]["name"];
        $tempfile = $_FILES["choosefile"]["tmp_name"];
        $folder = "image/".$filename;
        $sql = "INSERT INTO `payment`(`image`)VALUES('$filename')";
        if($filename == "")
        {
            echo 
            "
            <div class='alert alert-danger' role='alert'>
                <h4 class='text-center'>Blank not Allowed</h4>
            </div>
            ";
        }else{
            $result = mysqli_query($con, $sql);
            move_uploaded_file($tempfile, $folder);
            echo "
            <script>
              window.location.href = 'success.php';
            </script>
    ";
        }
      }
      
        ?>
        
         <form action="payment.php" method="post" class="form-control" enctype="multipart/form-data">
            <input type="file" class="form-control" name="choosefile"  id="">
            <div class="col-6 m-auto ">
            
                <button type="submit" name="btn_img" class="btn btn-outline-success m-4" >
                Submit
            </button>
            </div>
        </form>
       








        


        

      
    

       </div>
    </div>
    </div>
</body>
</html>