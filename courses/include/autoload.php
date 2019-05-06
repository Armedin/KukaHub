<?php

/**
* Simple PHP autoload
*/

function my_autoload ($pClassName) {
    $file = str_replace('\\', '/', $pClassName).'.php';
    if (file_exists($file)) {
        include $file;
    }
}
spl_autoload_register('my_autoload');
 ?>
