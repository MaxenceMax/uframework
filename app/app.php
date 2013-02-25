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
use Model\Party;
use Model\PartyFinder;
use Model\PartyMapper;
use Model\CommentDataMapper;
use Model\Comment;

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
    return $app->redirect('/home');
});


/**
* Home page
*/

$app->get('/home',function(Request $request) use ($app,$con,$serializer){

	$modelLoc = new LocationFinder($con);
	$locations = $modelLoc->findLastFive();

	$finderParties = new PartyFinder($con);
	$parties = $finderParties->findAll();
	if ($request->guessBestFormat() === 'json') {
        return new JsonResponse($serializer->serialize($locations, 'json'));
    }
		
	return $app->render('index.php',array("locations"=>$locations,"parties"=>$parties));
});

/**
* New location form
*/

$app->get('/locations/new',function(Request $request) use ($app,$con,$serializer){
	return $app->render('newLocation.php',array());
});

/**
* New comment form
*/

$app->get('/comments/new',function(Request $request) use ($app,$con,$serializer){
	$location_id = $request->getParameter("location_id");
	if($location_id == null)
	{
		throw new HttpException(404,"Location_id empty");
	}
	return $app->render('newComment.php',array("location_id"=>$location_id));
});

/**
* New party form
*/
$app->get('/party/new',function(Request $request) use ($app,$con,$serializer){
	$modelLoc = new LocationFinder($con);
	$locations = $modelLoc->findAll();
	return $app->render('newParty.php',array("locations"=>$locations));
});



/**
* Add a new comment
*/
$app->post('/comments/',function(Request $request) use($app,$serializer,$con){
	
	$modelComment = new CommentDataMapper($con);
	$location_id = $request->getParameter('location_id');
	$username = trim($request->getParameter('username'));
	$body = trim($request->getParameter('body'));
	if( empty($username))
	{
		throw new HttpException(404,"username empty");
	}
	if( empty($body))
	{
		throw new HttpException(404,"comment empty");
	}
	$comment = new Comment($username,$body,null,$location_id);
	$modelComment->persist($comment);
	if ($request->guessBestFormat() === 'json') {
	    return new JsonResponse(201,$id);
	}
	$app->redirect('/locations/'.$location_id);
});

/**
* Add a new location
*/
$app->post('/locations/',function(Request $request) use($app,$serializer,$con){
	
	$modelLoc = new LocationDataMapper($con);
	$name = trim($request->getParameter('locationName'));
	$address = trim($request->getParameter('adress'));
	$phone = trim($request->getParameter('phone'));
	$description = trim($request->getParameter('description'));
	if( empty($name))
	{
		throw new HttpException(404,"Name empty");
	}
	if( empty($address))
	{
		throw new HttpException(404,"Adress empty");
	}
	$location = new Location(null,$name,null,$phone,$address,$description);
	$modelLoc->persist($location);
	if ($request->guessBestFormat() === 'json') {
	    return new JsonResponse(201,$id);
	}
	$app->redirect('/locations');
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
	$finder = new LocationFinder($con);
	$location = $finder->findOneById($id);
	$location->setName($tmp);

	$mapper->persist($location);
	if ($request->guessBestFormat() === 'json') 
	{
 	  return new JsonResponse(201,$id);
 	}

    $app->redirect('/locations');
});

/**
* Get All Parties
*/
$app->get('/parties',function(Request $request) use ($app,$con,$serializer)
{
	$modelPar = new PartyFinder($con);

	$parties = $modelPar->findAll();

	if ($request->guessBestFormat() === 'json') {
        return new JsonResponse($serializer->serialize($locations, 'json'));
    }
		
	return $app->render('parties.php',array("parties"=>$parties));
});


/**
* Get all locations
*/
$app->get('/locations',function(Request $request) use ($app,$con,$serializer){

	$order = $request->getParameter('orderBy','id');
	$limit = $request->getParameter('limit',20);

	$critere = array("orderBy"=>$order,"limit"=>$limit);

	$modelLoc = new LocationFinder($con);

	$locations = $modelLoc->findAll($critere);

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
	if($location === null)
	{
		throw new HttpException(404,"Location not found");
	}
 	if ($request->guessBestFormat() === 'json') 
 	{
 	  return new JsonResponse(201,$id);
 	}
 	$location->setComments((new CommentFinder($con))->findAllForLocation($location));	
 	$location->setParties((new PartyFinder($con))->findAllForLocation($location));
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

	$mapper = new LocationDataMapper($con);
	$mapper->remove($location);
	if ($request->guessBestFormat() === 'json') 
	{
 	  return new JsonResponse(201,$id);
 	}
	return $app->redirect('/locations');

});

$app->get('/locations/(\d+)/comments', function (Request $request,$id) use ($app,$serializer,$con)
{
	$finder = new LocationFinder($con);
	$location = $finder->findOneById($id);
	if($location === null)
	{
		throw new HttpException(404,"Location not found");
	}
	$mapper = new LocationDataMapper($con);
	$location->setComments((new CommentFinder($con))->findAllForLocation($location));
	return new JsonResponse($location->getComments());
});

return $app;
