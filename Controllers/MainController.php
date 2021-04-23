<?php

namespace App\Controllers;

use App\Controllers\Controller;

class MainController extends Controller
{


    public function index()
    {

        $this->render('main/index', [], 'home');


    }
}
