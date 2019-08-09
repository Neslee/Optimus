        <?php
        class dbconnect{

        private $server = "localhost";
        private $dbuser = "root";
        private $dbpassword = "1";
        private $dbname="registration";
        public $conn;

        public function connector()  {
            $this->conn = new mysqli($this->server,$this->dbuser,$this->dbpassword,$this->dbname);
            return $this->conn;
        }
        
        function insert_user($table_name, $form_data)
        {
        $string = "INSERT INTO ".$table_name." (";            
        $string .= implode(",", array_keys($form_data)) . ') VALUES (';            
        $string .= "'" . implode("','", array_values($form_data)) . "')";  
        try{
          $res =  mymysqlisqli_query($this->conn, $string);  
          $insert_id=mysqli_insert_id($this->conn);
          return $insert_id;        
          echo "New record created successfully";
       }catch(Exception $ex){
            echo $ex->getMessage(); 
            die;
        }
        }
        }

        ?>
