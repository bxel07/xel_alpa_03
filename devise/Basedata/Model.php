<?php 
    namespace xel\framework\Basedata;
    use xel\framework\Basedata\Basedata;
    require_once __DIR__."/../../vendor/autoload.php";
    use Pdo;
    
    //child class
    class Model extends Basedata {

        // melakukan extend dari cnstructor parrent untuk menurukan koneksi database
        public function __construct() {
            
            parent::__construct();
        }

        // mendapatkan data dari select statment dengan metode late binding
        public function get_data(){
            // $id = 2;
            // $stmt = $this->verivied()->prepare("SELECT * FROM emptab WHERE id= :id");
            // $stmt->bindParam(':id', $id);
            // $stmt->execute();
            // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // return $data;
            // select by id;
            $data1 = $this->Xgen->select('id,nama')->from('emptab')->where('id = :id', 4)->go();
            // select all;
            //$data = $this->Xgen->select('id,nama')->from('emptab')->go();
            // inser data
            // $data = $this->Xgen->insert_query('emptab',[
            //     'nama' => 'bxel'
            // ])->go();
            //update data
            //$data = $this->Xgen->update_query('emptab', ['nama' => 'new name'])->where('id = :id', 4)->go();
            //DELETE
            //$data1 = $this->Xgen->delete('emptab','id = :id',4)->go();

        }
         
    }
    //instance check     
    // $obj = new Model();
    // $obj->get_data();