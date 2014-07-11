<?php

class Url {

    public static $_page = "page";
    public static $_folder = PAGES_DIR;
    public static $_params = array();

    public static function getParams($par) {
        return isset($_GET[$par]) && $_GET[$par]!="" ? $_GET[$par] : null;
    }
    public static function cPage(){
        return isset($_GET[self::$_page]) ? $_GET[self::$_page] : 'index';
    }
    public static function getPage(){
        $page = self::$_folder.DS.self::cPage().".php";
        $error = self::$_folder.DS."error.php";
        return is_file($page) ? $page : $error;
    }
    public static function getAll(){
        if (!empty($_GET)){
            foreach ($_GET as $key => $value) {
                if(!empty($value)){
                    self::$_params[$key]=$value;
                }
            }
        }
    }
}