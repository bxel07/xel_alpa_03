<?php
   
    namespace xel\framework\Service;
    use xel\framework\Devise\Display;

    class BaseService {
        private string $dest;
        private array $data = [];

        public function __construct(array $args = [])
        {
            
        }

        
        protected function render(string $dest, array $data = []):void {
            Display::render($dest, $data);
        }
    }