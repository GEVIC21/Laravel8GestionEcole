CREATE DATABASE etudiant_filiere;
USE etudiant_filiere;

create  table etudiant(
id int primary key auto_increment,
nom varchar(25),
prenom varchar(25),
age int(130),
nationalite varchar(30),
filiere varchar(25)

)ENGINE=INNODB;

create  table filiere(
id int primary key auto_increment,
libelle varchar(25)

)ENGINE=INNODB;