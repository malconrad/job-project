<?php include 'inc/header.php'?>
<section class="animations">
    <div class="animations-container">

            <div class="ani ani-1">
                <div class="ani-cube">
                    <div class="cube-face face_front">
                    </div>
                    <div class="cube-face face_right"> </div>
                    <div class="cube-face face_left">
                    </div>
                    <div class="cube-face face_top"></div>
                    <div class="cube-face face_bottom"></div>
                    <div class="cube-face face_back"></div>
                </div>
            </div>
            <div class="ani ani-2">
                <div class="ani-cube ani-cube-2">
                    <div class="cube-face face_front"></div>
                    <div class="cube-face face_right">

                    </div>
                    <div class="cube-face face_left"></div>
                    <div class="cube-face face_top"></div>
                    <div class="cube-face face_bottom"></div>
                    <div class="cube-face face_back"></div>
                </div>
            </div>
            <div class="ani ani-3">
                <div class="ani-cube ani-cube-3">
                    <div class="cube-face face_front"></div>
                    <div class="cube-face face_right"></div>
                    <div class="cube-face face_left"></div>
                    <div class="cube-face face_top"></div>
                    <div class="cube-face face_bottom"></div>
                    <div class="cube-face face_back"></div>
                </div>
            </div>
            <div class="ani ani-4">
                <div class="ani-hamburger">
                    <div class="hamburger-line hamburger-line_top"></div>
                    <div class="hamburger-line hamburger-line_middle"></div>
                    <div class="hamburger-line hamburger-line_bottom"></div>
                </div>
            </div>
            <div class="ani ani-5">
                <div class="moving-square-frame">

                </div>
                <div class="ani-moving-square"></div>
            </div>
            <div class="ani ani-6">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1024 1024">
                <path id="followPath"
                    d="M394.1-214.9c-49.7,89.4,114.4,192.8,175.5,475.1c13,60.1,85.4,424-98.1,552.6 c-95.7,67-267.2,74.5-346.3-22.1c-70.8-86.5-49-233.9,19.2-305.2c102.4-107,353.9-89.1,593.2,96.5c139.6,107,294.1,258.4,415,468.6 c19.2,33.5,36.6,66.6,52.3,99.3c13,8.6,34,19.5,53.3,13.2c148-48.6,165.1-1094.5-338.5-1374.8C723.7-320.8,449-313.8,394.1-214.9z">
                </path>
                <path id="dashedPath"
                    d="M394.1-214.9c-49.7,89.4,114.4,192.8,175.5,475.1c13,60.1,85.4,424-98.1,552.6 c-95.7,67-267.2,74.5-346.3-22.1c-70.8-86.5-49-233.9,19.2-305.2c102.4-107,353.9-89.1,593.2,96.5c139.6,107,294.1,258.4,415,468.6 c19.2,33.5,36.6,66.6,52.3,99.3c13,8.6,34,19.5,53.3,13.2c148-48.6,165.1-1094.5-338.5-1374.8C723.7-320.8,449-313.8,394.1-214.9z">
                </path>
                <path id="airplain" d="M8.04 84L92 48 8.04 12 8 40l60 8-60 8z">
                    <animateMotion xlink:href="#airplain" dur="6s" fill="freeze" repeatCount="indefinite" rotate="auto">
                        <mpath xlink:href="#followPath"></mpath>
                    </animateMotion>
                </path>
                
            </svg>
            </div>

            </div>
        <div class="conta">
                <p class="line stroke1"></p>
                <p class="line stroke2"></p>
                <p class="line stroke3"></p>
                <div class="container-form">
                <a href="jobView.php?id=<?=$job->id;?>" class="back"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon " width="20"  height="20" viewBox="0 0 512 512"><title>Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg></a>

                    <h4 class="page"> <?=strtoupper($job->job_title);?></h4>
                    
                    <div class="job-image">
                        <div class="job-wrapper">
                            <div class="img-content">
                            <img src="<?=$job->image;?>" alt="" class="job-img">
                            </div>
                            
                        </div>
                    </div>
                    <form action="apply.php" method="POST" enctype="multipart/form-data" class="appform" autocomplete="off" >
                    <input type="hidden" name="job_id" value = "<?=$job->id; ?>">
                        <input type="hidden" name="user_id" value = "<?=$user->id;?>">
                        <input type="text" name="name" class="appinput" placeholder="Name" value=<?=strtoupper($user->name);?>> <br><br>
                        <input type="email" name="email" placeholder="Email" class="appinput" value=<?=$user->email;?>><br><br>
                        <select name="country" class="appselect"  >
                            <option value="" selected >East Africa Country</option>
                            <option value="">Uganda</option>
                            <option value="">Kenya</option>
                            <option value="">Tanzania</option>
                            <option value="">Rwanda</option>
                            <option value="">Congo</option>
                            <option value="">Sudan</option>
                            
                        </select><br><br>
                        <div class="code-phone">
                        <select name="code" id="phone">
                            <option value="+256">+256</option>
                            <option value="+456">+456</option>
                            <option value="+912">+912</option>
                            <option value="+314">+314</option>
                            <option value="+678">+678</option>
                            <option value="+979">+979</option>
                            <option value="+919">+919</option>
                        </select>
                        <input type="number" name="phone" size="30" maxlength="9" class="ph-num" placeholder="123456789">
                        </div>
                       
                        <br>
                        
                        <select name="education" id="" class="appselect">
                            <option value="">Education Levels</option>
                            <option value="Masters">Masters</option>
                            <option value="PHD">PHD</option>
                            <option value="Degree">Degree</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Certificate">Certificate</option>
                            
                        </select><br><br>
                        <input type="text" name="qualification" placeholder="Your Qualification" class="appinput"><br><br>
                        <input type="text" name="experiance" placeholder="Experience In Years" class="appinput"><br><br>
                        
                        <select name="status" id="" class="appselect">
                            <option value="">Select your status</option>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Cohabiting">Cohabiting</option>
                        </select><br><br>
                        <input type="number" name="age" class="appinput"  placeholder="Your Age"><br><br>
                        
                        <div class="input-radio">
                        <h6>Are you currently employed<h6>
                         <div class="radio">
                              <input type="radio" name="answer" id="yes"  value="Yes"/>
                            <label for="yes">Yes</label>
                            <input type="radio" name="answer"  id="no"  value="no"/>
                            <label for="no">No</label>
                            </div>
                        </div> <br>
                        <input type="text" name="current_orgn" placeholder="Current Organisation" class="appinput"><br><br>
                        <div class="input-field">
                        <label for="#"> Job Address</label>
                        <textarea class="text_area" name="address" placeholder="Job Address"></textarea>
                        </div>   
                        <div>
                            
                        </div>
                        <div class="terms-cont">
                            <div class="contentBx">
                                <div class="label">Terms And Conditions</div>
                                <div class="condition">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aliquid,
                                     exercitationem facilis, voluptatibus nihil debitis maiores quia repellat
                                 </p> 
                                 
                                </div>
                            </div>
                        </div>
                <input type="submit" value="submit" class="App-btn" name="submit" >

                    </form>
                
                 </div>         
        </div>
    </div>
 </section>

      <script src="css/apply.js"></script>
      <script>

