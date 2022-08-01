<?php
session_start();
include('db.php');


if(isset($_SESSION['email']))
{
    unset($_SESSION['email']);
}

$email = "";
$password = "";
$chk = "";



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
    $result = $conn->query("SELECT COUNT(*) FROM tb_login WHERE email = '$email' AND password = '$password' ");
      $row = $result->fetch_row();
      $chk = $row[0];
        
        if($chk == 0)
        {
            $_SESSION['info'] = "ERROR: Invalid email or password";
        }
        else{
            $_SESSION['email'] = $email;

           $_SESSION['info'] = "Login successful";
           header('Location: dashboard');
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
    <title>Login</title>
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
        <div class="checkout-inner" style="height: 450px;">
            <img src="/checkout/images/checkout-icon.png" alt="">
            <h1>LOGIN</h1>
            <div class="checkout-forms">
                <form action="login" method="POST">
                    <label class="label" for="delivery-address">EMAIL:</label><br>
                    <input class="last-input" type="email" required id="delivery-address" name="email">
                    
               
                  <label class="label" for="delivery-address">PASSWORD:</label><br>
                    <input class="last-input" type="password" required id="delivery-address" name="password">

<input type="hidden" name="chk" value="yes">
                    <input class="button" type="submit" value="LOGIN">

                </form>
            </div>
                <center><br><a href=register style="text-align: center;">Click here to register</a></center>
            
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