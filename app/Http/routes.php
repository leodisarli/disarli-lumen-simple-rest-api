<?php

$app->group(['prefix' => 'api/v1'], function ($app) {
    $app->get('candidate', 'CandidateController@index');
    $app->post('candidate', 'CandidateController@createCandidate');
    $app->put('candidate/{id}', 'CandidateController@updateCandidate');
    $app->delete('candidate/{id}', 'CandidateController@deleteCandidate');
});
