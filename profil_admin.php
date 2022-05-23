<?php
  $db=new mysqli("localhost","root","","hack") or die(mysqli_error($db));
  $r=0;
  session_start();
?>   
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashbord</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="./pic/logo.jpg">
          <span class="nav-item"><?php echo  $_SESSION['nom']; ?></span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Message</span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-database"></i>
          <span class="nav-item">Report</span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-chart-bar"></i>
          <span class="nav-item">Attendance</span>
        </a></li>
        <li><a href="#">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Setting</span>
        </a></li>
        <li><a href="log_outadmin.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span  class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>
    <section class="main">
      <div class="main-top">
      <i class="fas fa-user-cog"></i>
        <h1>Demande</h1>
      </div>
      <?php $req=$db->query("select * from iset where verife=0 ") ;
            while($row=$req->fetch_array()){
              $r=$row['verife'];
            } ?>
            <?php if($r==0){?>
      <div class="users">
      <?php $req=$db->query("select * from iset where verife=0");
                while($row=$req->fetch_array()){
                  $rd=$row['id']; ?>
        <div class="card">
          <img src="./pic/img1.jpg">
          <h4><?php echo $row['nom']; ?></h4>
          <p>Name </p>
          <div class="per">
            <table>
              <tr>
                <td><span><?php echo $row['email']; ?></span></td>
                <td><span><?php echo $row['passworde']; ?></span></td>
              </tr>
              <tr>
                <td>email</td>
                <td>password</td>
              </tr>
            </table>
          </div>
          <button><a onclick="return confirm('do you want accepter !');" href="process.php?accept=<?php echo $rd?>">accept</a> <a  onclick="return confirm('do you want regete !');" href="process.php?regete=<?php echo $rd?>">regete</a> </button>
        </div>
        <?php } ?> </div>
<?php }?>
      <section class="attendance">
        <div class="attendance-list">
          <h1>Clients :</h1>
          <table  class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>confirmed</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $res=$db->query("select * from iset where verife!=0");
              while($row=$res->fetch_array()){
                $r=$row['id'];?>
                  <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['nom']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['passworde']; ?></td>
                      <td><?php echo $row['verife'] ; ?></td>
                      <td><a onclick=" return confirm('do you want update <?php echo $row['nom'] ?>');" href="signup_client.php?edit=<?php echo $r; ?>"  ><img width="30px" height="30px" src="edit.png"></a><a onclick=" return confirm('do you want delete <?php echo $row['nom'] ?>');" href="process.php?delete=<?php echo $r; ?>"> <img width="30px" height="30px" src="delete.jpg"></a></td>
                  </tr>
<?php   }?>

            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>
  <script src="index.js"></script>
  <div class="popup">
            <h2>   Welcome <?php echo $_SESSION['nom']; ?>  <br>
          Email :<?php echo $_SESSION['email']; ?> </h2>
         
            <b id="cl">X</b>
        </div>
        <canvas id="my-canvas"></canvas>

 <script>
    let close=document.getElementById('cl');
    let affiche=document.querySelector('.popup');
    let canva=document.querySelector('#my-canvas');
    close.addEventListener('click',function(){
            affiche.style.display='none';
            canva.style.display='none';
        })
   var confettiSettings = { target: 'my-canvas' };
  var confetti = new ConfettiGenerator(confettiSettings);
  confetti.render();
  </script>
</body>
</html>
