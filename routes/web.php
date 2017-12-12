<?php

$router->get('/', function () use ($router) {
	return view('index');
});
$router->get('add', function () use ($router) {
	return view('add');
});

$router->group(['prefix' => 'api/v1'], function($router)
{
	$router->post('candidate','CandidateController@createCandidate');
	$router->put('candidate/{id}','CandidateController@updateCandidate');
	$router->delete('candidate/{id}','CandidateController@deleteCandidate');
	$router->get('candidate','CandidateController@index');
});