<?php 
    namespace xel\framework\Middleware;
    use xel\framework\Middleware\Middleware;
    use xel\framework\Devise\CSRFToken as Token;
    class Authmiddleware implements Middleware {
        public function before(): void
        {
          
            // make instance of CSRFToken
            $instance = new Token();
            // generate random token 
            $token = $instance->getToken();

            session_start();

            //setup in cookie
            if (!isset($_COOKIE['csrf'])){
                $instance->setCookie('csrf', $token, time() + 86400, '/', '', false, true, ['SameSite' => 'Strict']);
                //header('Set-Cookie: csrf=' . $token . '; SameSite=Strict; Secure');
            } else {
                $csrfToken = $_COOKIE['csrf'];
            }

            if(isset($_POST['csrf'])) {
                if(hash_equals( $_COOKIE['csrf'] , $_POST['csrf'])){
                    unset($_COOKIE['csrf']);
                    setcookie('csrf', '', time() - 3600, '/', '', false, true);

                } else {
                    $instance->clearform();
                    $instance->Dumpost();
                    unset($_COOKIE['csrf']);
                    setcookie('csrf', '', time() - 3600, '/', '', false, true);
                }
            }
            //To unset dan destroy session after use
            // $instance->endall();
          
        }
    }