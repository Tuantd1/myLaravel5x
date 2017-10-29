<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($age = null){
        return 'this is index of Home controller';
    }
}
