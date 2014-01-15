drop table SITE;
drop table APPARTENIR_TOURNOI;
drop table TOURNOI;
drop table EVENT_ADV;
drop table EVENT;
drop table JOUEUR_ADV;
drop table POINTS;
drop table TYPE_PARTICIPATION;
drop table POSTE;
drop table APPARTENIR_EQUIPE;
drop table PHOTO_MATCHS;
drop table MATCHS;
drop table TEAM_ADV;
drop table INSCRIT;
drop table CATEGORIE;
drop table UTILISATEUR;
drop table TYPE_USER;
drop table PHOTO;

create table PHOTO(
       Id integer(10) primary key,
       Nom varchar(20),
       Fichier varchar(20) unique,
       Commentaires varchar(50)
);


create table TYPE_USER(
       Id integer(10) primary key,
       Nom varchar(10) unique,
       Description varchar(50)
);


create table UTILISATEUR(
       Id integer(10) primary key,
       Pseudo varchar(10) unique not null,
       Mdp varchar(10) not null,
       IdPhoto integer(10) references PHOTO(Id),
       IdTypeUser integer(10) not null references TYPE_USER(Id)
);


create table CATEGORIE(
       Id integer(10) primary key,
       Nom varchar(10) unique,
       Description varchar(50)
);


create table INSCRIT(
       Id integer(10) primary key,
       Nom varchar(20) not null,
       Prenom varchar(20),
       Taille integer(10),
       Poids integer(10),
       Position varchar(15),
       IdPhoto integer(10) references PHOTO(Id),
       IdCategorie integer(10) references CATEGORIE(Id)
);


create table TEAM_ADV(
       Id integer(10) primary key,
       Nom varchar(20) not null unique,
       IdCategorie integer(10) references CATEGORIE(Id),
       Description varchar(50)     
);


create table MATCHS(
       Id integer(10) primary key,
       IdCategorie integer(10) references CATEGORIE(Id),
       IdTeamAdv integer(10) references TEAM_ADV(Id) ,
       DateMATCHS Date not null,
       Heure integer(8) ,
       Lieu varchar(15),
       Commentaires varchar(100)
);


create table PHOTO_MATCHS(
       IdMATCHS integer(10),
       IdPhoto integer(10),
       primary key(IdMATCHS,IdPhoto)
);


create table APPARTENIR_EQUIPE(
       Id integer(10) primary key,
       IdInscrit integer(10) references INSCRIT(Id),
       IdMATCHS integer(10) references MATCHSS(Id)
);


create table POSTE(
       Id integer(10) primary key,
       Nom varchar(10),
       Description varchar(50)
);


create table TYPE_PARTICIPATION(
       IdAppartenance integer(10) references APPARTENIR_EQUIPE(Id),
       HeureDebut integer(8) not null,
       IdPoste integer(10) references POSTE(Id),
       HeureFin integer(8) not null,
       primary key(IdAppartenance,HeureDebut)
);


create table POINTS(
       Id integer(10) primary key,
       Nom varchar(10) not null,
       NbPoints integer(2) not null,
       Description varchar(50)
);


create table JOUEUR_ADV(
       Id integer(10) primary key,
       IdTeamAdv integer(10) references TEAM_ADV(Id),
       Nom varchar(15) not null,
       Prenom varchar(15),
       IdPoste integer(10) references POSTE(Id)
);


create table EVENT(
       Id integer(10) primary key,
       IdMATCHS integer(10) references MATCHS(Id),
       IdInscrit integer(10) references INSCRIT(Id),
       IdPoints integer(10) references POINTS(Id),
       Nom varchar(10),
       Moment Date not null,
       Commentaires varchar(50)
);


create table EVENT_ADV(
       Id integer(10) primary key,
       IdMATCHS integer(10) references MATCHS(Id),
       IdJoueurAv integer(10) references JOUEUR_ADV(Id),
       IdPoints integer(10) references POINTS(Id),
       Nom varchar(10),
       Moment Date not null,
       Commentaires varchar(50)
);


create table TOURNOI(
       Id integer(10) primary key,
       Nom varchar(15) not null,
       Description varchar(50),
       DateDebut Date not null,
       DateFin Date not null
);

create table APPARTENIR_TOURNOI(
       IdTournoi integer(10) references TOURNOI(Id),
       IdMATCHS integer(10) references MATCHS(Id),
       primary key(IdTournoi,IdMATCHS)
);


create table SITE(
       Nom varchar(25) primary key,
       URL varchar(255)
);

