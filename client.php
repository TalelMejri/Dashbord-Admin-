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
 <form class="mt-5 p-5 shadow rounded"  action="check_client.php" method="post">
 <h1 class="text-center mb-5">LOG IN CLIENT</h1>
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
    <button style=" margin-left:150px" class="btn btn-primary"> <a style="text-decoration:none; color:red  ;font-weight:600; postion:absolute; " href="signup_client.php"> Sign Up</a></button>
</form>
</div>
</body>
</html>