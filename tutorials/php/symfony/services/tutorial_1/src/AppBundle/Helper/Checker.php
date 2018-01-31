<?php
namespace AppBundle\Helper;

class Checker
{
    public static function isValid($val = 'B'){
        return ($val == 'A') ? true : false ;
    }
}