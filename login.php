<?php include_once 'config/init.php';?>
<?php
$users = new User;

$template = new Template('templates/login.php');
$dataErr = array();
$dataErr['emailloginerror']='';
$dataErr['pswordloginerror']="";
$dataErr['nameerror'] ='';  
$dataErr['usererror']= '';
$dataErr['emailerror']='';
$dataErr['passError'] = '';
$dataErr['confirmError'] = '';
$loginError="";
$loginPass ="";
$success ="";
$email='';
$password ='';
 $confirm ='';
 $data = array();
 $data['name'] ="";
    $data['username'] ="";
    $data['email'] ="";
    $data['password'] ="";
    $data['confirm'] ="";

if(isset($_POST['signin'])){
    if(empty($_POST['email'])){
        $dataErr['emailloginerror'] = 'email should not be empty';

    }else{
        $email = htmlentities($_POST['email']);
    }

    if(empty($_POST['password'])){
        $dataErr['pswordloginerror'] ="password should not be empty";
    }else
    {
        $password = htmlentities($_POST['password']);
        
    }
    
    if ($result = $users->checkLogin($email, $password))
     {
        $_SESSION['user'] = $result;
     
        if ($redirect = $_SESSION['redirect_url']) 
        {
            redirect($redirect);
        }

        redirect('index.php', 'You have successfully logged in ', 'success');
    }else{
        $loginError = 'Email or password do not match';
       
    }
}
$template->loginError = $loginError; 
  

// regestration


if(isset($_POST['submit'])){
   
        $nameValidation = "/^[a-zA-Z0-9]*$/";
        // $passValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

        if(empty($_POST['name'])){

            
            $dataErr['nameerror'] = 'Name should not be empty';
        }else{
            $data['name'] = htmlentities($_POST['name']);
        }
        
        // validate user name
        if(empty($_POST['username'])){

            $dataErr['usererror'] = "Please enter name";

        }elseif(!Preg_match($nameValidation,$_POST['username'])){

            $dataErr['usererror'] = 'Name can only contain letters and number';

      }  else{
          $data['username'] = htmlentities($_POST['username']);
      }
    //     //validate email
     
        if(empty($_POST['email'])){

        

            $dataErr['emailerror'] = "Please enter email address";

            
        }elseif(!filter_var($_POST["email"] , FILTER_VALIDATE_EMAIL)){

            $dataErr['emailerror'] = "please enter the email correct format";

        }else{
            $data['email']  = htmlentities($_POST['email']);

            if($users->findUserByEmail($data['email'])){
                   
                $dataErr['emailerror'] = "Email is already taken";

            }
        
        }
      
        // validate password on length and nemeric value
        
        if(empty($_POST['password'])){
            $dataErr['passError'] = "Please enter password";
        }elseif(strlen($_POST['password']) < 6){

            $dataErr['passError'] = "Password must be at least 8 characters";
        
        }else{
            $data['password'] = htmlentities($_POST['password']);
            $data['confirm']=htmlentities( $_POST['confirm']);
        }
        // validate confirm password
        if(empty($_POST['confirm'])){
            $dataErr['confirmError'] = "confirm password should not be empty";
        }else{
            
        
            if($data['password'] != $data['confirm']){
                $dataErr['confirmError'] = "Passwords doesnot match please try again";
                $dataErr['passError'] = 'Passwords doesnot match';


            }
        }
       
        if(!array_filter($dataErr)){
            //hash password
            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

            if ($users->register($data)) {
                $success = 'You have successfully registered, you  can now login';
                $loginPass = $success; 
                    // redirect('index.php', 'You have successfully register ', 'success');
                }
        }else{
            
            $loginPass = 'Signing up has failed please try again';
        }
        // 

 
    
}




$template->loginPass = $loginPass;
$template->success =$success;
$template->data = $data;

$template->errors =$dataErr;


echo $template;
?>