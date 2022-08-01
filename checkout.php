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
    <title>Check ||| Out</title>
    <link rel="stylesheet" href="checkoutstyles.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style type="text/css">
        .button {
  margin-top: 20px;
  margin-left: 0px;
  padding: 12px;
  width: 110px;
  border: none;
  border-radius: 25px;
  color: white;
  background: #F65E26;
  font-family: 'Poppins', sans-serif;
  font-weight: bold;
}
.swal2-styled.swal2-confirm {
  border: 0;
  border-radius: .25em;
  border-color: #F65E26;
  background: initial;
    background-color: initial;
  background-color: #F65E26;
  color: #fff;
  font-size: 1em;
}
    </style>
</head>
<body>

    <section class="checkout">

        <div class="checkout-inner">

 <center><br><a href="dashboard" style="text-align:center;color:#FF702A"><< Back to dashboard</a></center>
            <img src="/checkout/images/checkout-icon.png" alt="">
            <h1>ORDER NOW</h1>
            <div class="checkout-forms">
                <form action="post" method="POST">
                    <label class="label" for="name">FIRST NAME:</label>
                    <input type="text" class="name" id="name" name="fname" required value="<?php echo $fname; ?>"><br>
                    <label class="label" for="number">PHONE NO:</label>
                    <input type="text" class="phone-number" name="phone" required id="number" style="margin-bottom: 10px;">
                    <label class="label" for="email">EMAIL:</label>
                    <input type="text" class="phone-number" name="email" required id="email" readonly style="background:#e9e9ed" value="<?php echo $email; ?>">

                    <h3 class="label">SELECT COFFEE TYPE:</h3>
                
                    <select style="height: 35px;width: 215px;border: 1px solid #D37C59;" name="type" required>
                        <option value="">Select</option>
                        <option value="Cafe Latte">Cafe Latte (£2.10)</option>
                        <option value="Capaccino">Capaccino (£2.50)</option>
                        <option value="Espresso">Espresso (£1.55)</option>
                        <option value="Mocha Coffee">Mocha Coffee (£1.50)</option>
                        <option value="Caramel">Caramel (£2.00)</option>
                        <option value="Espresso Machino">Espresso Machino (£2.50)</option>

                    </select>
                    <br>



                  <h3 class="label">SELECT QUANTITY:</h3>
                
                    <select required style="height: 35px;width: 215px;border: 1px solid #D37C59;" name="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <br><br>
               
                  <label class="label" for="delivery-address">DELIVERY ADDRESS:</label><br>
                    <input required class="last-input" type="text" id="delivery-address" name="address">

                    <input class="button" type="submit" value="COMPLETE">

                </form>
            </div>
            
        </div>
    </section>

    <script>
    <?php
        if(isset($_SESSION['info']))
        {
            echo 'Swal.fire(\''.$_SESSION['info'].'\')';
            unset($_SESSION['info']);
        }

    ?>
</script>
</body>
</html>