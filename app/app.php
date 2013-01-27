<?php

require __DIR__ . '/../autoload.php';

// Config
$debug = true;

$app = new \App(new View\TemplateEngine(
    __DIR__ . '/templates/'
), $debug);

/**
 * Index
 */
$app->get('/', function () use ($app) {
    return $app->render('index.php');
});

$app->post('/locations/',function(){});
$app->get('/locations/',function(){});
$app->get('/locations/(\d+)',function(){
	new 
});
$app->put('/locations/(\d+)',function(){});
$app->delete('/locations/(\d+)',function(){});


return $app;
