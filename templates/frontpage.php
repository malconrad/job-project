<?php include 'inc/header.php'?>

      <section id="home">
          <div class="banner ">
               <?php display();?> 
            <div class="search">
              
                <form action="index.php" method="GET" autocomplete="off"  >
                <div class="box">
                  <input type="text" name="search" placeholder="search job.." id="mysearch">
                  <span class="cancel"onclick="document.getElementById('mysearch').value='';" ></span>
                   <button type="submit" name="submit"><svg xmlns='http://www.w3.org/2000/svg' class='ionicon' height="20px" width="20px" viewBox='0 0 512 512'><title>Search</title><path d='M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z' fill='none' stroke='currentColor' stroke-miterlimit='10' stroke-width='32'/><path fill='none' stroke='currentColor' 
                    stroke-linecap='round' stroke-miterlimit='10' stroke-width='32' d='M338.29 338.29L448 448'/></svg></button> 
                    </div> 
                  </form>
                
                
            </div>
           <div class="row">
              <div class="col-md-6">
              <h1>JOBS AROUND YOU</h1>
              <p>Check out and find a job of your only choice.</p>
              </div>
              <div class="col-md-6 text-center">
                <img src="css/imgs/job.svg" class="img-fluid">
              </div>
            </div>
            <img src="logo/wave.png" class="bottom-img">
          </div>
          
      </section>
     <!-- jobs -->
      <section id="job">
        <div class="container">
          <div class="selectsection pb-3">
            <form action="index.php" method="GET" enctype="multipart/form-data" autocomplete="off" >
            <div class="row">
            <div class="col-md-3 col-xs-12">
            <h5 class="job-title"><?php echo strtoupper($title); ?></h5>
          </div>
            <div class="col-md-3 col-xs-12">
             <div class="customselect mb-2">
              <select name="category" class="form-control" id="categories">
              <option value="">category</option>
          <?php foreach($categories as $categ):?>
           <option value="<?php echo $categ->id;?>" <?php if($categ->id == $category) echo "selected" ?>><?php echo strtoupper($categ->name);?></option>
          <?php endforeach;?>
              </select>
              <span class="custom-arrow"></span>
            </div>
          </div>
          <div class="locateselect col-md-3 col-xs-12">
          <div class="customselect mb-2">
              <select name="location" class="form-control" id="location">
              <option value="">location</option>
          <?php foreach($locations as $locat):?>
          <option value="<?=$locat->location;?>" <?php if($locat->location == $location) echo "selected" ?>> <?php echo strtoupper($locat->location);?></option>
          <?php endforeach;?>
              </select>
              <span class="custom-arrow"></span>
          </div>
          </div>

          <div class="col-md-3 col-xs-12"><button type="submit" name="submit" class="btn btn-primary ml-4">Find</button>
        </div>
            </div>
          </form>
          </div>
          
          <?php if(!empty($jobs)):?>
          <?php foreach($jobs as $job): ?>
          <div class="company-details">
            <div class="job-update">
              <div class="row">
                <div class="col-md-2 p-1">
                  <?php if($job->image):?>
                  <div class="icon"><img src="<?=$job->image;?>" ></div>
                  <?php else:?>
                    <div class="icon"><img src="css/user-prfile.png" ></div>
                    <?php endif;?>
                </div>
                  <div class="col-md-10 p-1">
                        <h4><?=$job->job_title;?></h4>
                        <p><?=$job->company;?></p>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="briefcase" class=" pb-1 svg-inline--fa fa-briefcase fa-w-16 " height="20px" width="20px" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path></svg>
                        <span class="pt-2"><?=$job->work_exp;?></span><br>
                      
                          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="pb-1 svg-inline--fa fa-map-marker-alt fa-w-12"height ="20px" width="20px"role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>
                          <spanclass="pt-2"><?=$job->location;?></span>
                          <br>
                          <P>Description <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-double-right" class="pb-1 svg-inline--fa fa-angle-double-right fa-w-14" height="20px" width="20px" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"></path></svg>
                             <?=$job->description;?> </p> 
                          <a href="jobView.php?id=<?php echo $job->id;?>">Read more</a>
                  </div>
                
              </div>
            </div> 
            <div class="apply-btn">
            <button type="button" class="btn btn-primary"><a href="apply.php?id=<?=$job->id;?>">Apply</a></button>

          </div>
          </div> 
          <?php endforeach; ?>
          <?php else:?>
          <div class="text-center job-para"><p>Sorry no jobs found within!</p></div>
          <?php endif;?>
            <ul class="pagelink text-center">
            <li class="left-arrow">&#8592;</li>
              <?php for($i=1; $i<=$links; $i++):?>
            <li class="<?= $i === $page ? 'active' : '' ?>"><a href="index.php?page=<?=$i;?>&category=<?=$category;?>&location=<?=$location;?>"><?= $i; ?></a></li>
            <?php endfor;?>
              <li class="right-arrow">&#8594;</li>
            </ul>
       
        </div>  
     
      </section>    


