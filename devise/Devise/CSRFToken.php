<?php
    namespace xel\framework\Devise;
    class CSRFToken {
      
        private $token;
      
        public function __construct() {
          $generate = openssl_random_pseudo_bytes(32);
          $encrypt = bin2hex($generate);
          $this->token = $encrypt;
        }
        
        public function getToken() {
          return $this->token;
        }

        public function checksession() {
          if (session_status() === PHP_SESSION_NONE) {
              echo 'Session has been destroyed.';
            } else {
              echo 'Session has not been destroyed.';
            }
        }

        public function regenerate_token() {
          $generate = openssl_random_pseudo_bytes(64);
          $encrypt = bin2hex($generate);
          $this->token = $encrypt;
          return $this->token;
        }

        public function Dumpost() {
          var_dump($_POST);
        }

        public function clearform() {
          foreach ($_POST as $key => $value) {
            $_POST[$key] = NULL;
          }
        }

        public function endall() {
          session_unset();
          session_destroy();
        } 


        public function setCookie($name, $value, $expire = 0, $path = '/', $domain = '', $secure = false, $httponly = true, array $samesite = ['SameSite' => 'Strict']) {
          $options = [
              'expires' => $expire,
              'path' => $path,
              'domain' => $domain,
              'secure' => $secure,
              'httponly' => $httponly,
              'samesite' => $samesite['SameSite']
          ];
          setcookie($name, $value, $options);
      }
    }