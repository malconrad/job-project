
<?php

class User{
    private $db;

    public function __construct(){
        $db = new Database('localhost', 'root', 'babjacs123', 'joblist');
        $this->db = $db;

    }

    public function findUserByEmail($email){
        $this->db->run("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email',$email);
        
         if($this->db->rowcount() > 0){
            
             return true;
        }else{
            return false;
        }

    }

    public function register($data){
        $this->db->run("INSERT INTO users(name,username, email, password)
        VALUES(:name,:username, :email ,:password)");
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        };


    }




    public function checkLogin($email, $password)
    {
        $this->db->run("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);

        $row =  $this->db->singleSet();
        if($row){
            $hashedPassword = $row->password;
        }else{
            return false;
        }
        if(password_verify($password,  $hashedPassword )){
            return $row;
        }else{
            return false;
        }
    }
    public function getUser($user){
        $this->db->run("SELECT * FROM users WHERE id = :id");
            $this->db->bind(':id', $user);
            $row = $this->db->singleSet();
            return $row;

    }
    public function update($id,$target){
        $this->db->run("UPDATE users SET
                        avatar = :avatar
                        WHERE id =:id");
        $this->db->bind(':avatar', $target);         
        $this->db->bind(':id',$id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        };  
               
                            

    }

}