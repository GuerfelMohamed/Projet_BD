
CREATE DATABASE bd;
use bd;


/*Table structure for table 'aeroport'*/
DROP TABLE IF EXISTS aeroport;
CREATE TABLE aeroport (
  nom_aeroport varchar(20) NOT NULL,
  code varchar(10) NOT NULL,
  ville varchar(45) NOT NULL,
  PRIMARY KEY (nom_aeroport,code)
);
INSERT INTO aeroport VALUES ('Barcelone','BCN','Barcelone'),('Charles_de_Gaulle','CDG','Paris'),('Lille','LIL','Lille'),('Madrid-Barajas','MAD','Madrid'),('Orly','ORY','Paris'),('Saint-Exupery','LYS','Lyon');

/*Table structure for table 'avion'*/
DROP TABLE IF EXISTS avion;
CREATE TABLE avion (
  numero_immatriculation varchar(10) NOT NULL,
  type varchar(10) NOT NULL,
  PRIMARY KEY (numero_immatriculation)
);
INSERT INTO avion VALUES ('G62345','A320'),('N12345','B747'),('N12360','B747');


/*Table structure for table 'utilisateur'*/
DROP TABLE IF EXISTS utilisateur;
CREATE TABLE utilisateur (
  idUtilisateur int(11) NOT NULL AUTO_INCREMENT,
  nom_utilisateur varchar(45) NOT NULL,
  prenom_utilisateur varchar(45) NOT NULL,
  email varchar(45) NOT NULL,
  mot_de_passe varchar(45) DEFAULT NULL,
  PRIMARY KEY (idUtilisateur),
  UNIQUE KEY email_UNIQUE (email)
);
INSERT INTO utilisateur VALUES (3,'med','guer','med@gmail.com','medmed'),(4,'mejdi','merr','mejdi@gmail.com','meme'),(5,'saleh','ali','saleh@gmail.com','sasa');

/* Table structure for table 'roles' */


DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
  idroles int(11) NOT NULL,
  role varchar(45) NOT NULL,
  PRIMARY KEY (idroles)
);
INSERT INTO roles VALUES (0,'administrateur'),(1,'personnel'),(10,'passager');

/*Table structure for table 'utilisateur_roles'*/
DROP TABLE IF EXISTS utilisateur_roles;
CREATE TABLE utilisateur_roles (
  Id_utilisateur int(11) NOT NULL,
  Id_role int(11) NOT NULL,
  PRIMARY KEY (Id_utilisateur,Id_role),
  KEY role_idx (Id_role),
  CONSTRAINT role FOREIGN KEY (Id_role) REFERENCES roles (idroles),
  CONSTRAINT utilisateur FOREIGN KEY (Id_utilisateur) REFERENCES utilisateur (idUtilisateur)
);
INSERT INTO utilisateur_roles VALUES (3,0),(4,1),(5,10);

/* Table structure for table 'passager'*/


DROP TABLE IF EXISTS passager;
CREATE TABLE passager (
  passeport_passager varchar(10) NOT NULL,
  prenom varchar(45) NOT NULL,
  nom varchar(45) NOT NULL,
  adresse varchar(45) NOT NULL,
  IdUtilisateur int(11) DEFAULT NULL,
  PRIMARY KEY (passeport_passager),
  KEY ID_utilisateur_idx (IdUtilisateur),
  CONSTRAINT ID_utilisateur FOREIGN KEY (IdUtilisateur) REFERENCES utilisateur (idUtilisateur)
);
INSERT INTO passager VALUES ('x12345','touhami','ben ali','lyon',NULL);


/*Table structure for table 'vol'*/
DROP TABLE IF EXISTS vol;
CREATE TABLE vol (
  numero_vol int(11) NOT NULL,
  debut_periode date NOT NULL,
  fin_periode date NOT NULL,
  heure_depart time NOT NULL,
  heure_arrivee time NOT NULL,
  numero_inmatriculation varchar(11) NOT NULL,
  PRIMARY KEY (numero_vol),
  KEY numero_inmatriculation_idx (numero_inmatriculation),
  CONSTRAINT num_inmatriculation FOREIGN KEY (numero_inmatriculation) REFERENCES avion (numero_immatriculation)
);

