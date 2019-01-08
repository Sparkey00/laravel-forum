<?php
/**
 * Created by PhpStorm.
 * User: Spark
 * Date: 08.01.2019
 * Time: 9:30
 */

namespace App\CustomClasses;


class MessagesWrapper
{
    public static function format($str){
        $formated = trim(htmlentities($str));
        $formated = str_replace('[bold]','<b>',$formated);
        $formated = str_replace('[/bold]','</b>',$formated);
        $formated = str_replace('[italic]','<i>',$formated);
        $formated = str_replace('[/italic]','</i>',$formated);
        $formated = str_replace('[underline]','<u>',$formated);
        $formated = str_replace('[/underline]','</u>',$formated);

        return $formated;
    }
}