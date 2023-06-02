<?php
    namespace xel\framework;
    use PHPUnit\Framework\TestCase;

    class RegexTest extends TestCase{
        public function test() {
            $path = "/product/12345/categories/abcde";
            $pattern = "#^/product/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)$#";
            $result = preg_match($pattern,$path,$variables);
            self::assertEquals(1,$result);
            var_dump($variables);
        } 
    }