create table PHOTO(
       Id integer(10) primary key AUTO_INCREMENT,
       Nom varchar(20),
       Fichier varchar(255) unique,
       Commentaires varchar(50)
);


create table TYPE_USER(
       Id integer(10) primary key AUTO_INCREMENT,
       Nom varchar(255) unique,
       Description varchar(255)
);


create table UTILISATEUR(
       Id integer(10) primary key AUTO_INCREMENT,
       Pseudo varchar(10) unique not null,
       Mail varchar(50) not null,
       Mdp varchar(522) not null,
       IdPhoto integer(10) references PHOTO(Id) ON DELETE CASCADE,
       IdTypeUser integer(10) not null references TYPE_USER(Id) ON DELETE CASCADE
);


create table CATEGORIE(
       Id integer(10) primary key AUTO_INCREMENT,
       Nom varchar(10) unique,
       Description varchar(50)
);


create table TEAM(
       Id integer(10) primary key AUTO_INCREMENT,
       Nom varchar(20) not null unique,
       idPhoto integer(10) references PHOTO(Id),
       IdCategorie integer(10) references CATEGORIE(Id) ON DELETE CASCADE,
       Description varchar(50)     
);


create table MATCHS(
       Id integer(10) primary key AUTO_INCREMENT,
       joue integer(1), 
       IdTeam1 integer(10) references TEAM(Id) ON DELETE CASCADE,
       IdTeam2 integer(10) references TEAM(Id) ON DELETE CASCADE,
       nbPoint1 integer(5),
       nbPoint2 integer(5),
       DateMATCHS datetime not null,
       Lieu varchar(15),
       Commentaires varchar(100),
       IdSaison integer(10) references SAISONS(Id)
);

create table PHOTO_MATCHS(
       IdMATCHS integer(10),
       IdPhoto integer(10),
       primary key(IdMATCHS,IdPhoto)
);

create table PHOTO_TOURNOIS(
        IdTOURNOIS integer(10),
        idPhoto integer(10),
        primary key(idTOURNOIS,idPhoto)
);

create table POSTE(
       Id integer(10) primary key AUTO_INCREMENT,
       Nom varchar(10),
       Description varchar(50)
);


create table JOUEUR(
       Id integer(10) primary key AUTO_INCREMENT,
       IdTeam integer(10) references TEAM(Id) ON DELETE CASCADE,
       Nom varchar(15) not null,
       idPhoto integer(10) references PHOTO(Id),
       Prenom varchar(15),
       IdPoste integer(10) references POSTE(Id) ON DELETE CASCADE,
       Description varchar(255)
);



create table TOURNOI(
       Id integer(10) primary key AUTO_INCREMENT,
       Nom varchar(60) not null,
       Description varchar(255),
       DateDebut Date not null,
       DateFin Date not null,
       nbEquipe integer(5) not null
       
);

create table APPARTENIR_TOURNOI(
       IdTournoi integer(10) references TOURNOI(Id) ON DELETE CASCADE,
       IdMATCHS integer(10) references MATCHS(Id) ON DELETE CASCADE,
       NumTour integer(5),
       primary key(IdTournoi,IdMATCHS)
);


create table SITE(
       Nom varchar(25) primary key,
       URL varchar(255),
       current_template varchar(255)
);

create table NEWS(
       Id int(5) AUTO_INCREMENT,
       titre varchar(100),
       date datetime,
       contenu varchar(1000),
       IdPhoto integer(10) references PHOTO(Id),
       auteur varchar(100),
       primary key(id)
);

create table NEWS_COM(
       Id int(7) AUTO_INCREMENT,
       contenu varchar(1000),
       date datetime,
       idNews int(5) references NEWS(id) ON DELETE CASCADE,
       idUtilisateur int(10) references UTILISATEUR(Id) ON DELETE CASCADE,
       primary key(id)
);


create table EVENEMENT(
       Id int(5) AUTO_INCREMENT,
       titre varchar(100),
       date datetime,
       contenu varchar(1000),
       location varchar(100),
       primary key(id)
);

create table EVENEMENT_COM(
       Id int(7) AUTO_INCREMENT,
       contenu varchar(1000),
       date datetime,
       idEvenement int(5) references EVENEMENT(Id) ON DELETE CASCADE,
       idUtilisateur int(10) references UTILISATEUR(Id) ON DELETE CASCADE,
       primary key(id)
);

create table MENU_ELEM (
       Id integer(1) AUTO_INCREMENT,
       Nom varchar(255), 
       url varchar(255),
       primary key(Id)
);

create table FICHE ( 
       Id integer(10) AUTO_INCREMENT, 
       IdMatch integer(10) references MATCHS(Id) ON DELETE CASCADE,
       NbCarton1 integer(1),
       NbCarton2 integer(1),
       Point1 integer(5),
       Point2 integer(5),
       primary key (Id, IdMatch)
);

create table SAISONS (
       Id integer(10) AUTO_INCREMENT,
       Saison integer(4) unique not null,
       primary key(Id, Saison)
);