<?php

namespace Http;

class JsonResponse extends Response
{

	/** 
	 * @TODO Appeler le constructeur parent ...
	 */ 
    public function __construct($content, $statusCode = 200, array $headers = array())
    {
        parent::__construct($content, $statusCode, array_merge(array('Content-Type' => 'application/json'), $headers));
    }

}
