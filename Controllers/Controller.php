<?php 
namespace App\Controllers;

abstract class Controller
{

    public function render(string $fichier, array $donnees = [], string $template = 'default')
    {

        extract($donnees);

        ob_start();
        
        require_once ROOT.'/Views/'.$fichier.'.php';
        $contenu = ob_get_clean();


        require_once ROOT.'/Views/'.$template.'.php';


    }



}



