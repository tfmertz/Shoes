<?php

    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Store.php';
    require_once __DIR__.'/../src/Brand.php';
    require_once __DIR__.'/../setup.config';

    // If you are using postgres.app and getting PDOExceptions, remove the last
    // two arguments, otherwise follow the instructions in setup.config.example
    $DB = new PDO("pgsql:host=localhost;dbname=shoe_db", $DB_USER, $DB_PASS);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('homepage.twig');
    });


    return $app;
 ?>
