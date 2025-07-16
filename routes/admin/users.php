<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::get('/users/lists', function () {
    $data = [
        [
            'id' => 1,
            'name' => 'Sokunthy Vathana',
            'gender' => 'male',
            'age' => '25'
        ],


    ];
    return $data;
});


