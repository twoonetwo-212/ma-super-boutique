<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\classes\TestClass;
use App\Db\Db;
use App\Models\annonces\AnnoncesModel;
use App\Models\articles\ArticlesModel;
use App\Models\Model;
use App\Models\users\UsersModel;

require_once realpath("vendor/autoload.php");

// phpinfo();
// die;

$model = new UsersModel;

$donnees = array(
    'titre' => 'produits modifié',
    'description' => 'modification boutique',
    'actif' => 1
);

// $annonce = $model->hydrate($donnees);

 $user = $model
->setEmail('masuperboutique@gmail.com')
->setPass(password_hash('azerty', PASSWORD_ARGON2I));


$model->create($user);

echo '<pre>';
var_dump($model);
echo '</pre>';
