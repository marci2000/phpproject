<?php 

class Helper{
    
    //Add methods here
    function passwordMatch($pw1, $pw2){
        if ($pw1 == $pw2){
            return true;
        }
        return false;
    }

    function isValidLength($str, $min = 8, $max = 20){
        if (strlen($str) < $min || strlen($str) > $max){
            return false;
        }
        return true;
    }

    function isEmpty($postValues){
        foreach ($postValues as $value){
            if (strlen($value) == 0){
                return true;
            }
        }
        return false;
    }

    function isSecure($pw){
        if (preg_match("~[a-z]+~", $pw) && preg_match("~[0-9]+~", $pw) && preg_match("~[A-Z]+~", $pw)){
            return true;
        }
        return false;
    }

    function keepValues($val, $type, $attr = ''){
        switch ($type){
            case 'textbox':
                echo "value = '$val'";
                break;
            case 'textarea':
                echo "value = '$val'";
            case 'select':
                echo "value = '$val'";
            default:
                echo '';
        }
    }
}