<?php

namespace App\Models;


use PDOStatement;
use App\Core\Db;

class Model extends Db
{

    protected $table;

    private $db;


    /**
     * myQuery, determine si requete doit etre préparée ou non et l'éxécute
     *
     * @param  string $sql
     * @param  array $attributs
     * @return PDOStatement
     */
    public function myQuery(string $sql, array $attributs = null): PDOStatement
    {
        $this->db = Db::getInstance();

        if ($attributs) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
        } else {

            return $this->db->query($sql);
        }
    }

    public function findAll()
    {
        $query = $this->myQuery('SELECT * FROM ' . $this->table . ';');
        return $query->fetchAll();
    }

    public function findById(int $id)
    {
        return $this->myQuery('SELECT * FROM ' . $this->table . '
        WHERE id =' . $id . ';')->fetch();
    }

    public function findBy(array $criteres)
    {
        $champs = [];
        $valeurs = [];

        foreach ($criteres as $champ => $valeur) {


            $champs[] = $champ . " = ?";
            $valeurs[] = $valeur;
        }

        $liste_champ = implode(' AND ', $champs);

        return $this->myQuery('SELECT * FROM ' . $this->table . ' WHERE '
            . $liste_champ . ' ;', $valeurs)->fetchAll();

        // echo '<pre>';
        // var_dump($liste_champ);
        // echo '</pre>';
    }


    public function create()
    {

        //  INSERT INTO annonces (titre, description...) VALUES (?, ?, ?,...))
        $champs             = [];
        $interrogationMarks  = [];
        $valeurs            = [];

        foreach ($this as $champ => $valeur) {

            if ($valeur !== null && $champ !== 'table' && $champ !== 'db') {

                $champs[] = $champ;
                $interrogationMarks[] = "?";
                $valeurs[] = $valeur;
            }
        }

        $liste_champ = implode(', ', $champs);
        $liste_interrogationMark = implode(', ', $interrogationMarks);

        // echo '<pre>';
        // echo ($liste_champ);
        // die($liste_interrogationMark);
        // echo '</pre>';
        return $this->myQuery('INSERT INTO ' . $this->table . ' (' . $liste_champ . ' )
         VALUES (' . $liste_interrogationMark . ' ) ', $valeurs);
    }

    public function update(int $id)
    {

        //  UPDATE annoces SET titre = ?, description = ?,... WHERE id = ?
        $champs             = [];
        $valeurs            = [];

        foreach ($this as $champ => $valeur) {

            if ($valeur && $champ !== 'table' && $champ !== 'db') {

                $champs[] = $champ ." = ?";
                $valeurs[] = $valeur;
            }
        }

        $valeurs[] = $this->$id;

        $liste_champ = implode(', ', $champs);

        // echo '<pre>';
        // echo ($liste_champ);
        // die($liste_interrogationMark);
        // echo '</pre>';
        return $this->myQuery('UPDATE ' . $this->table . ' SET ' . $liste_champ . 'WHERE id = ?'  
        , $valeurs);
    }

    public function delete(int $id)
    {
        return $this->myQuery('DELETE  FROM ' . $this->table . '
        WHERE id = ?', [$id]);
    }

    public function hydrate($donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à la clé (key)
            // titre -> setTitre
            $setter = 'set' . ucfirst($key);

            // On vérifie si le setter existe
            if (method_exists($this, $setter)) {
                // On appelle le setter
                $this->$setter($value);
            }
        }
        return $this;
    }



}
