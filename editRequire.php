<?php include_once 'config/init.php';?>
<?php

$template = new Template('templates/editRequirement.php');
$jobs = new Job;

$re_id = isset($_GET['id']) ? ($_GET['id']) : null;
$job_id = isset($_GET['job_id']) ? ($_GET['job_id']) : null;




if (!$template->user) {

    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

    redirect('login.php', 'Please signin to edit this requirement', 'warning');
}
    
$role = $template->user->role;

if (!in_array($role, ['admin', 'moderator'])) {

    redirect('index.php', 'You are  not authorised', 'error');
}

if(isset($_POST['submit'])){
   $job = (int) filter_input(INPUT_POST, 'job_id', FILTER_SANITIZE_NUMBER_INT);
    $id = (int) filter_input(INPUT_POST, 'reqid', FILTER_SANITIZE_NUMBER_INT);
    $require = (string) filter_input(INPUT_POST,'requirement', FILTER_SANITIZE_STRING);
    

    if($jobs->updateRequire($id ,$job,$require)){
        redirect('jobView.php?id='.$job,'requirement has been updated ','success');
    }else{
        redirect('jobView.php?id='.$job,'requirement hasnot to be updated ','error');
    }
}

// jobView.php?id='.$id,

$template->single = $jobs->singleRequire($re_id);
$template->job = $jobs->getJob($job_id);

echo $template;