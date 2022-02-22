<?php include_once 'config/init.php';?>
<?php
$jobs = new Job;
 $template = new Template('templates/create-job.php');

 if (!$template->user) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    redirect('signin.php', 'Please signin to create', 'warning');
}
$role = $template->user->role;
// die($role);
if (!in_array($role, ['admin', 'moderator'])) {

    redirect('index.php', 'You are  not authorised', 'error');
}


$template->category = "";
$errors = array();
$errors['imageErr']="";
$errors['companyErr']="";
$errors['categoryErr']="";
$errors['jobtitleErr']="";
$errors['descriptionErr']="";
$errors['workErr']="";
$errors['locationErr']="";
$errors['salaryErr']="";
$errors['contactErr']="";
$errors['emailErr']="";
$errors['phoneErr']="";
$errors['addressErr']="";
$errors['dateErr']="";
$errors['acceptedErr']="";



$data = array();
$data["image"]= "";
$data['company'] ="";
$data['categories_id'] =""; 
$data['job_title'] ="";
$data['description'] ="";
$data['work'] ="";
$data['location']="";
$data['salary']="";
$data['contact_user']="";
$data['phone_num']="";
$data['contact_email'] ="";
$data['address']="";
$data['date']="";
$data['accepted']="";

 
//  if ($template->user->role != 'admin' or $template->user->role != 'moderator') {
//     redirect('index.php', 'You are not authorised', 'error');
// }




    

if(isset($_POST['submit'])){
        $image_file = $_FILES["image"]["name"];
         $target = "upload/".$image_file;
    //file extention
    $file_extension = pathinfo($target,PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    // validate extention
    $valid_extension = array('png','jpeg','jpg');
    if(in_array($file_extension,$valid_extension)){
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $data['image'] =$target;
        }
    }else{
        $errors["imageErr"] = "no image uploaded";

    }
        if(empty($_POST['company'])){
            $errors['companyErr'] = "company name should not be empty";
        }else{
            $data['company'] = (string)filter_input(INPUT_POST,'company',FILTER_SANITIZE_STRING);
        }
             $template->category = $categories = (int) filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT);
            $data['categories_id'] = $categories;
            if(!$data['categories_id']){
                $errors['categoryErr']= "please select category";
            }
        if(empty($_POST['job_title'])){
            $errors['jobtitleErr']=" job title should not be empty";
        }else{
            $data['job_title'] =  (string)filter_input(INPUT_POST,'job_title', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['description'])){
            $errors['descriptionErr']= "please provide the job description";
        }else{
            $data['description'] =  (string)filter_input(INPUT_POST,'description', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['work'])){
            $errors['workErr'] = "Provide a job working experience you need";
        }else{
            $data['work'] =  (string)filter_input(INPUT_POST,'work', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['location'])){
            $errors['locationErr'] = "Please the job location";
        }else{
            $data['location'] = (string)filter_input(INPUT_POST,'location', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['salary'])){
            $errors['salaryErr'] = "Please enter job salary";
        }else{

            $data['salary']= (string)filter_input(INPUT_POST,'salary',FILTER_SANITIZE_STRING);
            
        }
        if(empty($_POST['contact_user'])){
            $errors['contactErr'] = "Please enter contact persons";
        }else{
            $data['contact_user'] = (string)filter_input(INPUT_POST,'contact_user', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['contact_num'])){
            $errors['phoneErr'] = "Please enter contact phone number";
        }else{
            $data['phone_num'] = (string)filter_input(INPUT_POST,'contact_num', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['contact_email'])){

            $errors['emailErr'] = "Please enter contact email";

        }elseif(!filter_var($_POST["contact_email"] , FILTER_VALIDATE_EMAIL)){

            $errors['emailErr'] = "Please enter correct email";
        }
        else{

            $data['contact_email'] = (string)filter_input(INPUT_POST,'contact_email', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['address'])){
            $errors['addressErr'] = "Please enter job address";
        }else{
            $data['address'] = (string)filter_input(INPUT_POST,'address', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['date'])){
            $errors['dateErr'] = "Please enter the date";
        }else{
            $data['date'] =(string)filter_input(INPUT_POST,'date', FILTER_SANITIZE_STRING);
        }
        if(empty($_POST['accepted'])){
            $errors['dateErr'] = "Please check to accept terms and condtions";
        }else{
            $data['accepted'] =(string)filter_input(INPUT_POST,'accepted', FILTER_SANITIZE_STRING);
        }
        
        if(!array_filter($errors)){

            if($jobs->create($data)){
    
                    redirect('index.php','Your job has been listed ','success');
                }else{
                    redirect('index.php','Your job failed to be listed ','error');
                }
        
        }
        
}
$template->errorMsg = $errors;
$template->categories = $jobs->getCategories();
echo $template;
?>