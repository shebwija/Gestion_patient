/*==============================================================*/
/* Nom de SGBD :  Sybase SQL Anywhere 11                        */
/* Date de cr�ation :  13/04/2022 16:14:40                      */
/*==============================================================*/



/*==============================================================*/
/* Table : Patient                                              */
/*==============================================================*/
create table Patient 
(
   idpatient            integer                        not null AUTO_INCREMENT,
   nom                  varchar(254)                   null,
   prenom               varchar(254)                   null,
   sexe                 varchar(254)                   null,
   age                  integer                        null,
   telephone            integer                        null,
   adresse              varchar(254)                   null,
   groupeSanguin        varchar(254)                   null,
   maladie              varchar(254)                   null,
   antecedent           varchar(254)                   null,
   constraint PK_PATIENT primary key (idpatient)
);

/*==============================================================*/
/* Index : PATIENT_PK                                           */
/*==============================================================*/
create unique index PATIENT_PK on Patient (
idpatient ASC
);

