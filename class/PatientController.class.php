<?php

class PatientController
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function ajouter(Patient $patient)
   {
     $sql=$this->_db->prepare("INSERT INTO patient SET nom =:nom, prenom =:prenom, genre =:genre, 
     addresse =:addresse, telephone =:telephone, age=:age, g_sanguin=:g_sanguin, antecedant=:antecedant, 
     m_actuelle=:m_actuelle");
     $sql->bindValue(":nom",$patient->getNom());
     $sql->bindValue(":prenom",$patient->getPrenom());
     $sql->bindValue(":genre",$patient->getGenre());
     $sql->bindValue(":addresse",$patient->getAddresse());
     $sql->bindValue(":telephone",$patient->getTelephone());
     $sql->bindValue(":age",$patient->getAge());
     $sql->bindValue(":g_sanguin",$patient->getG_sanguin());
     $sql->bindValue(":antecedant",$patient->getAntecedant());
     $sql->bindValue(":m_actuelle",$patient->getM_actuelle());
     $sql->execute();
   }

   public function get($id)
   {
     $sql=$this->_db->query("SELECT * FROM patient WHERE id=".$id);
     $row=$sql->fetch();
     $sql->closeCursor();
     $p=new Patient($row);
     return $p;
   }

   public function supprimer($id)
   {
     $sql=$this->_db->exec("DELETE  FROM patient WHERE id=".$id);
     return $sql>0;
   }
   
   public function afficher_list()
   {
     $patient=[];
     $sql=$this->_db->query("SELECT * FROM patient ORDER BY nom, prenom ASC");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     
     foreach ($rows as $row) {

     $patient[]=new Patient($row);
     }
     return $patient;
   }

 public function modifier(Patient $patient)
   {
    //echo $patient->getId();
     try{ 
            $sql=$this->_db->prepare("UPDATE  patient SET nom =:nom, prenom =:prenom, genre =:genre, 
            addresse =:addresse, telephone =:telephone, age=:age, g_sanguin=:g_sanguin, m_actuelle=:m_actuelle,
            antecedant=:antecedant WHERE id=:id");
            $d=$sql->execute(array('nom'=>$patient->getNom(),
            'prenom'=>$patient->getPrenom(),
            'genre'=>$patient->getGenre(),
            'addresse'=>$patient->getAddresse(),
            'telephone'=>$patient->getTelephone(),
            'age'=>$patient->getAge(),
            'g_sanguin'=>$patient->getG_sanguin(),
            'm_actuelle'=>$patient->getM_actuelle(),
            'antecedant'=>$patient->getAntecedant(),
            'id'=>$patient->getId()
          ));  
     } catch (Exception $ex) {
         echo $ex->getMessage();
     }
   }
}
