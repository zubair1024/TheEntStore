<?php
class Helper {
	public static function getActive($page=NULL){
            if(!empty($page)){
                if(is_array($page)){
                    $error=array();
                    foreach($page as $key => $value){
                        if(Url::getParams($key)!=$value){
                            array_push($error, $key);
                        }
                    }
                    return empty($error)? " class=\"act\"":null;
                }
                return $page==Url::cPage()? " class=\"act\"":null;
            }
        }
        
	public static function encodeHTML($string, $case = 2) {
		switch($case) {
			case 1:
			return htmlentities($string, ENT_NOQUOTES, 'UTF-8', false);
			break;			
			case 2:
			$pattern = '<([a-zA-Z0-9\.\, "\'_\/\-\+~=;:\(\)?&#%![\]@]+)>';
			// put text only, devided with html tags into array
			$textMatches = preg_split('/' . $pattern . '/', $string);
			// array for sanitised output
			$textSanitised = array();			
			foreach($textMatches as $key => $value) {
				$textSanitised[$key] = htmlentities(html_entity_decode($value, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
			}			
			foreach($textMatches as $key => $value) {
				$string = str_replace($value, $textSanitised[$key], $string);
			}			
			return $string;			
			break;
		}
	}
        public static function getImgSize($image,$case){
            if(is_file($image)){
                $size=  getimagesize($image);
                return $size[$case];
            }
        }
        public static function shortenString($string,$len=150){
            if(strlen($string)){
                $string=trim(substr($string, 0, $len));
                $string=  substr($string, 0,  strpos($string," "))."&hellip;";
            }else{
                $string.="&hellip;";
            }
            return $string;
        }
	
}