<?php 
    $db=new mysqli("localhost","root","","hack") or die(mysqli_error($db));
    $req=$db->query("select * from admin") or die($db->error);
     
    while($row=$req->fetch_array()){
        $code=$row['cod_pin'];
    }
    $code_pin_actual=$_POST['pin'];

    if($code_pin_actual!=$code){
        header("location:login_admin.php?errore=incorrect code pin!");
    }
    else{
 ?>
         <!DOCTYPE html>
         <html lang="en">
         <head>
             <meta charset="UTF-8">
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
             <title>CHANGER PASSWORD</title>
         </head>
         <body>
         <div  class="container d-flex justify-content-center align-items-center">
        <form  class="mt-5 p-5 shadow rounded"  action="changer.php" method="post">
              <?php if(isset($_GET['error'])){ ?>
                    <div class="alert alert-danger">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php }?>
             <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                     <label for="exampleInputPassword1" class="form-label">Confimer</label>
                     <input type="password" name="cpass" class="form-control" id="exampleInputPassword1">
            </div>
            <button class="btn btn-info">submit</button>
        </form>
              </div>
 </body>
</html>
   <?php }
?>