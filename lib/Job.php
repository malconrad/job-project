<?php

    class Job{

        private $db;
        public function __construct(){
            $db = new Database('localhost', 'root', 'babjacs123', 'joblist');

            $this->db = $db;
        }
        
        // get all jobs
        public function getAllJobs(){
            $this->db->run("SELECT jobs.*,categories.name AS cname 
            FROM jobs
            INNER JOIN categories 
            ON jobs.categories_id = categories.id 
             ORDER BY created_at DESC ");

             $result= $this->db->resultSet();
             return $result;
        
        }
        public function getCategories(){
            $this->db->run("SELECT * FROM categories");

             $result= $this->db->resultSet();
             return $result;
        
        }
        public function getByCategory($category){
           $this->db->run("SELECT jobs.*,categories.name AS cname 
            FROM jobs
            INNER JOIN categories 
            ON jobs.categories_id = categories.id
            WHERE  jobs.categories_id = :category
            ORDER BY created_at DESC
                            ");
            $this->db->bind(':category', $category);
             $result= $this->db->resultSet();
             return $result;
         }
        public function getCategory($category_id){
            $this->db->run("SELECT * FROM categories WHERE id= :category_id");
            $this->db->bind(':category_id', $category_id);
            $row = $this->db->singleSet();
            return $row;
        } 
        public function getJob($id){
            $this->db->run("SELECT * FROM jobs WHERE id = :id");
            $this->db->bind(':id', $id);
            $row = $this->db->singleSet();
            return $row;

        }
        public function create($data){
            $this->db->run("INSERT INTO jobs(categories_id, company, job_title , description ,work_exp, salary, location,requirement, contact_user, contact_email,address, image,date,accepted)
            VALUES(:categories_id ,:company, :job_title,:description,:work_exp,:salary,:location,:requirement,:contact_user,:contact_email,:address,:image,:date,:accepted)");
            $this->db->bind(':categories_id', $data['categories_id']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':job_title',$data['job_title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':work_exp',$data['work']);
            $this->db->bind(':salary',$data['salary']);
            $this->db->bind(':location',$data['location']);
            $this->db->bind(':requirement',$data['requirement']);
            $this->db->bind(':contact_user',$data['contact_user']);
            $this->db->bind(':contact_email',$data['contact_email']);
            $this->db->bind(':address',$data['address']);
            $this->db->bind(':image',$data['image']);
            $this->db->bind(':date',$data['date']);
            $this->db->bind(':accepted',$data['accepted']);
        
          

            if($this->db->execute()){
                return true;
            }else{
                return false;
            };

 
       }
        // delete 
        public function delete($id){
            $this->db->run("DELETE FROM jobs WHERE jobs.id = :jobs_id");
            $this->db->bind(':jobs_id', $id);               
           
            if($this->db->execute()){
                return true;
            }else{
                return false;
            };


        }
        // update form
        public function update($id,$data, $target){
            $this->db->run("UPDATE jobs SET
                categories_id = :categories_id,
                company = :company,
                job_title = :job_title,
                description = :description,
                work_exp =:work,
                salary = :salary,
                location = :location,
                contact_user = :contact_user,
                contact_email = :contact_email,
                address = :address,
                image = :image,
                phone = :phone_num,
                date = :date
                WHERE id = :id
                ");
            $this->db->bind(':id',$id);    
            $this->db->bind(':categories_id', $data['categories_id']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':job_title',$data['job_title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':work',$data['work']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':location',$data['location']);
            $this->db->bind(':contact_user',$data['contact_user']);
            $this->db->bind(':contact_email',$data['contact_email']);
            $this->db->bind(':address',$data['address']);
            $this->db->bind(':image',$target);
            $this->db->bind(':phone_num',$data['phone_num']);
            $this->db->bind(':date',$data['date']);
            

            if($this->db->execute()){
                return true;
            }else{
                return false;
            };

        }
        
      

        public function apply($data){
            
         $this->db->run("INSERT INTO applications(user_id,job_id,name,email,country,code,phone,education,qualification,experiance,status,age,answer,current_orgn,address)
            VALUES (:user_id,:job_id,:name,:email,:country,:code,:phone,:education,:qualification,:experiance,:status,:age, :answer,:current_orgn,:address)");
                $this->db->bind(':user_id',$data['user_id']);
                 $this->db->bind(':job_id',$data['job_id']);
                 $this->db->bind(':name',$data['name']);
                 $this->db->bind(':email', $data['email']);
                 $this->db->bind(':country',$data['country']);
                 $this->db->bind(':code',$data['code']);
                 $this->db->bind(':phone',$data['phone']);
                 $this->db->bind(':education',$data['education']);
                 $this->db->bind(':qualification',$data['qualification']);
                 $this->db->bind(':experiance',$data['experiance']);
                 $this->db->bind(':status',$data['status']);
                 $this->db->bind(':age',$data['age']);
                 $this->db->bind(':answer', $data['answer']);
                 $this->db->bind(':current_orgn',$data['current_orgn']);
                 $this->db->bind(':address',$data['address']);
                 
                 if($this->db->execute()){
                    return true;
                }else{
                    return false;
                };
    
            }

             
        


 public function getApplicants($job_id) {
             
            $this->db->run("SELECT applications.*, users.avatar
            FROM applications
            INNER JOIN users
             ON applications.user_id = users.id 
              WHERE applications.job_id = :job_id");
                
            $this->db->bind(":job_id", $job_id);

           return $this->db->resultSet();
       }
       public function singleApplicant($id){
             
        $this->db->run("SELECT applications.*, users.avatar ,users.username
        FROM applications
        INNER JOIN users
         ON applications.user_id = users.id 
          WHERE applications.id = :id");
            
        $this->db->bind(":id", $id);

       return $this->db->singleSet();
   }


    public function searchResult($search){
            
        $this->db->run("SELECT * FROM `jobs` WHERE `job_title` LIKE ?");

        if($this->db->seachResult($search)){
            
                 if($this->db->rowcount() > 0){

                 return $this->db->onlyResults();

             }else{
                return "results not found";
            }
        }

    } 
    public function getLocations(){
        $this->db->run("SELECT DISTINCT `location` FROM jobs");

        $result= $this->db->resultSet();
    
        return $result;
    } 
    public function locationOnly($location){
        $this->db->run("SELECT * FROM jobs WHERE location=:location");

        $this->db->bind(":location",$location);

        $getlocate = $this->db->singleSet();

        return $getlocate;
        
    }

   
    public function locationAll($location){
        $this->db->run("SELECT jobs.*,categories.name AS cname 
        FROM jobs
        INNER JOIN categories 
        ON jobs.categories_id = categories.id
        WHERE jobs.location =:location
        ORDER BY created_at DESC  ");
        $this->db->bind(":location",$location);

        $getlocation = $this->db->resultSet();
        if($getlocation){
            return $getlocation;
        }else{
            return false;
        }
       
    }
    public function getSpecJobs($category,$location){
        $this->db->run("SELECT jobs.*,categories.name AS cname 
        FROM jobs
        INNER JOIN categories 
        ON jobs.categories_id = categories.id
        WHERE jobs.categories_id = :category
        AND jobs.location =:location
        ORDER BY created_at DESC     ");

        $this->db->bind(":category",$category);
        $this->db->bind(":location",$location);

        $getSpec = $this->db->resultSet();
        if($getSpec){
            return $getSpec;
        }else{
            return false;
        }
    }
    public function JobRequire($job_id,$require){
         $this->db->run("INSERT INTO requirements(job_id,requirements) VALUES(:job_id,:requirements)
                ");
        $this->db->bind(":job_id",$job_id);
        $this->db->bind(":requirements",$require);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        };

    }
    public function RequiredJob($id){
        $this->db->run("SELECT * FROM requirements WHERE  job_id =:job_id");
        $this->db->bind(':job_id',$id);
        $requests = $this->db->resultSet();
        
        return $requests;
    }
    public function singleRequire($re_id){
        $this->db->run("SELECT * FROM requirements WHERE id =:id");
        $this->db->bind(":id",$re_id);

        $row = $this->db->singleSet();

       return $row;
    }

    public function updateRequire($id,$job, $require){
        $this->db->run("UPDATE requirements SET 
                        job_id =:job_id,
                        requirements = :requirements
                         WHERE id =:id");

        $this->db->bind(":id",$id);
        $this->db->bind(":job_id",$job);
        $this->db->bind(":requirements",$require);    
        
        if($this->db->execute()){
            return true;

        }else{
            return false;
        };
    }
    public function reqDelete($redel){
        $this->db->run("DELETE FROM requirements WHERE id = :id");
        $this->db->bind(":id",$redel);
        if($this->db->execute()){
            return true;

        }else{
            return false;
        };

    }

}