<?php include_once 'config/init.php';?>
<?php
$template = new Template('templates/inc/header.php');
$user = new User;

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
    unlink($user->getUser($template->user->id)->avatar);
        
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }
    if($user->update($template->user->id, $target)){
        
        $_SESSION['user'] = $user->getUser($template->user->id);
        redirect('index.php', 'Image update ', 'success');

    }else{
        redirect('index.php', 'Image failed to update ', 'error');

    }

    }
   
echo $template;
?>