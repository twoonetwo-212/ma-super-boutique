<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\annonces\AnnoncesModel;

class AnnoncesController extends Controller
{

    public function index(){

        $annoncesModel = new AnnoncesModel;

        $annonces = $annoncesModel->findBy(['actif' => 1]);

        $this->render('annonces/index', compact('annonces'));

        // echo('<pre>');
        // var_dump($annonces);
        // echo('</pre>');

    }


    public function lire(int $id)
    {

        $annoncesModel = new AnnoncesModel;
        $annonce = $annoncesModel->findById($id);

        $this->render('annonces/lire', compact('annonce'));


    }



}


