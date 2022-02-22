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
            <div class="container_form">
            <a href="index.php" class="back"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon " width="20"  height="20" viewBox="0 0 512 512"><title>Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg></a>

                <h4 class="page-header">Job Registration Form</h4>
                <form method= "POST" action="create.php" enctype="multipart/form-data" class="form" autocomplete="off" >
                <div class="file-upload">
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type="file" onchange="readURL(this);" name="image" accept="image/*" id="profile" required="">

                        </div>
                        <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                        class="image-title" id="foooor">Uploaded Image</span></button>
                            </div>
                        </div>
                        <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )" id="file-upload-btn">Add Company Image</button>
                </div>
                <div class="errorMessage"><?=$errorMsg["imageErr"];?></div>

                <div class="input_field">
                    <label for="#">Company</label>
                    <input type="text" name="company" class="input">
                    
                </div>
                <div class="errorMessage"><?=$errorMsg["companyErr"];?></div>
                <div class="input_field">
                    <label for="#">Categories</label>
                    <div class="select_custom">
                    <select name="category" id="selection">
                    <Option value ="">Choose category</Option>
                    <?php foreach($categories as $category):?>
                    <option value="<?php echo $category->id;?>" <?php if($category->id == $category) echo "selected" ?>><?php echo strtoupper($category->name);?></option>
                    <?php endforeach;?>
                    </select>
                    </div>
                </div>
                <div class="errorMessage"><?=$errorMsg['categoryErr'];?></div>
                <div class="input_field">
                    <label for="#">Job title</label>
                    <input type="text" name="job_title" class="input">
                </div>
                <div class="errorMessage"><?=$errorMsg["jobtitleErr"];?></div>
                <div class="input_field">
                    <label for="#">Job Description</label>
                    <textarea class="text_area" name="description"></textarea>
                </div>
                <div class="errorMessage"><?=$errorMsg["descriptionErr"];?></div>
                <div class="input_field">
                    <label for="#">Work Experiance</label>
                    <input type="text" name="work"class="input">
                </div>
                <div class="errorMessage"><?=$errorMsg["workErr"];?></div>
                
                <div class="input_field">
                    <label for="#">Job salary</label>
                    <input type="text" name="salary" class="input">
                    </div>
                   
                    <div class="errorMessage"><?=$errorMsg['salaryErr'];?></div>
                    <div class="input_field">
                    <label for="#"> Job Location</label>
                        <input type="text" name="location" class="input">
                    </div>
                <div class="errorMessage"><?=$errorMsg['locationErr'];?></div>
                <div class="input_field">
                    <label for="#">Contact person</label>
                    <input type="text" name="contact_user" class="input">
                </div>
                <div class="errorMessage"><?=$errorMsg['contactErr'];?></div>
                <div class="input_field">
                    <label for="#">Phone Number</label>
                    <input type="number" name="contact_num" class="input">
                </div>
                <div class="errorMessage"><?=$errorMsg['phoneErr'];?></div>
                <div class="input_field">
                    <label for="#">Contact Email</label>
                    <input type="email" name="contact_email" class="input">
                </div>
                <div class="errorMessage"><?=$errorMsg['emailErr'];?></div>
                
                
                    <div class="input_field">
                    <label for="#"> Job Address</label>
                    <textarea class="text_area" name="address"></textarea>
                    </div>
                    <div class="errorMessage"><?=$errorMsg["addressErr"];?></div>
                    <div class="input_field">
                    <label for="#">Issued Date</label>
                    <input type="date" name="date" class="input">
                </div>
                <div class="errorMessage"><?=$errorMsg['dateErr'];?></div>
                    
                    
                <div class="input_field terms">
                    <label for="c2" class="check">
                        <input type="checkbox" name="accepted" id="c2" class="checkbox" value="Yes">
                        <span class="checkmark"></span>
                    </label>
                    <div class="agree">Agreed to terms and conditions </div>
                
                </div>
                <div class="errorMessage"><?=$errorMsg['acceptedErr'];?></div>
                <div class="input_field">
                <input type="submit"  class="primary_btn" value="submit" name="submit" >

                </div>
                

                </form>
                    </div>         
        </div>
    </div>
 </section>
 <footer>
     
  <script src="css/jquery-3.5.1.slim.min.js"></script>
 <script src="css/jquery.min.js"></script>
      <script src="css/bootstrap.min.js"></script>
      <script src="css/smooth-scroll.js"></script>
      <script src="css/create.js"></script>
      <script>
 </footer>
