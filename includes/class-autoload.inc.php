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

function myAutoLoader($className) {
    // Convertir le chemin en format standard (ex. `App\Namespace\ClassName` en `App/Namespace/ClassName`)
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    // Définir le chemin de base pour les classes
    $baseDir = __DIR__ . '/../classes/';

    // Construire le chemin complet du fichier
    $file = $baseDir . $className . '.class.php';

    // Inclure le fichier si il existe
    if (file_exists($file)) {
        require_once $file;
    } else {
        // Gérer l'erreur si le fichier n'existe pas
        throw new Exception("Unable to load class: $className");
    }
}
?>

