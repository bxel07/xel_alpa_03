<?php
    namespace xel\framework\Service;
    require_once __DIR__."/../../vendor/autoload.php";

    class HomeController extends BaseService{
        public function index()
        {
            $this->render('index', );
        }

        public function hello()
        {
          echo $_POST['csrf'];
          var_dump($_POST);
        }
    }
