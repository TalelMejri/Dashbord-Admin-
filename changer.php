<?php 

    $db=new mysqli("localhost","root","","hack") or die(mysqli_error($db));
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    if(empty($pass)){
         header("location:reset_password.php?error=pass required !");
    }
    else if(empty($cpass)){
        header("location:reset_password.php?error=confiRmer pass required !");
    }
    else if($cpass!=$pass){
        header("location:reset_password.php?error=must confimer egale password !");
    }
    else{
        $req=$db->query("UPDATE `admin` SET `password`='$pass'") or die($db->error);
        echo"<script>alert('password has changed !');</script>";
        include "reset_password.php";
    }
    
?>