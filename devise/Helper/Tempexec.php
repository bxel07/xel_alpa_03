<?php 

    namespace xel\framework\Helper;
    class Tempexec {

        protected $file;
        protected $name;
        protected $filetmp;
        protected $error;
        protected $size;
        protected $ext;
        protected $allow = array("jpeg", "png", "jpg", "svg", "PNG");
        

        public function __construct($args) {
           $get = json_decode($args);
           $this->file = $get->name;
           $this->filetmp = $get->tmp_name;
           $this->error = $get->error;
           $this->size = $get->size;
    
           // run function
           $this->split();

           // run validate image;
           $this->validate();
        }

        // melakukan explode untuk mendapatkan extensi
        protected function split() {
            $tmp = explode('.', $this->file);
            $this->name = array_shift($tmp);
            $this->ext = end($tmp);
        }

        // melakukan validasi gambar sebelm gambar di simpan pada folder

        public function validate() {
            
            if (in_array($this->ext, $this->allow) !==false){
                
                if ($this->size < 10000000 ) {
                    if ($this->error === 0) {
                       $enc = uniqid('',true).".".$this->ext;
                       $dest = $_SERVER['DOCUMENT_ROOT'].'/'.'tempSTR/'.$enc;

                       move_uploaded_file($this->filetmp, $dest);
                       
                    } else {
                        echo "something wrong with this image";
                    }
                } else {
                    echo "Your file is to big";
                }

            } else {
                echo "You can't upload image with this exstension";
            }
        }
    }
?>