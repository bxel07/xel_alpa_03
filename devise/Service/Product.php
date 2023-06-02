<?php
    namespace xel\framework\Service;
    use xel\framework\Service\BaseService;

    //image processor helper
    use xel\framework\Helper\Tempexec;

    class Product extends BaseService{
        public function categories(){
            echo "memet";
        }
        public function create()
        {
            //get image data
            $file = $_FILES['image']; 
            
            //convert to Json Format
            $object = json_encode($file, JSON_PRETTY_PRINT);
            
            //execute helper to validate image and store to temporary folder
            new Tempexec($object);
        }
    }