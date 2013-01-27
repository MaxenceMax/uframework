<?php

require __DIR__ . '/../autoload.php';
use Model\Locations;
use Http\Request;

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

$app->post('/locations/',function(Request $request) use($app){
	$modelLoc = new Locations();
	$modelLoc->create($_POST['locationName']);
	$locations = $modelLoc->findAll();
	$app->redirect('/locations');

});
	
	
$app->get('/locations/',function(Request $request) use ($app){
	
	$modelLoc = new Locations();
	
	$locations = $modelLoc->findAll();
	
	return $app->render('locations.php',array("location"=>$locations));
});


$app->get('/locations/(\d+)',function(Request $request, $id) use ($app){
	$modelLoc = new Locations();
	
	$location = $modelLoc->findOneById($id);
	
	return $app->render('location.php',array("location"=>$location));
	
});




$app->delete('/locations/(\d+)', function (Request $request, $id) use ($app) {
		
	$modelLoc = new Locations();
	$modelLoc->delete($id);	
	return $app->render('locations.php',array("location"=>$locations));

});


return $app;
