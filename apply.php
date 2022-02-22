<?php include_once 'config/init.php';?>
<?php

$template = new Template('templates/application.php');
$db = new Job;

$jobid = isset($_GET['id']) ? ($_GET['id']) : null;

if (!$template->user) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    redirect('login.php', 'Please signin to apply', 'warning');
}


$data = array();

        if(isset($_POST['submit']) && isset($_POST['country'])){
            $data['user_id'] =$_POST['user_id']; 
            $data['job_id']=$_POST['job_id'];
            $data['name'] =htmlentities($_POST['name']);
            $data['email'] =htmlentities($_POST['email']);
            
            $data['country'] = htmlentities($_POST['country']);
        
            $data['code'] = htmlentities($_POST['code']);
            $data['phone'] =htmlentities($_POST['phone']);
            $data['education'] =htmlentities($_POST['education']);
            $data['qualification']=htmlentities($_POST['qualification']);
            $data['experiance']=htmlentities($_POST['experiance']);
            $data['status']=htmlentities($_POST['status']);
            $data['age']=htmlentities($_POST['age']);
            $data['answer']=htmlentities($_POST['answer']);
            $data['current_orgn']=htmlentities($_POST['current_orgn']);
            $data['address']=htmlentities($_POST['address']);
           
                var_dump($data);
            if($db->apply($data)){

              $db->apply($data);
              redirect('index.php','Your application is submited ','success');
             }else{
                redirect('index.php','Your application has missing information ','error');
              }
        }
      



$jobs = $db->getJob($jobid);



$template->job= $jobs;

echo $template;
?>