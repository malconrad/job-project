<?php include 'inc/header.php'?>
<div class="container">
    <div class="row">
        <div class="col-md-4 text-center sidebar mt-4">
            <div class="card-body">
                <?php if($applicant->avatar):?>
                <img src="<?=$applicant->avatar;?>" alt="" class="rounded-circle" width="150">
                <?php else:?>
                    <img src="css/user-prfile.png" alt="" class="rounded-circle" width="150">
                   <?php endif;?> 
                <div class="mt-3">
                    <h4><?=$applicant->username;?></h4>
                    <a href="">Applicant</a>
                    <a ><?=$applicant->country;?></a>
                    <a href=""><?=$applicant->education;?></a>
                    <a href=""><?=$applicant->status;?></a>
                    <a href="jobView.php?id=<?=$applicant->job_id;?>" class="last-btn">Back</a>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-4">
             <div class="card mb-3 context">
                 <h2 class="ml-4">About</h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Full Name</h>

                            </div>
                            <div class="col-md-9 text-secondary">
                                <?=$applicant->name;?>
                            </div>
                        </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?=$applicant->email;?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Phone</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?=$applicant->phone;?>
                                </div>
                            </div>
                           <div class="row">
                               <div class="col-md-3">
                                   <h5>Address</h5>
                               </div>
                               <div class="col-md-9 text-secondary">
                                   <?=$applicant->address;?>
                               </div>
                           </div> 
                    </div>
             </div>
             <div class="card mb-3 context">
            
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-3">
                             <h5>Qualification</h5>
                         </div>
                         <div class="col-md-9 text-secondary">
                             <?=$applicant->qualification;?>
                         </div>
                     </div>
                     <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Experiance</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?=$applicant->experiance;?>
                                </div>
                            </div>
                        
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Age</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?=$applicant->age;?> Years old
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Current Organisation</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <?=$applicant->current_orgn;?>
                                </div>
                            </div>
                 </div>
             </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'?>