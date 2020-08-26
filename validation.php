<?php
    class validation{
        public static $error = [];
        
        public static function check($post){
            if(empty($post['username'])){
                static::$error[] = "Username can't be empty";
            }
            if(empty($post['password'])){
                static::$error[] = "Please fill up the password";
            }
            return new static;
        }
        public static function getCheck(){
            return static::$error;
        }
    }
?>