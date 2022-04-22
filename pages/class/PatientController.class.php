<?php

class PatientController
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function ajouter(Patient $Patient)
   {
     $sql=$this->_db->prepare("INSERT INTO Patient SET nom=:nom, prenom=:prenom, sexe=:sexe, telephone=:telephone, adresse=:adresse, age=:age, 
     groupeSanguin=:groupeSanguin, maladie=:maladie, antecedent=:antecedent");
     $sql->bindValue(":nom",$Patient->getNom());
     $sql->bindValue(":prenom",$Patient->getPrenom());
     $sql->bindValue(":sexe",$Patient->getSexe());
     $sql->bindValue(":telephone",$Patient->getTelephone());
     $sql->bindValue(":adresse",$Patient->getAdresse());
     $sql->bindValue(":age",$Patient->getAge());
     $sql->bindValue(":groupeSanguin",$Patient->getGroupeSanguin());
     $sql->bindValue(":maladie",$Patient->getMaladie());
     $sql->bindValue(":antecedent",$Patient->getAntecedent());
     $sql->execute();
   }

   public function get($idpatient)
   {
     $sql=$this->_db->query("SELECT * FROM Patient WHERE idpatient=".$idpatient);
     $row=$sql->fetch();
     $sql->closeCursor();
     $p=new Patient($row);
     return $p;
   }

   public function supprimer($id)
   {
     $sql=$this->_db->exec("DELETE  FROM Patient WHERE idpatient=".$idpatient);
     return $sql>0;
   }
   
   public function afficher_list()
   {
     $Patient=[];
     $sql=$this->_db->query("SELECT * FROM Patient ORDER BY nom, prenom ASC");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     
     foreach ($rows as $row) {

     $Patient[]=new Patient($row);
     }
     return $Patient;
   }

 public function modifier(Patient $Patient)
   {
    //echo $patient->getId();
     try{ 
            $sql=$this->_db->prepare("UPDATE  Patient SET nom=:nom, prenom=:prenom, sexe=:sexe, telephone=:telephone, adresse=:adresse, age=:age, 
            groupeSanguin=:groupeSanguin, maladie=:maladie, antecedent=:antecedent WHERE idpatient=:idpatient");
            $d=$sql->execute(array('nom'=>$Patient->getNom(),
            'prenom'=>$Patient->getPrenom(),
            'sexe'=>$Patient->getSexe(),
            'telephone'=>$Patient->getTelephone(),
            'adresse'=>$Patient->getAdresse(),
            'age'=>$Patient->getAge(),
            'groupeSanguin'=>$Patient->getGroupeSanguin(),
            'maladie'=>$Patient->getMaladie(),
            'antecedent'=>$Patient->getAntecedent(),
            'idpatient'=>$Patient->getIdpatient()
          ));  
     } catch (Exception $ex) {
         echo $ex->getMessage();
     }
   }
}
