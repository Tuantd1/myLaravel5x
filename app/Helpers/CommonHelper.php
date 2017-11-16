<?php
namespace App\Helpers;
/**
*
*/
class CommonHelper
{
    public static function convertStrongToUppercase($str)
    {
        $newStr = strtoupper($str);
        return $newStr;
    }

    public function convertStrTolower($str){
        $newStr = strtolower($str);
        return $newStr;
    }
}


?>