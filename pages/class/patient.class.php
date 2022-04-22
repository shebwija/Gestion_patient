<?php

class Patient
{
  private $idpatient;
  private $nom;
  private $prenom;
  private $sexe;
  private $telephone;
  private $adresse;
  private $age;
  private $groupeSanguin;
  private $maladie;
  private $antecedent;

  public function __construct(array $donnee){

    foreach ($donnee as $key => $value) {

        $methode='set'.ucfirst($key);
        
        if((method_exists($this,$methode))){
          $this->$methode($value);
        }
    }
  }

  // les getters

    public function getIdpatient()
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

    public function getSexe()
    {
        return $this->sexe;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getAdresse()
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
    public function getMaladie()
    {
        return $this->maladie;
    }

    public function getAntecedent()
    {
        return $this->antecedent;
    }

    // les setters

    public function setIdpatient($idpatient)
    {
        $this->idpatient = $idpatient;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setGroupeSanguin($groupeSanguin)
    {
        $this->groupeSanguin = $groupeSanguin;
    }

    public function setMaladie($maladie)
    {
        $this->maladie = $maladie;
    }

    public function setAntecedent($antecedent)
    {
        $this->antecedent = $antecedent;
    }
}


