<?php

require __DIR__ . '/../vendor/autoload.php';
use Model\Locations;
use Http\Request;
use Http\Response;
use Http\JsonResponse;
use Exception\HttpException;

use Model\CommentFinder;
use Model\Connection;
use Model\Location;
use Model\LocationFinder;
use Model\LocationDataMapper;

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
$dsn      = 'mysql:host=localhost;dbname=uframework';
$user     = 'uframework';
$password = 'uframework123';

$con = new Connection($dsn, $user, $password);

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
$app->post('/locations/',function(Request $request) use($app,$serializer,$con){
	
	$modelLoc = new LocationDataMapper($con);
	// if ($request->guessBestFormat() === 'json') {
	 //        return new JsonResponse($serializer->serialize($modelLoc->create($request->getParameter('name')), 'json'));
	 //    }
	$tmp = trim($request->getParameter('locationName'));
	if( empty($tmp))
	{
		throw new HttpException(404,"Name empty");
	}
	$location = new Location(null,$tmp);
	$modelLoc->persist($location);
	
	$app->redirect('/locations/');
});

/**
* Update a location
*/
$app->put('/locations/(\d+)', function (Request $request, $id) use ($app,$serializer,$con) {
    $mapper = new LocationDataMapper($con);
    $tmp = trim($request->getParameter('name'));
	if( $tmp=== "")
	{
		throw new HttpException(404,"Name empty");
	}
	// if ($request->guessBestFormat() === 'json') {
 	//  return new JsonResponse($serializer->serialize($location->update($id, $request->getParameter('name')), 'json'));
 	//}
	$finder = new LocationFinder($con);
	$location = $finder->findOneById($id);
	$location->setName($tmp);

	$mapper->persist($location);
    $app->redirect('/locations/');
});

/**
* Get all locations
*/
$app->get('/locations/',function(Request $request) use ($app,$con,$serializer){
	
	$modelLoc = new LocationFinder($con);

	$locations = $modelLoc->findAll();

	if ($request->guessBestFormat() === 'json') {
        return new JsonResponse($serializer->serialize($locations, 'json'));
    }
	
	return $app->render('locations.php',array("locations"=>$locations));
});

/**
* get a location by id
*/
$app->get('/locations/(\d+)',function(Request $request, $id) use ($app,$serializer,$con){
	$finder = new LocationFinder($con);
	$location = $finder->findOneById($id);
	$location->setComments((new CommentFinder($con))->findAllForLocation($location));
	if($location === null)
	{
		throw new HttpException(404,"Location not found");
	}
	// if ($request->guessBestFormat() === 'json') {
 //        return new JsonResponse($serializer->serialize($tmp, 'json'));
 //    }
	
	return $app->render('location.php',array("location"=>$location));
	
});



/**
* Delete a location by id
*/
$app->delete('/locations/(\d+)', function (Request $request, $id) use ($app,$serializer,$con) {
	$finder = new LocationFinder($con);

	$location = $finder->findOneById($id);
	if($location === null)
	{
		throw new HttpException(404,"Location not found");
		
	}
	// if ($request->guessBestFormat() === 'json') {
 //        return new JsonResponse($serializer->serialize($modelLoc->delete($id), 'json'));
 //    }
	$mapper = new LocationDataMapper($con);
	$mapper->remove($location);
	return $app->redirect('/locations/');

});


return $app;
