<?php

$router->get('/', function () use ($router) {
	return view('candidates');
});

$router->group(['prefix' => 'api/v1'], function($router)
{
	$router->post('candidate','CandidateController@create');
	$router->put('candidate/{id}','CandidateController@update');
	$router->delete('candidate/{id}','CandidateController@delete');
	$router->get('candidate','CandidateController@list');
	$router->get('candidate/{id}','CandidateController@detail');
});