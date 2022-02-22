<?php include_once 'config/init.php';?>
<?php

$template = new Template('templates/applicant.php');

$job = new Job;

$id = isset($_GET['id'])? ($_GET['id']) : null ;

$apply=$job->singleApplicant($id);

$template->applicant =$apply;

echo $template;

?>