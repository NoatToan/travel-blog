<?php

use \App\Enums\User\UserRole;

$ableForInterviewee = [
    'App\Http\Controllers\HomeController@index',
];

$ableForInterviewer = [
    'App\Http\Controllers\HomeController@index',
];

$ableForAdmin = [
    'App\Http\Controllers\HomeController@index',
];

return array_merge(
    array_fill_keys($ableForAdmin, [UserRole::ADMIN]),
    array_fill_keys($ableForInterviewer, [UserRole::ADMIN, UserRole::INTERVIEWER]),
    array_fill_keys($ableForInterviewee, [UserRole::ADMIN, UserRole::INTERVIEWER, UserRole::INTERVIEWEE]),
);
