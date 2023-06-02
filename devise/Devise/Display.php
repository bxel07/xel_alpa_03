<?php 

    namespace xel\framework\Devise;

    class Display{
        public static function render(string $display, array $model = []) {
            require __DIR__.'/../Display/'.$display.'.php';
        }
    }