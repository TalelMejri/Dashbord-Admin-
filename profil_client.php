<?php 
     session_start();
     $r=0;
     $db=new mysqli("localhost","root","","hack") or die(mysqli_error($db));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil </title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <div class="container">
        <aside class="top">
            <div class="logo">
                <img src="logo.png" alt="">
                <h2><span class="danger"><?=$_SESSION['nom'];?></span></h2>
            </div>
            <div class="sidebar">
                <a href="#">
                    <span class="material-symbols-sharp">
                        mail
                        </span>
                        <?php $r=$_SESSION['verife']; ?>
                        <?php if ($r==1) :?>
                    <h3>messages</h3>
                    <span class="message-count">1</span>
                        <?php else: ?>
                        <h3>messages</h3>
                    <span class="message"></span>
                        <?php endif;?>
                </a>
                <a href="#">
                    <span class="material-symbols-sharp">
                        settings 
                        </span>
                    <h3>Settings</h3>
                </a>
                <a href="logout_client.php">
                    <span class="material-symbols-sharp">
                        logout
                        </span>
                    <h3>logout</h3>
                </a>
            </div>

        </aside>
        <main>
         <h1>Email :  <?=$_SESSION['email'] ;?></h1>
            <div class="date">
                <input type="date" name="" id="">
            </div>
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-sharp">
                        analytics
                        </span>
                    <div class="middle">
                        <div class="left">
                            <h3>total expnses</h3>
                            <h1>36.2315$</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>50%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">last 24 hours</small>
                </div>
                <div class="expenses">
                    <span class=" material-symbols-sharp ">
                            stacked_line_chart                       
                            </span>
                    <div class="middle ">
                        <div class="left ">
                            <h3>total incomes</h3>
                            <h1>48.2315$</h1>
                        </div>
                        <div class="progress ">
                            <svg>
                                    <circle cx="38 " cy="38 " r="36 "></circle>
                            </svg>
                            <div class="number ">
                                <p>62%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted ">last 24 hours</small>
                </div>
                <div class="income ">

                    <span class="material-symbols-sharp">
                            balance
                            </span>

                    <div class="middle ">
                        <div class="left ">
                            <h3>balance</h3>
                            <h1>8.000$</h1>
                        </div>
                        <div class="progress ">
                            <svg>
                                    <circle cx="38 " cy="38 " r="36 "></circle>
                            </svg>
                            <div class="number ">
                                <p>15%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted ">last 24 hours</small>
                </div>
            </div>
            <div class="recent-orders">
              
        </main>

        <div class="right">
            <div class="top">
                <button id="menu-btn">
                <span class="material-symbols-sharp">
                    menu
                    </span>
            </button>
              changer Background :
                <div onclick="bg_chnage();" class="theme-toggler">
                    <span class="material-symbols-sharp active">
                    </span>
                </div> 
            </div>
            <br>
            <br>
            <br>
            <div class="recent-updates">
                <h2>Your Messages</h2>
                <div class="updates">
                    <div>
                        <?php if($r==0): ?>
                        <div class="message">    
                            Nothing!!!      
                         </div>
                        <?PHP else: ?>
                        <div class="update" >
                             Your Demand Was accepted By Admin !
                         </div>
                         <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <script>
                function randomInteger(maxrange){
                    return Math.floor(Math.random()*(maxrange+1));
                }
                function bg_chnage(){
                    const radomcolor='rgb('+randomInteger(255)+','+randomInteger(255)+','+randomInteger(255) +')';
                    document.body.style.backgroundColor=radomcolor;
                }
        </script>
</body>
</html>