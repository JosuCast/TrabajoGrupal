<?php
include_once 'config.php';

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];
 
    $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";
 
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'user already exist!';
 
    }else{
 
       if($pass != $cpass){
          $error[] = 'password not matched!';
       }else{
          $insert = "INSERT INTO user_form(username, password, user_type) VALUES('$username','$pass','$user_type')";
          mysqli_query($conn, $insert);
          header('location:usuariosCrud.php');
       }
    }
 
 };

if(isset($_GET['del']))
{
    $SQL = $conn->query("DELETE FROM user_form WHERE id=".$_GET['del']);
    header("Location: usuariosCrud.php");
}

if(isset($_GET['edit']))
{   
    $SQL = $conn->query("SELECT * FROM user_form WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}
if(isset($_POST['update']))
{
    $SQL = $conn->query("UPDATE user_form SET username='".$_POST['username']."',password='".$_POST['password']."',user_type='".$_POST['user_type']."'WHERE id=".$_GET['edit']);
    header("Location: usuariosCrud.php");
}
?>