INSERT INTO vol VALUES (1,'2020-11-01','2020-12-01','08:30:00','09:45:00','N12345'),(2,'2020-11-01','2020-12-01','18:30:00','19:45:00','N12360'),(3,'2020-11-01','2020-12-01','12:30:00','14:00:00','G62345');


/*Table structure for table 'depart'*/
DROP TABLE IF EXISTS depart;
CREATE TABLE depart (
  id_depart int(11) NOT NULL,
  place_libre int(11) DEFAULT NULL,
  place_occupee int(11) DEFAULT NULL,
  date_depart date NOT NULL,
  numero_vol int(11) NOT NULL,
  prix int(11) NOT NULL,
  PRIMARY KEY (id_depart),
  KEY numero_vol_idx (numero_vol),
  CONSTRAINT numero_vol FOREIGN KEY (numero_vol) REFERENCES vol (numero_vol)
);
INSERT INTO depart VALUES (1,178,2,'2020-11-01',1,100),(2,0,180,'2020-11-08',1,105),(3,180,0,'2020-11-15',1,95),(4,180,0,'2020-11-22',1,97),(5,180,0,'2020-11-29',1,102),(6,180,0,'2020-12-01',2,90),(7,180,0,'2020-12-08',2,95),(8,180,0,'2020-12-15',2,98),(9,180,0,'2020-12-22',2,95),(10,180,0,'2020-12-29',2,100),(11,180,0,'2021-01-01',3,105),(12,180,0,'2021-01-08',3,105),(13,180,0,'2021-01-15',3,95),(14,180,0,'2021-01-22',3,98),(15,180,0,'2021-01-29',3,92);


/*Table structure for table 'billet'*/
DROP TABLE IF EXISTS billet;
CREATE TABLE billet (
  numero_billet int(11) NOT NULL AUTO_INCREMENT,
  date_emission date NOT NULL,
  id_depart int(11) NOT NULL,
  passeport_passager varchar(10) NOT NULL,
  PRIMARY KEY (numero_billet),
  KEY Id_depart_idx (id_depart),
  KEY passeport_passager_idx (passeport_passager),
  CONSTRAINT Id_depart FOREIGN KEY (id_depart) REFERENCES depart (id_depart),
  CONSTRAINT passeport_passager FOREIGN KEY (passeport_passager) REFERENCES passager (passeport_passager)
);


INSERT INTO billet VALUES (9,'2019-11-24',1,'x12345');

/*Table structure for table 'membre_equipage'*/
DROP TABLE IF EXISTS membre_equipage;
CREATE TABLE membre_equipage (
  numero_SS int(13) NOT NULL,
  fonction varchar(45) NOT NULL,
  heures_vol int(11) DEFAULT NULL,
  prenom varchar(45) NOT NULL,
  nom varchar(45) NOT NULL,
  adresse varchar(45) DEFAULT NULL,
  salaire varchar(45) DEFAULT NULL,
  PRIMARY KEY (numero_SS)
);

INSERT INTO membre_equipage VALUES (6900006,'hôtesse',100,'Jeanne','RIDEAU','Brest','28000'),(6900007,'hôtesse',120,'Elsa','ROUX','Limoges','28000'),(6900008,'steward',130,'Theo','THAO','Bordeaux','28000'),(6900009,'steward',140,'Robert','POISSON','Nancy','28000');

/*Table structure for table 'membre_equipage_depart'*/
DROP TABLE IF EXISTS membre_equipage_depart;
CREATE TABLE membre_equipage_depart (
  numero_SS int(11) NOT NULL,
  id_depart int(11) DEFAULT NULL,
  KEY numero_SS2_idx (numero_SS),
  KEY id_depart3_idx (id_depart),
  CONSTRAINT id_depart3 FOREIGN KEY (id_depart) REFERENCES depart (id_depart),
  CONSTRAINT numero_SS2 FOREIGN KEY (numero_SS) REFERENCES membre_equipage (numero_SS)
);

