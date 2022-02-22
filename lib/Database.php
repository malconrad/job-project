<?php 
    class Database{
        private $serverName;
        private $userName;
        private $password;
        private $dbName;
        private $conn;
       
        private $stmt;
    
        
    public function __construct($serverName, $userName, $password, $dbName){
        $this->serverName = $serverName;
        $this->userName = $userName;
        $this->password = $password;
        $this->dbName = $dbName;

        try {
            $conn  = new PDO("mysql:host=$this->serverName;dbname=$this->dbName", $this->userName, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $conn;
        }
        catch(PDOException $ex) {
            echo "Database connection error: " . $ex->getMessage();
        }
        
               
         //PDO INSTANCE
        }
        public function run($sql){
             $this->stmt = $this->conn->prepare($sql);
    
        }

        public function bind($param,$value,$type=null){
                if(is_null($type)){
                    switch(true){
                        case is_int($value):
                            $type = PDO::PARAM_INT;
                        break;
                        case is_bool($value):
                            $type = PDO::PARAM_BOOL;
                        break;    
                        case is_null($value):
                            $type = PDO::PARAM_NULL;
                        break;
                        default:
                        $type = PDO::PARAM_STR;      
                    }

                }
                return $this->stmt->bindValue($param,$value,$type);

                
        }        
        public function execute(){
            return $this->stmt->execute();

        }
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public function defaultResult(){
            $this->execute();
            return $this->stmt->fetchAll();
        }
        public function singleSet(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        public function rowcount(){
            $this->execute();
            return $this->stmt->rowCount();
        }

        public function seachResult($search){
           
          return $this->stmt->execute(array("%$search%"));

      }
        public function onlyResults(){
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
         }  
  }
        
        

?>