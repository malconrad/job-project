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
                <a href="jobView.php?id=<?=$job->id;?>" class="back"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon " width="20"  height="20" viewBox="0 0 512 512"><title>Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg></a>
                <h4 class="page-header">Job Edit Form</h4>
                    <form method= "POST" action="edit.php" enctype="multipart/form-data" class="form" autocomplete="off" >
               <div class="contain_file">
                   <div class="wrapper">
                       <div class="image-pic">
                           <img src="<?=$job->image;?>"  id="img-pic">
                           <img id="img" >
                       </div>
                       <div class="content">
                           <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" height="50" width="50" viewBox="0 0 512 512"><title>Cloud Upload</title><path d="M320 367.79h76c55 0 100-29.21 100-83.6s-53-81.47-96-83.6c-8.89-85.06-71-136.8-144-136.8-69 0-113.44 45.79-128 91.2-60 5.7-112 43.88-112 106.4s54 106.4 120 106.4h56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M320 255.79l-64-64-64 64M256 448.21V207.79"/></svg></div>
                            <!-- <div class="text">Edit image</div> -->
                        </div>
                        <div class="cancel-btn">&times;</div>
                        <div class="file-name">file name here</div>
                   </div>
                    <input type="file" name="image" id="upload-button" hidden >
                    
                    <button id="default-btn">Edit Company Image</button>
                 </div>
                    
            <div class="input_field">
                    <label for="#">Company</label>
                    <input type="hidden" name="id" value="<?=$job->id;?>">
                    <input type="text" name="company" class="input" value="<?=$job->company; ?>">
                    
                </div>
            
                <div class="input_field">
                    <label for="#">Categories</label>
                    <div class="select_custom">
                    <select name="category" id="selection">
                    <Option value ="">Choose category</Option>
                    <?php foreach($categories as $category):?>
                        <?php if($job->categories_id == $category->id): ?>
                            <option value= "<?php echo $category->id;?>" selected> <?php echo $category->name;?></option>
                            <?php else: ?>
                            <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                            <?php endif;?>
                            <?php endforeach;?>
                    </select>
                    </div>
                </div>
        
                <div class="input_field">
                    <label for="#">Job title</label>
                    <input type="text" name="job_title" class="input" value="<?=$job->job_title;?>">
                </div>
            
                <div class="input_field">
                    <label for="#">Job Description</label>
                    <textarea class="text_area" name="description"> <?=$job->description;?></textarea>
                </div>
                
                <div class="input_field">
                    <label for="#">Work Experiance</label>
                    <input type="text" name="work"class="input" value="<?=$job->work_exp;?>">
                </div>
                
                <div class="input_field">
                    <label for="#">Job salary</label>
                    <input type="text" name="salary" class="input" value="<?=$job->salary;?>">
                    </div>
                   
                    <div class="input_field">
                    <label for="#"> Job Location</label>
                        <input type="text" name="location" class="input" value="<?=$job->location;?>">
                    </div>
                <div class="input_field">
                    <label for="#">Contact person</label>
                    <input type="text" name="contact_user" class="input" value="<?=$job->contact_user;?>">
                </div>
                <div class="input_field">
                    <label for="#">Phone Number</label>
                    <input type="number" name="contact_num" class="input" value="<?=$job->phone;?>">
                </div>
                <div class="input_field">
                    <label for="#">Contact Email</label>
                    <input type="email" name="contact_email" class="input" value="<?=$job->contact_email;?>">
                </div>                
                
                    <div class="input_field">
                    <label for="#"> Job Address</label>
                    <textarea class="text_area" name="address"> <?=$job->address;?></textarea>
                    </div>
                    <div class="input_field">
                    <label for="#">Issued Date</label>
                    <input type="date" name="date" class="input" value="<?=$job->date;?>">
                </div>
                    
                    
                <div class="input_field terms">
                    <label for="c2" class="check">
                        <input type="checkbox" name="accepted" id="c2" class="checkbox"value="<?=$job->accepted;?>">
                        <span class="checkmark"></span>
                    </label>
                    <div class="agree">Agreed to terms and conditions </div>
                
                </div>
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
      <script src="css/edit.js"></script>
    <script>
 </footer>


   


// <!-- <div class="form-group">
//         <label for="#">Categories</label>
//         <select name="category" class="form-control">
//           <Option value ="0">Choose category</Option>
//           <?php foreach($categories as $category):?>
//           <?php if($job->categories_id == $category->id): ?>
//           <option value= "<?php echo $category->id;?>" selected> <?php echo $category->name;?></option>
//           <?php else: ?>
//           <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
//           <?php endif;?>
//           <?php endforeach;?>
//           </select>
//     </div> -->



//     <!-- <div class="post2 mb-3"><img src="css/user-prfile.png" alt="..." id="imageEdit"></div>
// <div class="post1  mb-3"><img src="<?php echo $job->image;?>" alt="..." ></div>
// <form method= "post" action="edit.php?id=<?php echo $job->id;?>" enctype="multipart/form-data">
   
// <div class ="image-edit">
//     <input type="file" id="fileEdit"  name="image" onchange="previewEdit(event);" style="display:none">
//     <button type="button" id="editButton">Edit image</button>
//     <span id="custom-text2"> NO file edited, yet </span>
// </div> -->