INSERT INTO membre_equipage_depart VALUES (6900006,1),(6900008,1),(6900006,2),(6900008,2),(6900006,3),(6900008,3),(6900006,4),(6900008,4),(6900006,5),(6900008,5),(6900006,6),(6900008,6),(6900006,7),(6900008,7),(6900006,8),(6900008,8),(6900006,9),(6900008,9),(6900006,10),(6900008,10),(6900007,11),(6900009,11),(6900007,12),(6900009,12),(6900007,13),(6900009,13),(6900007,14),(6900009,14),(6900007,15),(6900009,15);


/* Table structure for table 'pilote'*/
DROP TABLE IF EXISTS pilote;
CREATE TABLE pilote (
  numero_SS int(13) NOT NULL,
  numero_license int(11) DEFAULT NULL,
  heures_vol int(11) DEFAULT NULL,
  prenom varchar(45) DEFAULT NULL,
  nom varchar(45) DEFAULT NULL,
  adresse varchar(45) DEFAULT NULL,
  salaire int(11) DEFAULT NULL,
  PRIMARY KEY (numero_SS)
);

INSERT INTO pilote VALUES (6900001,20,100,'Jean','BINET','Lyon',36000),(6900002,21,150,'Stephane','BLANC','Lyon',36000),(6900003,22,120,'Sylvie','ANGONIN','Grenoble',36000),(6900004,23,130,'Ludovic','LAFORET','Annecy',36000),(6900005,24,140,'Nathalie','MOITA','Poitiers',36000);

/*Table structure for table 'pilote_depart'*/
DROP TABLE IF EXISTS pilote_depart;
CREATE TABLE pilote_depart (
  numero_SS int(13) NOT NULL,
  id_depart int(11) NOT NULL,
  KEY id_depart_idx (id_depart),
  KEY numero_SS3_idx (numero_SS),
  CONSTRAINT id_depart2 FOREIGN KEY (id_depart) REFERENCES depart (id_depart),
  CONSTRAINT numero_SS3 FOREIGN KEY (numero_SS) REFERENCES pilote (numero_SS)
);

INSERT INTO pilote_depart VALUES (6900001,1),(6900001,2),(6900001,3),(6900001,4),(6900001,5),(6900002,6),(6900002,7),(6900002,8),(6900002,9),(6900002,10),(6900003,11),(6900003,12),(6900003,13),(6900003,14),(6900003,15),(6900004,11),(6900004,12),(6900004,13),(6900004,14),(6900004,15);



/*Table structure for table 'vol_aeroport'*/
DROP TABLE IF EXISTS vol_aeroport;
CREATE TABLE vol_aeroport (
  numero_vol int(11) NOT NULL,
  nom_aeroport_depart varchar(45) DEFAULT NULL,
  code_depart varchar(45) DEFAULT NULL,
  nom_aeroport_destination varchar(45) DEFAULT NULL,
  code_destination varchar(45) DEFAULT NULL,
  KEY numero_vol2_idx (numero_vol),
  KEY aerport_depart_idx (nom_aeroport_depart,code_depart),
  KEY aeroport_destination_idx (nom_aeroport_destination,code_destination),
  CONSTRAINT aeroport_destination FOREIGN KEY (nom_aeroport_destination, code_destination) REFERENCES aeroport (nom_aeroport, code),
  CONSTRAINT aeroport_depart FOREIGN KEY (nom_aeroport_depart, code_depart) REFERENCES aeroport (nom_aeroport, code),
  CONSTRAINT numero_vol2 FOREIGN KEY (numero_vol) REFERENCES vol (numero_vol)
);

INSERT INTO vol_aeroport VALUES (1,'Saint-Exupery','LYS','Charles_de_Gaulle','CDG'),(2,'Charles_de_Gaulle','CDG','Saint-Exupery','LYS'),(3,'Saint-Exupery','LYS','Orly','ORY');
