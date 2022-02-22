<?php include_once 'config/init.php';?>
<?php
$jobs = new Job;


 $template = new Template('templates/job-single.php');
$success ="";
$reqId = null;
$job_id = isset($_GET["id"])? $_GET["id"] : null;


$singleJob = $jobs->getJob($job_id);
$results =[];
$applies = [];
$feedback = [];

$template->job = $singleJob;
$num_pages = 03;
if(isset($_GET["page"])){
    $page = (int) filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
}else{
    $page = 1;
}
$startFrom = ($page-1)*3;



if(isset($_POST['submit'])){
    $reqId  = (int) filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $require = (string)filter_input(INPUT_POST,'requirement',FILTER_SANITIZE_STRING);
    if($reqId && $require){
    
        if($jobs->JobRequire($reqId,$require)){

            $success = "Requirement has been added";
            $feedback = $success;
        }
            
    }else{
        $success ="Requirement has not been added";
    }
}

if(isset($_POST['subdelete'])){
    $redel = (int) filter_input(INPUT_POST, 'redelete', FILTER_SANITIZE_NUMBER_INT);
    if($redel){
        if($jobs->reqDelete($redel)){
            $success="requirement has been deleted";
            $feedback = $success;
        }else{
            $success="requirement has not been deleted";
        }
    }

}

    if($job_id){
    
        $results = $jobs->RequiredJob($job_id);

    }

$template->requests = $results;
$template->feedback = $feedback;
$template->success = $success;




if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];
    if($jobs->delete($del_id)){
        redirect('index.php', 'Job deleted', 'success');
    }else{
        redirect('index.php','Job not deleted','error');
    }
}


if ($template->user && ($template->user->role != 'admin' || $template->user->role != 'moderator')) {

    $applies =  $jobs->getApplicants($job_id); 
    $template->applicants= array_slice($applies, $startFrom,$num_pages);

}
$totalPage = ceil(count($applies) / $num_pages);
$template->page = $page;
$template->links = $totalPage;

echo $template;
?>