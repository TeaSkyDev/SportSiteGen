create table PHOTO(
       Id integer(10) primary key AUTO_INCREMENT,
       Nom varchar(20),
       Fichier varchar(20) unique,
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
       IdPhoto integer(10) references PHOTO(Id),
       IdTypeUser integer(10) not null references TYPE_USER(Id)
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
       IdCategorie integer(10) references CATEGORIE(Id),
       Description varchar(50)     
);


create table MATCHS(
       Id integer(10) primary key AUTO_INCREMENT,
       joue integer(1), 
       IdTeam1 integer(10) references TEAM(Id),
       IdTeam2 integer(10) references TEAM(Id) ,
       nbPoint1 integer(5),
       nbPoint2 integer(5),
       DateMATCHS datetime not null,
       Lieu varchar(15),
       Commentaires varchar(100)
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
       IdTeam integer(10) references TEAM(Id),
       Nom varchar(15) not null,
       idPhoto integer(10) references PHOTO(Id),
       Prenom varchar(15),
       IdPoste integer(10) references POSTE(Id),
       Description varchar(255)
);


create table EVENT(
       Id integer(10) primary key AUTO_INCREMENT,
       IdMATCHS integer(10) references MATCHS(Id),
       IdJoueur integer(10) references JOUEUR(Id),
       IdPoints integer(10) references POINTS(Id),
       Nom varchar(10),
       Moment Date not null,
       Commentaires varchar(50)
);


create table EVENT_ADV(
       Id integer(10) primary key AUTO_INCREMENT,
       IdMATCHS integer(10) references MATCHS(Id),
       IdJoueurAv integer(10) references JOUEUR(Id),
       IdPoints integer(10) references POINTS(Id),
       Nom varchar(10),
       Moment Date not null,
       Commentaires varchar(50)
);


create table TOURNOI(
       Id integer(10) primary key AUTO_INCREMENT,
       Nom varchar(15) not null,
       Description varchar(50),
       DateDebut Date not null,
       DateFin Date not null,
       nbEquipe integer(5) not null
       
);

create table APPARTENIR_TOURNOI(
       IdTournoi integer(10) references TOURNOI(Id),
       IdMATCHS integer(10) references MATCHS(Id),
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
       idNews int(5) references NEWS(id),
       idUtilisateur int(10) references UTILISATEUR(Id),
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
       idEvenement int(5) references EVENEMENT(Id),
       idUtilisateur int(10) references UTILISATEUR(Id),
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
       IdMatch integer(10) references MATCHS(Id),
       NbCarton1 integer(1),
       NbCarton2 integer(1),
       Point1 integer(5),
       Point2 integer(5),
       primary key (Id, IdMatch)
);