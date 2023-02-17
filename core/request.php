<?php
    class Request {
        public static function uri() {
            //return (trim($_SERVER['REQUEST_URI'], "/"));
            return parse_url(trim($_SERVER['REQUEST_URI'], "/"), PHP_URL_PATH);
        }
    }
?>