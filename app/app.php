<?php

require __DIR__ . '/../vendor/autoload.php';
use Model\Locations;
use Http\Request;
use Http\Response;
use Http\JsonResponse;
use Exception\HttpException;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;


$encoders = array(new XmlEncoder(), new JsonEncoder());
$normalizer = new GetSetMethodNormalizer();
$normalizer->setCallbacks(array('createdAt' => function($date) { return $date->format('Y-m-d H:i:s'); } ));
$normalizers = array($normalizer);
$serializer = new Serializer($normalizers, $encoders);

// Config
$debug = true;

$app = new \App(new View\TemplateEngine(
    __DIR__ . '/templates/'
), $debug);

/**
 * Index
 */
$app->get('/', function () use ($app) {
    return $app->redirect('/locations/');
});

/**
* Add a new location
*/
$app->post('/locations/',function(Request $request) use($app,$serializer){
	
	$modelLoc = new Locations();
	if ($request->guessBestFormat() === 'json') {
        return new JsonResponse($serializer->serialize($modelLoc->create($request->getParameter('name')), 'json'));
    }
	$tmp = trim($request->getParameter('locationName'));
	if( empty($tmp))
	{
		throw new HttpException(404,"Name empty");
	}
	$modelLoc->create($tmp);
	$locations = $modelLoc->findAll();
	$app->redirect('/locations/');
});

/**
* Update a location
*/
$app->put('/locations/(\d+)', function (Request $request, $id) use ($app,$serializer) {
    $location = new Locations();
    $tmp = trim($request->getParameter('name'));
	if( $tmp=== "")
	{
		throw new HttpException(404,"Name empty");
	}
	if ($request->guessBestFormat() === 'json') {
        return new JsonResponse($serializer->serialize($location->update($id, $request->getParameter('name')), 'json'));
    }
    $location->update($id, $request->getParameter('name'));
    $app->redirect('/locations/');
});

/**
* Get all locations
*/
$app->get('/locations/',function(Request $request) use ($app,$serializer){
	
	$modelLoc = new Locations();
	
	$locations = $modelLoc->findAll();

	if ($request->guessBestFormat() === 'json') {
        return new JsonResponse($serializer->serialize($locations, 'json'));
    }
	
	return $app->render('locations.php',array("location"=>$locations));
});

/**
* get a location by id
*/
$app->get('/locations/(\d+)',function(Request $request, $id) use ($app,$serializer){
	$modelLoc = new Locations();
	$tmp = $modelLoc->findOneById($id);
	if($tmp === null)
	{
		throw new HttpException(404,"Location not found");
	}
	if ($request->guessBestFormat() === 'json') {
        return new JsonResponse($serializer->serialize($tmp, 'json'));
    }

	$location = $modelLoc->findOneById($id);
	
	return $app->render('location.php',array("location"=>$location));
	
});



/**
* Delete a location by id
*/
$app->delete('/locations/(\d+)', function (Request $request, $id) use ($app,$serializer) {
	$modelLoc = new Locations();
	$tmp = $modelLoc->findOneById($id);
	if($tmp === null)
	{
		throw new HttpException(404,"Location not found");
		
	}
	if ($request->guessBestFormat() === 'json') {
        return new JsonResponse($serializer->serialize($modelLoc->delete($id), 'json'));
    }
	$modelLoc->delete($id);	
	return $app->redirect('/locations/');

});


return $app;