<!-- top recluters -->
<section id="recruiters">
      <div class="container text-center">
       <h3>TOP RECRUITERS </h3>
        <p>Are you looking for a new job? What's the best way to start a job search, find companies who want to interview you ?
          Get free job alerts, know about relevant job vacancies and ease your job search from companies like !</p>
          <div>
          <img src="css/imgs/vision.jpg" class="images">
          <img src="css/imgs/centenary.png" class="images">
          <img src="css/imgs/centre.png" class="images">
          <img src="css/imgs/dfcu.png" class="images">
          <img src="css/imgs/google.png" class="images">
          <img src="css/imgs/huawei.jpg" class="images">
          <img src="css/imgs/kcca.png" class="images">
          <img src="css/imgs/jesa.png" class="images">
          <img src="css/imgs/liqiud.png" class="images">
          <img src="css/imgs/mona.png" class="images">
          <img src="css/imgs/standbic.jpg" class="images">
          <img src="css/imgs/total.png" class="images">
            <img src="css/imgs/ugpolice.jpg" class="images">
          <img src="css/imgs/multchoice.png" class="images">
          <img src="css/imgs/jumia.png" class="images">
          <img src="css/imgs/safeboda.jpg" class="images">
          <img src="css/imgs/images.jpg" class="images">
            </div>
         <button type="button"class="btn btn-primary" id="tip-btn">REQUIRED TIPS</button>
      </div>
      </section>
    
     

      <section id="site-stats">
        <div class="container ">
            <h4 class="title text-center">Why choose as ?</h4>
            <div class="row offset-1 first-row">
              <div class="col-md-5 testimony">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  nulla nisi minus nihil magni veritatis placeat natus provident</p>
                  <img src="css/imgs/user1.jpg" alt="">
                  <p class="user-details"> <strong>Angelina</strong><br> co-founder at Jjam </p>
              </div>
              <div class="col-md-5 testimony">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.  nulla nisi minus nihil magni veritatis placeat natus provident</p>
                  <img src="css/imgs/user4.jpg" alt="">
                  <p class="user-details"> <strong>John Deo</strong><br> Director at Jjam </p>
              </div>
            </div>
          <h3 class="text-center">JAMJOB STATUS</h3>
          <div class="row text-center">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="stats-box">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" class="svg-inline--fa fa-users fa-w-20" height="25" width="25" role="img"
                   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                  <span><small>100k +</small></span>
                  <p>Jobseekers</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="stats-box">
                  <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="slideshare" class="svg-inline--fa fa-slideshare fa-w-16" height="25" width="25" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M187.7 153.7c-34 0-61.7 25.7-61.7 57.7 0 31.7 27.7 57.7 61.7 57.7s61.7-26 61.7-57.7c0-32-27.7-57.7-61.7-57.7zm143.4 0c-34 0-61.7 25.7-61.7 57.7 0 31.7 27.7 57.7 61.7 57.7 34.3 0 61.7-26 61.7-57.7.1-32-27.4-57.7-61.7-57.7zm156.6 90l-6 4.3V49.7c0-27.4-20.6-49.7-46-49.7H76.6c-25.4 0-46 22.3-46 49.7V248c-2-1.4-4.3-2.9-6.3-4.3-15.1-10.6-25.1 4-16 17.7 18.3 22.6 53.1 50.3 106.3 72C58.3 525.1 252 555.7 248.9 457.5c0-.7.3-56.6.3-96.6 5.1 1.1 9.4 2.3 13.7 3.1 0 39.7.3 92.8.3 93.5-3.1 98.3 190.6 67.7 134.3-124 53.1-21.7 88-49.4 106.3-72 9.1-13.8-.9-28.3-16.1-17.8zm-30.5 19.2c-68.9 37.4-128.3 31.1-160.6 29.7-23.7-.9-32.6 9.1-33.7 24.9-10.3-7.7-18.6-15.5-20.3-17.1-5.1-5.4-13.7-8-27.1-7.7-31.7 1.1-89.7 7.4-157.4-28V72.3c0-34.9 8.9-45.7 40.6-45.7h317.7c30.3 0 40.9 12.9 40.9 45.7v190.6z"></path></svg>
                  <span><small>500k +</small></span>
                  <p>Employers</p>
                  </div>
                </div>

              </div>
              
            </div>

            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="stats-box">
                  <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="hand-peace" class="svg-inline--fa fa-hand-peace fa-w-14"  height="25" width="25"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M362.146 191.976c-13.71-21.649-38.761-34.016-65.006-30.341V74c0-40.804-32.811-74-73.141-74-40.33 0-73.14 33.196-73.14 74L160 168l-18.679-78.85C126.578 50.843 83.85 32.11 46.209 47.208 8.735 62.238-9.571 104.963 5.008 142.85l55.757 144.927c-30.557 24.956-43.994 57.809-24.733 92.218l54.853 97.999C102.625 498.97 124.73 512 148.575 512h205.702c30.744 0 57.558-21.44 64.555-51.797l27.427-118.999a67.801 67.801 0 0 0 1.729-15.203L448 256c0-44.956-43.263-77.343-85.854-64.024zM399.987 326c0 1.488-.169 2.977-.502 4.423l-27.427 119.001c-1.978 8.582-9.29 14.576-17.782 14.576H148.575c-6.486 0-12.542-3.621-15.805-9.449l-54.854-98c-4.557-8.141-2.619-18.668 4.508-24.488l26.647-21.764a16 16 0 0 0 4.812-18.139l-64.09-166.549C37.226 92.956 84.37 74.837 96.51 106.389l59.784 155.357A16 16 0 0 0 171.227 272h11.632c8.837 0 16-7.163 16-16V74c0-34.375 50.281-34.43 50.281 0v182c0 8.837 7.163 16 16 16h6.856c8.837 0 16-7.163 16-16v-28c0-25.122 36.567-25.159 36.567 0v28c0 8.837 7.163 16 16 16h6.856c8.837 0 16-7.163 16-16 0-25.12 36.567-25.16 36.567 0v70z"></path></svg>
                  <span><small>100k +</small></span>
                  <p>Active Jobs</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="stats-box">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="building" class="svg-inline--fa fa-building fa-w-14" height="20" width="20"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M436 480h-20V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v456H12c-6.627 0-12 5.373-12 12v20h448v-20c0-6.627-5.373-12-12-12zM128 76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76zm0 96c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40zm52 148h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm76 160h-64v-84c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v84zm64-172c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40z"></path></svg>
                  <span><small>300k +</small></span>
                  <p>Employers</p>
                  </div>
                </div>

              </div>
              
            </div>
          </div>
        </div>

      </section>
      <!-- app burner -->
     <section id="app-burner" class="text-center">
    
      <div class=" text-center back-end">
        <div class="outer">
        <p>Find us on social media</p>
            <div class="social-icon">
              <a href="#"> <img src="logo/facebook.png" alt=""> </a>
              <a href="#"> <img src="css/imgs/watsup.png" alt=""> </a>
              <a href="#"> <img src="css/imgs/twitter.png" alt=""> </a>
              <a href="#"> <img src="logo/linkedin.png" alt=""> </a>
              <a href="#"> <img src="logo/intagram.png" alt=""> </a>
            </div>
            </div>
        </div>
             
       </div>
      
      </section>
      <div class="tip-modal">
        <div class="tip-content">
          <div class="tip-header">
          <span class="tip-close">&times;</span>
          <h3 class="text-center">Get Job Tips</h3>
          </div>
        <div class="tip-body">
                <p class="first">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                <p class="state"></p>
                <a href="">learn more job tips</a> 
                
        </div>
        <div class="tip-footer">
                <button type="submit" class="tip-btn" id="prev">Previous</button>
                <button type="button" class="tip-btn" id="next">Next</button>
        </div>
       
        </div>
         
      </div>
      

<?php include 'inc/footer.php'?>
      
  

         
    

       