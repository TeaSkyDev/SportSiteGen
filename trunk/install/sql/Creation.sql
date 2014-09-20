CREATE TABLE photo (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       Nom VARCHAR(20),
       Fichier VARCHAR(255) UNIQUE,
       Commentaires VARCHAR(50)
);


CREATE TABLE type_utilisateur (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       Nom VARCHAR(255) UNIQUE,
       Description VARCHAR(255)
);


CREATE TABLE utilisateur (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       Pseudo VARCHAR(10) UNIQUE NOT NULL,
       Mail VARCHAR(50) NOT NULL,
       Mdp VARCHAR(522) NOT NULL,
       IdPhoto INTEGER(10) REFERENCES photo(Id) ON DELETE CASCADE,
       IdTypeUser INTEGER(10) NOT NULL REFERENCES type_utilisateur(Id) ON DELETE CASCADE
);


CREATE TABLE categorie (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       Nom VARCHAR(10) UNIQUE,
       Description VARCHAR(50)
);


CREATE TABLE equipe (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       Nom VARCHAR(20) NOT NULL UNIQUE,
       idPhoto INTEGER(10) REFERENCES photo(Id),
       IdCategorie INTEGER(10) REFERENCES categorie(Id) ON DELETE CASCADE,
       Description VARCHAR(50)     
);


CREATE TABLE `match` (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       joue INTEGER(1), 
       IdTeam1 INTEGER(10) REFERENCES equipe(Id) ON DELETE CASCADE,
       IdTeam2 INTEGER(10) REFERENCES equipe(Id) ON DELETE CASCADE,
       nbPoint1 INTEGER(5),
       nbPoint2 INTEGER(5),
       DateMATCHS datetime NOT NULL,
       Lieu VARCHAR(15),
       Commentaires VARCHAR(100),
       IdSaison INTEGER(10) REFERENCES saison(Id)
);

CREATE TABLE photo_match (
       IdMATCHS INTEGER(10),
       IdPhoto INTEGER(10),
       PRIMARY KEY(IdMATCHS,IdPhoto)
);

CREATE TABLE photo_tournoi (
        IdTOURNOIS INTEGER(10),
        idPhoto INTEGER(10),
        PRIMARY KEY(idTOURNOIS,idPhoto)
);

CREATE TABLE poste (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       Nom VARCHAR(10),
       Description VARCHAR(50)
);


CREATE TABLE joueur (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       IdTeam INTEGER(10) REFERENCES equipe(Id) ON DELETE CASCADE,
       Nom VARCHAR(15) NOT NULL,
       idPhoto INTEGER(10) REFERENCES photo(Id),
       Prenom VARCHAR(15),
       IdPoste INTEGER(10) REFERENCES poste(Id) ON DELETE CASCADE,
       Description VARCHAR(255)
);



CREATE TABLE tournoi (
       Id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
       Nom VARCHAR(60) NOT NULL,
       Description VARCHAR(255),
       DateDebut Date NOT NULL,
       DateFin Date NOT NULL,
       nbEquipe INTEGER(5) NOT NULL
       
);

CREATE TABLE appartenir_tournoi (
       IdTournoi INTEGER(10) REFERENCES tournoi(Id) ON DELETE CASCADE,
       IdMATCHS INTEGER(10) REFERENCES `match`(Id) ON DELETE CASCADE,
       NumTour INTEGER(5),
       PRIMARY KEY(IdTournoi,IdMATCHS)
);


CREATE TABLE site (
       Nom VARCHAR(25) PRIMARY KEY,
       URL VARCHAR(255),
       current_template VARCHAR(255)
);

CREATE TABLE news (
       Id int(5) AUTO_INCREMENT,
       titre VARCHAR(100),
       date datetime,
       contenu VARCHAR(1000),
       IdPhoto INTEGER(10) REFERENCES photo(Id),
       auteur VARCHAR(100),
       PRIMARY KEY(id)
);

CREATE TABLE news_com (
       Id int(7) AUTO_INCREMENT,
       contenu VARCHAR(1000),
       date datetime,
       idNews int(5) REFERENCES news(id) ON DELETE CASCADE,
       idUtilisateur int(10) REFERENCES utilisateur(Id) ON DELETE CASCADE,
       PRIMARY KEY(id)
);


CREATE TABLE evenement (
       Id int(5) AUTO_INCREMENT,
       titre VARCHAR(100),
       date datetime,
       contenu VARCHAR(1000),
       location VARCHAR(100),
       PRIMARY KEY(id)
);

CREATE TABLE evenement_com (
       Id int(7) AUTO_INCREMENT,
       contenu VARCHAR(1000),
       date datetime,
       idEvenement int(5) REFERENCES evenement(Id) ON DELETE CASCADE,
       idUtilisateur int(10) REFERENCES utilisateur(Id) ON DELETE CASCADE,
       PRIMARY KEY(id)
);

CREATE TABLE menu_elem (
       Id INTEGER(1) AUTO_INCREMENT,
       Nom VARCHAR(255) REFERENCES fonctionnalites(Nom) ON DELETE CASCADE,
       PRIMARY KEY(Id)
);

CREATE TABLE fonctionnalites (
       Nom VARCHAR(255),
       Url VARCHAR(255),
       PRIMARY KEY(Nom)
);

CREATE TABLE fiche (
       Id INTEGER(10) AUTO_INCREMENT, 
       IdMatch INTEGER(10) REFERENCES `match`(Id) ON DELETE CASCADE,
       NbCarton1 INTEGER(1),
       NbCarton2 INTEGER(1),
       Point1 INTEGER(5),
       Point2 INTEGER(5),
       PRIMARY KEY (Id, IdMatch)
);

CREATE TABLE saison (
       Id INTEGER(10) AUTO_INCREMENT,
       Saison INTEGER(4) UNIQUE NOT NULL,
       PRIMARY KEY(Id, Saison)
);

CREATE TABLE championnat (
       Id INTEGER(10) AUTO_INCREMENT,
       Nom VARCHAR(255) UNIQUE NOT NULL,
       Description VARCHAR(255),
       PRIMARY KEY (Id)
);

CREATE TABLE appartenir_championnat (
      Id INTEGER(10) AUTO_INCREMENT,
      IdMatch INTEGER(10) REFERENCES `match`(Id),
      IdChampionnat INTEGER(10) REFERENCES championnat(Id),
      PRIMARY KEY (Id)
);