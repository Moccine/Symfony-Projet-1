<?php
/**
 * Created by PhpStorm.
 * User: Momo Junior
 * Date: 27/10/2017
 * Time: 20:31
 */

namespace AppBundle\Service;


class ApplicationManager
{
    public  function __construct()
    {
    }

    public  function  slugfy($str){
        str_replace("-", " ", $str);
        $cleanStr = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", trim($str))));

        return str_replace(" ", "-", $cleanStr);
    }

}