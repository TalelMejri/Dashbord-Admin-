<?php
     session_start();
    $db=new mysqli("localhost","root","","hack") or die(mysqli_error($db));
    $update=false;
    $id=0;
    $r=0;

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $db->query("delete from iset where id='$id'");
        echo "<script>alert('delete jawha behy :) ');</script>";
        include "profil_admin.php"; 
    }
    $name='';
    $password='';
    $confirmer='';
    $email='';
    $verif=0;
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;
        $res=$db->query("select * from iset where id='$id'");
        if($res->num_rows){
            $row=$res->fetch_array();
            $name=$row['nom'];
            $email=$row['email'];
            $password=$row['passworde'];
            $confirmer=$row['confirmer'];
            $verif=$row['verife'];
        }
    }
    if(isset($_POST['modif'])){
        $verif=$_POST['ve'];
        $id=$_POST['id'];
        $nom=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $confirmer=$_POST['cpass'];
        $res=$db->query("UPDATE iset SET nom='$nom',email='$email',passworde='$pass',confirmer='$confirmer',verife='$verif'") or die($db->error);    
        echo "<script>alert('update jawha behy :) ');</script>";
        include "profil_admin.php"; 
    }

    if(isset($_GET['accept'])){
      $id=$_GET['accept'];
      $r=1;
      $req=$db->query("UPDATE iset SET verife='$r' where id='$id'");
    /*  echo "<script>alert('confirmer jawha behy :) ');</script>";*/
      include "profil_admin.php"; 
    }
    if(isset($_GET['regete'])){
        $id=$_GET['regete'];
        $db->query("delete from iset where id='$id'");
        /*echo "<script>alert('confirmer jawha behy :) ');</script>";*/
        include "profil_admin.php"; 
    }


    if(isset($_POST['save'])){
        $nomee=$_POST['name'];
        $emaile=$_POST['email'];
        $passe=$_POST['pass'];
        $cpasse=$_POST['cpass'];
        $hach=md5($passe,);
        if(empty($nomee) && empty($emaile) && empty($passe) && empty($cpasse)){
            $_SESSION['message']="You must fill in all the fields !";
            $_SESSION['msg_type']="danger";
            header("location:signup_client.php");
        }
        else if(empty($nomee)){
            $_SESSION['message']="nom required";
            $_SESSION['msg_type']="danger";
            header("location:signup_client.php");
        }
        else if(empty($emaile)){
            $_SESSION['message']="email required";
            $_SESSION['msg_type']="danger";
            header("location:signup_client.php");
        }
        else if(empty($passe)){
            $_SESSION['message']="password required";
            $_SESSION['msg_type']="danger";
            header("location:signup_client.php");
        }
        else if(empty($cpasse)){
            $_SESSION['message']="confirmer required";
            $_SESSION['msg_type']="danger";
            header("location:signup_client.php");
        }
        else if($passe!=$cpasse){
            $_SESSION['message']="confirmer egale password !!";
            $_SESSION['msg_type']="danger";
            header("location:signup_client.php");
        }
        else{
            $req=$db->query("select * from iset where email='$emaile' AND passworde='$passe'");
            if($req->num_rows){
                $_SESSION['message']="alrady exist!!";
                $_SESSION['msg_type']="danger";
                header("location:signup_client.php");
            }
            else{
                $db->query("INSERT INTO `iset` VALUES ('$id','$nomee','$emaile',' $hach',' $cpasse','0')") ;
                $_SESSION['message']="Your DEMAND send to ADMIN !";
                $_SESSION['msg_type']="success";
                header("location:signup_client.php");
            }
        }   
    }
?>