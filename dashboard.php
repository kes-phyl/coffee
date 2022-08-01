<?php
session_start();
include('db.php');

$email = "";
if(isset($_SESSION['email']))
{
    $email = $_SESSION['email'];
}

if(isset($_SESSION['info']))
    {
        unset($_SESSION['info']);
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
    <title> Dashboard ||| swift</title>
    <link rel="stylesheet" href="menu.css">
    <script src="https://kit.fontawesome.com/d7054cebbb.js" crossorigin="anonymous"></script>

</head>
<body>
    <section class="container">
        <h1>Welcome <?php echo $fname; ?> [<a href="login" style="color:#FF702A">Logout</a>]</h1>
        <h4 style="text-align: center;">Please make an order or <a href="orders" style="color:#FF702A">click to see your previous orders</a></h4>
        <div class="upper-menu">
            <div class="cafe-latte"> 
                <div class="cafe-cont">
                    <h4>Cafe Latte</h4>
                    <div class="cont-text">
                            <p><i class="timer fa-solid fa-clock-rotate-left"></i>25 min away</p>
                    </div>
                    <h1><span>£</span>2.10</h1>
                    
                    <a href="checkout"><button class="btn">Order Now</button></a>
                </div>  
            </div>
            <div class="capaccino"> 
                <div class="cafe-cont-2">
                    <h4>Capaccino</h4>
                    <div class="cont-text-2">
                            <p><i class="timer-2 fa-solid fa-clock-rotate-left"></i>25 min away</p>
                    </div>
                    <h1><span>£</span>2.50</h1>
                    
                    <a href="checkout"><button class="btn">Order Now</button></a>
                </div>  
                
            </div>
            <div class="caramel">
                <div class="cafe-cont-3">
                    <h4>Caramel</h4>
                    <div class="cont-text-3">
                            <p><i class="timer-3 fa-solid fa-clock-rotate-left"></i>25 min away</p>
                    </div>
                    <h1><span>£</span>2.00</h1>
                    
                    <a href="checkout"><button class="btn">Order Now</button></a>
                </div>  
        </div>



        <div class="lower-menu">
            <div class="espresso-machino"> 
                <div class="cafe-cont-4">
                    <h4>Espresso Machino</h4>
                    <div class="cont-text-4">
                            <p><i class="timer-4 fa-solid fa-clock-rotate-left"></i>25 min away</p>
                    </div>
                    <h1><span>£</span>2.50</h1>
                    
                    <a href="checkout"><button class="btn">Order Now</button></a>
                </div>  
            </div>
            <div class="mocha-coffee"> 
                <div class="cafe-cont-5">
                    <h4>Mocha Coffee</h4>
                    <div class="cont-text-5">
                            <p><i class="timer-5 fa-solid fa-clock-rotate-left"></i>25 min away</p>
                    </div>
                    <h1><span>£</span>1.50</h1>
                    
                    <a href="checkout"><button class="btn">Order Now</button></a>
                </div>  
                
            </div>
            <div class="espresso">
                <div class="cafe-cont-6">
                    <h4>Espresso</h4>
                    <div class="cont-text-6">
                            <p><i class="timer-6 fa-solid fa-clock-rotate-left"></i>25 min away</p>
                    </div>
                    <h1><span>£</span>1.55</h1>
                    
                    <a href="checkout"><button class="btn">Order Now</button></a>
                </div>  
            </div>
        </div>
    </section>
</body>
</html>