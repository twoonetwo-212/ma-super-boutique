<?php
namespace App\Controllers;

use App\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index(){

        include_once ROOT.'/Views/articles/index.php';

    }
}

