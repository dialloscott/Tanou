<?php
session_start();
function autoloader($class){
    require $class.'.php';
}

spl_autoload_register('autoloader');

require 'helpers/helpers.php';
