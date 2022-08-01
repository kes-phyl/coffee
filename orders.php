<?php
session_start();
include('db.php');

$email = "";
if(isset($_SESSION['email']))
{
    $email = $_SESSION['email'];
}

if($email == "")
{
    header('Location: login');
    exit();
}

$fname = "";

$sql = "SELECT * FROM tb_login WHERE email = '$email'";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) 
            {
                $fname  =  $row["fname"];
            }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> My orders ||| swift</title>
    <link rel="stylesheet" href="menu.css">
    <script src="https://kit.fontawesome.com/d7054cebbb.js" crossorigin="anonymous"></script>

</head>
<body>
    <section class="container">
        <h1>Welcome <?php echo $fname; ?> [<a href="login" style="color:#FF702A">Logout</a>]</h1>
        <h4 style="text-align: center;"><a href="dashboard" style="color:#FF702A">Click to go back to dashbord</a></h4>
        <div class="upper-menu" style="width: 50%; display: block;">
           <?php

           $count= 0;
                $sql = "SELECT * FROM tb_orders WHERE email = '$email' ORDER BY id DESC";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) 
                {
                    $date  =  $row["date_reg"];
                    $quantity  =  $row["quantity"];
                    $address  =  $row["address"];
                    $fname  =  $row["fname"];
                    $phone  =  $row["phone"];
                    $type  =  $row["coffee_type"];
                    $count++;

                    $date = date("D, M jS Y", strtotime($date));

                    echo '<div style="border:1px solid #eaeaea; padding:20px; margin-bottom:20px">';
                    echo '<p><b>Date:</b> '.$date.'</p>';
                    echo '<p><b>Coffee Type:</b> '.$type.'</p>';
                    echo '<p><b>Quantity:</b> '.$quantity.'</p>';
                    echo '<p><b>Full Name:</b> '.$fname.'</p>';
                    echo '<p><b>Phone:</b> '.$phone.'</p>';
                    echo '<p><b>Address:</b> '.$address.'</p>';
                    echo '</div>';
                }

                if($count == 0)
                {
                    echo '<center><h4>No orders yet</h4></center>';
                }

           ?>
        </div>

    </section>
</body>
</html>