<?php

    namespace xel\framework\Helper;
    require_once __DIR__."/../../vendor/autoload.php";

    use xel\framework\Devise\BaseCon;

    class Xgenquery {

        //save database connection
        protected $conn;
        
        // know what type query
        protected $query_check;

        // array value 
        protected $query_val = array();


        public function __construct()
        {
            $this->conn = new BaseCon();
        }

        //Getting connection connection 
        public function verivy() 
        {
            return $this->conn->getPdo();
        }

        // select statment
        public function select(string $data = '*')
        {
            $this->query_check = "SELECT ".$data." FROM ";
            return $this;
        }

        // structural define from tabel
        public function from(string $table)
        {
            $this->query_check .= $table;
            return $this;
        }

        // where conditional
        public function where(string $condition, $value)
        {
            $this->query_check .= " WHERE ".$condition;
            $this->query_val[':id'] = $value;
            return $this;
        }
       
        // Executing Query
        public function go()
        {
            try {
                $stmt = $this->verivy()->prepare($this->query_check);
                foreach($this->query_val as $key=> $value)
                {
                    $stmt->bindParam($key,  $this->query_val[$key]);
                }
                $stmt->execute();
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $results;
            } catch (\PDOException $th) {
                echo $th->getMessage();
            }
        }

        //insert function
        public function insert_query($table, $value) 
        {
            // to concate array value to one string
            $columns = implode(',', array_keys($value));
            $params = implode(',', array_map(function($key) {
                return ':' . $key;
            }, array_keys($value)));

            $this->query_check = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $params . ")";

            foreach ($value as $key => $val) {
                $this->query_val[':' . $key] = $val;
            }

            return $this;
        }

        //update function 
        public function update_query($table, $data)
        {
            $tempdata = array();
            foreach ($data as $key => $value) {
                $tempdata[] = $key . "= :" . $key;
                $this->query_val[':' . $key] = $value;
            }
            $this->query_check = "UPDATE " . $table . " SET " . implode(',', $tempdata);
            return $this;
        }

        


        //delete query 
        public function delete($table, $condition) 
        {
            $this->query_check = "DELETE FROM " . $table . " WHERE " . $condition;
            return $this;
        }
    }