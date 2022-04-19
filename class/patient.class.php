<?php

class Patient
{
  private $id;
  private $nom;
  private $prenom;
  private $sexe;
  private $adresse;
  private $telephone;
  private $age;
  private $groupeSanguin;
  private $antecedent;
  private $maladie;

  public function __construct(array $donnee){

    foreach ($donnee as $key => $value) {

        $methode='set'.ucfirst($key);
        
        if((method_exists($this,$methode))){
          $this->$methode($value);
        }
    }
  }

  // les getters

    public function getId()
    {
        return $this->idpatient;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getGenre()
    {
        return $this->sexe;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getAddresse()
    {
        return $this->adresse;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getGroupeSanguin()
    {
        return $this->groupeSanguin;
    }

    public function getAntecedent()
    {
        return $this->antecedent;
    }

    public function getmaladie()
    {
        return $this->maladie;
    }

    // les setters

    public function setIdpatient($idpatient)
    {
        $this->id = $idpatient;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setGenre($sexe)
    {
        $this->sexe = $sexe;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setG_sanguin($groupeSanguin)
    {
        $this->groupeSanguin = $groupeSanguin;
    }

    public function setAntecedent($antecedent)
    {
        $this->antecedent = $antecedent;
    }

    public function setmaladie($maladie)
    {
        $this->maladie = $maladie;
    }
}


