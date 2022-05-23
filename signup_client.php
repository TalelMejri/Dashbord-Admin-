<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up Client</title>
</head>
<body>
    <?php require_once "process.php"; ?>
     <div class="container d-flex justify-content-center align-items-center">
        <form class="mt-5 p-5 shadow rounded" action="process.php" method="post">
            <?php  if($update==false) :?>
        <h1 class="text-center mb-5">SIGN UP</h1>
        <?php else:?>
            <h1 class="text-center mb-5">Upadte</h1>
        <?php endif; ?>
        <?php if(isset($_SESSION['message'])){?>
            <div class="alert alert-<?=$_SESSION['msg_type'];?>">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php }?>
    <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $id; ?>">
        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name </label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?php echo $name; ?>">
         </div>
        <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>">
         </div>
         <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Password</label>
                 <?php if ($update==false) :?>
                 <input type="password" name="pass" class="form-control" id="exampleInputPassword1" value="<?php echo $password; ?>">
                 <?php else:?>
                    <input type="text" name="pass" class="form-control" id="exampleInputPassword1" value="<?php echo $password; ?>">
                 <?php endif; ?>
                </div>
         <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Confirmer Your Password</label>
                 <input type="password" name="cpass" class="form-control" id="exampleInputPassword1" value="<?php echo $confirmer; ?>">
         </div>
         <input type="hidden" name="ve" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $verif; ?>">
            <?php if($update==false): ?>
                 <button type="submit" name="save"  class="btn btn-success">Submit</button>
                 <button style=" margin-left:150px" class="btn btn-primary"> <a style="text-decoration:none; color:red  ;font-weight:600; postion:absolute; " href="client.php">Log in client</a></button>
              <?php else: ?>
                 <button type="submit" name="modif"  class="btn btn-primary">update</button>
            <?php endif;?>
     </form>
     </div>
</body>
</html>