<?php

namespace App\Models\annonces;

use App\Models\Model;

class AnnoncesModel extends Model
{


    protected $id;
    protected $titre;
    protected $description;
    protected $created_at;
    protected $actif;

    public function __construct()
    {
        $this->table = "annonces";
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of actif
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set the value of actif
     *
     * @return  self
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            //setter correspondant à la clef
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }

        return $this;
    }
}
