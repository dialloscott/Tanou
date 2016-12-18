<?php
require '../vendor/autoload.php';
// definition deconstante
define('BASE_PATH',dirname(__DIR__));
define('PUBLIC_PATH',__DIR__);
define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
//dispatcher
$faker  = Faker\Factory::create(); // cette class provien dans la dossier vendor pour genere plusieur utilisateur

require BASE_PATH.DIRECTORY_SEPARATOR.'/lib/autoloader.php';

/*
 * la generation des utilisateur avec la variable $faker
 * on se connecte dabord a la base de donne apres on fait un boucle for de 1 a 50
 * $db = new Database('mvc','localhost','root','');
$db->connect();

for($i = 0 ; $i < 50 ; $i ++){
    $db->insert([
        "title" => $faker->title,
        "slug"   => $faker->slug,
        "content" => $faker->text,
        "online"  => '1',
        'category_id' => '1',
        'author_id' => '1'
    ],'posts');
}
die();
 */
$router = new Router($_SERVER['REQUEST_URI']);
$router->dispatch();


