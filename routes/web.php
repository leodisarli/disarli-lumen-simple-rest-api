<?php

$router->get('/', function () use ($router) {
	return view('candidates');
});

$router->group(['prefix' => 'api/v1'], function($router)
{
	$router->post('candidates','CandidatesController@create');
	$router->put('candidates/{id}','CandidatesController@update');
	$router->delete('candidates/{id}','CandidatesController@delete');
	$router->get('candidates','CandidatesController@list');
	$router->get('candidates/{id}','CandidatesController@detail');
});