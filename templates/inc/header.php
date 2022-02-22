<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>JJAMJOBS</title>
   
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <link rel="stylesheet" href="css/front.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/show.css">
    <link rel="stylesheet" href="css/apply.css">
    <link rel="stylesheet" href="css/applicant.css">
  
     <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    
</head>
 
<body>
<section class="main-bar">
         <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid m-0">
            <a class="navbar-brand" href="<?php echo URLROOT;?>/index.php"><svg xmlns='http://www.w3.org/2000/svg' class='ionicon pb-1' height="35px" width="35px"  viewBox='0 0 512 512'><title>Footsteps</title><path d='M200 246.84c8.81 58.62-7.33 90.67-52.91 97.41-50.65 7.49-71.52-26.44-80.33-85.06-11.85-78.88 16-127.94 55.71-131.1 36.14-2.87 68.71 60.14 77.53 118.75zM223.65 409.53c3.13 33.28-14.86 64.34-42 69.66-27.4 5.36-58.71-16.37-65.09-49.19s17.75-34.56 47.32-40.21 55.99-20.4 59.77 19.74zM312 150.83c-8.81 58.62 7.33 90.67 52.9 97.41 50.66 7.49 71.52-26.44 80.33-85.06 11.86-78.89-16-128.22-55.7-131.1-36.4-2.64-68.71 60.13-77.53 118.75zM288.35 313.53c-3.13 33.27 14.86 64.34 42 69.66 27.4 5.36 58.71-16.37 65.09-49.19s-17.75-34.56-47.32-40.22-55.99-20.4-59.77 19.75z' fill='none' 
            stroke='currentColor' stroke-miterlimit='10' stroke-width='32'/></svg> <span class="logo">JJAMJOBS</span> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" height="30px" width="30px" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="<?php echo URLROOT;?>/index.php">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#job">All JOBS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#recruiters">COMPANIES</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="#site-stats">ABOUT US</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="#footer">CONTACTS</a>
                </li>
                <?php if($user &&  ($user->role == 'admin' || $user->role == 'moderator')): ?>
                  <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT;?>/create.php">CREATE</a>
                </li>
                  <li class="nav-item btn-login" >
                  <a href="">
                    <?php if($user->avatar):?>
                      <img src="<?=$user->avatar;?>" id ="appImg" alt=""class="rounded-circle mt-1" width="35">
                      <?php else:?>
                     <img src="css/user-prfile.png" id ="disImg" alt=""class="rounded-circle mt-1" width="35">
                     <?php endif;?>
                    </a>
                  <ul class="downdrop">
                    <li><a href="#" id="head-model">Image</a></li>
                    <li><a class="nav-link" href="<?php echo URLROOT;?>/logout.php">LOG OUT</a> </li>
                  </ul>
                    <!-- <a class="nav-link" href="<?php echo URLROOT;?>/logout.php">LOG OUT</a> -->
                </li>
                   <?php elseif($user  && ($user->role != 'admin' || $user->role != 'moderator')): ?>
                    <li class="nav-item btn-login">
                    <?php if($user->avatar):?>
                      <img src="<?=$user->avatar;?>" id ="appImg" alt=""class="rounded-circle mt-1" width="35">
                      <?php else:?>
                     <img src="css/user-prfile.png" id ="disImg" alt=""class="rounded-circle mt-1" width="35">
                     <?php endif;?>
                  </a>
                    <ul class="downdrop">
                    <li><a href="#" id="head-model">Image</a></li>
                    <li><a class="nav-link" href="<?php echo URLROOT;?>/logout.php">LOG OUT</a> </li>
                  </ul>
                    <!-- <a class="nav-link" href="<?php echo URLROOT;?>/logout.php"></a> -->
                   </li>
                  <?php else:?>
                    
                    <li class="nav-item btn-login">
                    <a class="nav-link" href="<?php echo URLROOT;?>/login.php">LOG IN</a>
                </li>
                 <?php endif; ?>
                
              </ul>
            </div>
          </div>
        </nav>
      </section>
      <div class="header-model" id="headModel">
        <div class="header-content">
          <span class="close-head">&times;</span>
          <div class="head-container">
                 <div class="wrap-header">
                       <div class="header-pic">
                          <img id="head-img">
                       </div>
                       <div class="head-content">
                           <div class="con"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" height="100" width="100" viewBox="0 0 512 512"><title>Cloud Upload</title><path d="M320 367.79h76c55 0 100-29.21 100-83.6s-53-81.47-96-83.6c-8.89-85.06-71-136.8-144-136.8-69 0-113.44 45.79-128 91.2-60 5.7-112 43.88-112 106.4s54 106.4 120 106.4h56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M320 255.79l-64-64-64 64M256 448.21V207.79"/></svg></div>
                            <div class="txt">No file chosen</div>
                        </div>
                        <div class="cancel-head">&times;</div>
                        <div class="head-name">File name here</div>
                   </div>
                   <form action="head.php" method="POST" enctype="multipart/form-data">
                   <input type="file" name="image" id="head-button" hidden >
                  <div class="head-button">
                  <button id="head-btn" class="btn_head" id="subBtn">Choose</button>
                    <button type="submit"class="btn_head"  name ="submit" >Submit</button>
                  </div>
                   
                   </form>
                  </div>
            </div>
         
        </div>

      </div>
      <script src="css/nav.js"></script>
      
      
      
      
      
      
      
      
    


      
    