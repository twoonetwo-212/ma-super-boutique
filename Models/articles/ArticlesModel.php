<?php 

namespace App\Models\articles;

use App\Models\Model;

class ArticlesModel extends Model
{
    public function __construct()
    {
        $this->table = "articles";
    }
}
