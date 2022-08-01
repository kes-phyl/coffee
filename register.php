<?php
session_start();
include('db.php');

$fname = "";
$email = "";
$password = "";
$chk = "";

if(isset($_POST['fname']))
{
    $fname = $_POST['fname'];
}

if(isset($_POST['email']))
{
    $email = $_POST['email'];
}
if(isset($_POST['password']))
{
    $password = $_POST['password'];
}
if(isset($_POST['chk']))
{
    $chk = $_POST['chk'];
}

if($chk == "yes")
{
    $email = mysqli_real_escape_string($conn,$email);
    $password = mysqli_real_escape_string($conn,$password);
    $fname = mysqli_real_escape_string($conn,$fname);

    $result = $conn->query("SELECT COUNT(*) FROM tb_login WHERE email = '$email' ");
      $row = $result->fetch_row();
      $chk = $row[0];
        
        if($chk > 0)
        {
            $_SESSION['info'] = "ERROR: Email already exists";
        }
        else{
            $sql = "INSERT INTO tb_login (email, fname, password)"
              . "VALUES ('$email','$fname','$password') ";
           if ($conn->query($sql) === TRUE) {
                       //return true;, 
           }

           $_SESSION['info'] = "Registration successful";
           header('Location: login');
           exit();
        }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <div class="checkout-inner" style="height: 550px;">
            <img src="images/checkout-icon.png" alt="">
            <h1>Register</h1>
            <div class="checkout-forms">
                <form action="register" method="POST">
                    <label class="label" for="delivery-address">FULL NAME:</label><br>
                    <input class="last-input" type="text" required id="delivery-address" name="fname">

                    <label class="label" for="delivery-address">EMAIL:</label><br>
                    <input class="last-input" type="email" required id="delivery-address" name="email">
                    
               
                  <label class="label" for="delivery-address">PASSWORD:</label><br>
                    <input class="last-input" type="password" required id="delivery-address" name="password">

                    <input type="hidden" name="chk" value="yes">

                    <input class="button" type="submit" value="REGISTER">

                </form>

            </div>
            <center><br><a href="login" style="text-align: center;">Click here to login</a></center>
            
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