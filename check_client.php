<?php 
    session_start();
    $db=new mysqli("localhost","root","","hack") or die(mysqli_error($db));
    if(isset($_POST['email']) && isset($_POST['pass'])){
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            if(empty($email) && empty($pass)){
                header("location:client.php?error=You must fill in all the fields !");
            }
            else if(empty($email)){
                header("location:client.php?error=Email required !");
            }
            else if(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){
                header("location:client.php?error=email not  valid !");
            }
            else if(empty($pass)){
                header("location:client.php?error=Password required !");
            }
            else{
                $req=$db->query("select * from iset where email='$email'") or die($db->error);
                if($req->num_rows){
                    $row=$req->fetch_array();
                    if($row['email']==$email ){
                        $_SESSION['nom']=$row['nom'];
                        $_SESSION['id']=$row['id'];
                        $_SESSION['email']=$row['email'];
                        $_SESSION['passworde']=$row['passworde'];
                        $_SESSION['verife']=$row['verife'];
                        header("location:profil_client.php");
                    }
                }else{
                    
                    header("location:client.php?error=Incorrect username or password!");
                }
            }
    }else{
        header("location:client.php");
    }

?>