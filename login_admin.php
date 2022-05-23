<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Log in</title>
</head>
<body>
<div  class="container d-flex justify-content-center align-items-center">
 <form class="mt-5 p-5 shadow rounded"  action="check_admin.php" method="POST">
 <h1 class="text-center mb-5">LOG IN</h1>
   <?php
    if(isset($_GET['error'])){
   ?>
   <div class="alert alert-danger">
     <?php echo $_GET['error'];?>
   </div>
    <?php }
    ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" id="submit" class="btn btn-success">LOG IN</button>
    <h6 style="color:red;" id="password"> <ins>Forgot Password !</ins> </h6>
    <button style="margin-top:-200px; margin-left:150px" class="btn btn-primary"> <a style="text-decoration:none; color:red  ;font-weight:600; postion:absolute; " href="signup_client.php"> Sign Up</a></button>
</form>
</div>

<div class="reset">
<form  action="reset_password.php" method="post">
<h1 class="text-center mb-5">Verification </h1>
<?php
    if(isset($_GET['errore'])){
   ?>
   <div class="alert alert-danger">
     <?php echo $_GET['errore'];?>
   </div>
    <?php }
    ?>
        <span id="close">X</span>
        <label for="exampleInputPassword1" class="form-label">enter your Code PIN :</label>
         <input type="text" name="pin" class="form-control" id="exampleInputPassword1">
         <button class="btn btn-info">Confirm</button>
</form>
</div>

</body>
</html>
<script>
   var afficher=document.getElementById('password');
   var close=document.getElementById('close');
   var reset=document.querySelector('.reset');
     afficher.addEventListener('click',function(){
      reset.style.display='block'
     })
     close.addEventListener('click',function(){
       reset.style.display='none';
     })
</script>




