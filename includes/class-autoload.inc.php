<?php

/*spl_autoload_register('MyAutoLoader');
//fucntion 
function MyAutoLoader($ClassName){
    $path="classes/";
    $extension="class.php";
    $fullpath=$path.$ClassName.$extension;

    // condition in case of error ( file not found )
    if(!file_exists($fullpath)){
        return false;
    }
    include_once $fullpath;
}
*/


spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $url= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos($url, 'includes')!==false){
        $path = '../classes/';
    }
    else{
        $path = 'classes/';
    }
    $extension = '.class.php';
    require_once $path.$className.$extension;
}
?>