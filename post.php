<?php
session_start();
include('db.php');


$fname = "";
$phone = "";
$email = "";
$type = "";
$quantity = "";
$address = "";



if(isset($_POST['fname']))
{
    $fname = filter_input(INPUT_POST, 'fname'); 
}

if(isset($_POST['phone']))
{
    $phone = filter_input(INPUT_POST, 'phone'); 
}

if(isset($_POST['email']))
{
    $email = filter_input(INPUT_POST, 'email'); 
}

if(isset($_POST['type']))
{
    $type = filter_input(INPUT_POST, 'type'); 
}

if(isset($_POST['quantity']))
{
    $quantity = filter_input(INPUT_POST, 'quantity'); 
}

if(isset($_POST['address']))
{
    $address = filter_input(INPUT_POST, 'address'); 
}

$email = mysqli_real_escape_string($conn,$email);
$phone = mysqli_real_escape_string($conn,$phone);
$fname = mysqli_real_escape_string($conn,$fname);
$type = mysqli_real_escape_string($conn,$type);
$quantity = mysqli_real_escape_string($conn,$quantity);
$address = mysqli_real_escape_string($conn,$address);


$sql = "INSERT INTO tb_orders (email, quantity, fname, address, phone, coffee_type)"
              . "VALUES ('$email','$quantity','$fname', '$address', '$phone', '$type') ";
           if ($conn->query($sql) === TRUE) {
                       //return true;, 
           }


$info = "Your order has been placed with the following details:<br><br>";
$info .= '<p><b>Name: </b>'.$fname.'</p>';
$info .= '<p><b>Phone: </b>'.$phone.'</p>';
$info .= '<p><b>Email: </b>'.$email.'</p>';
$info .= '<p><b>Coffee Type: </b>'.$type.'</p>';
$info .= '<p><b>Quantity: </b>'.$quantity.'</p>';
$info .= '<p><b>address: </b>'.$address.'</p><br><br>';
$info .= '<i>Your order will be processed and delivered in the next 30 minutes.</i>';


$_SESSION['info'] = $info;
header('Location: checkout');
exit();










