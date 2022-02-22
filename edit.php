<?php include_once 'config/init.php';?>
<?php
$jobs = new Job;

$template = new Template('templates/edit-job.php');

$job_id = isset($_GET['id'])? ($_GET['id']) : null ;

if (!$template->user) {

    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

    redirect('login.php', 'Please signin to edit this job', 'warning');
}
    //var_dump($template->user->role);
    // die();
$role = $template->user->role;
// die($role);
if (!in_array($role, ['admin', 'moderator'])) {

    redirect('index.php', 'You are  not authorised', 'error');
}

if(isset($_POST['submit'])&& isset($_FILES['image'])){

        $image_file = $_FILES['image']['name'];
        $target = "upload/".$image_file;
         //file extention
    $file_extension = pathinfo($target,PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    // validate extention
    $valid_extension = array('png','jpeg','jpg');
    
    if(in_array($file_extension,$valid_extension)){
         // remove old image
    unlink($jobs->getJob($job_id)->image);
        
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }
    $id = (int) filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    

    $data = array();
    $data['company'] =htmlentities($_POST['company']);
    $data['categories_id'] =htmlentities($_POST['category']);
    $data['job_title'] =htmlentities($_POST['job_title']);
    $data['description'] =htmlentities($_POST['description']);
    $data['work'] = htmlentities($_POST['work']);
    $data['location'] =htmlentities($_POST['location']);
    $data['salary'] =htmlentities($_POST['salary']);
    $data['contact_user'] =htmlentities($_POST['contact_user']);
    $data['phone_num'] = htmlentities($_POST['contact_num']);
    $data['contact_email'] =htmlentities($_POST['contact_email']);
    $data['address'] = htmlentities($_POST['address']);
    $data['date'] = htmlentities($_POST['date']);

    if($jobs->update($id ,$data ,$target)){

        redirect('jobView.php?id='.$id,'Your job has been updated ','success');
    }else{
        redirect('jobView.php?id ='.$id,'Your job hasnot to be updated ','error');
    }

}








$template->job = $jobs->getJob($job_id);
$template->categories = $jobs->getCategories();

echo $template;
?>