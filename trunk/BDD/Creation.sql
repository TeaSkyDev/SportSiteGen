drop  table SITE;
drop table APPARTENIR_TOURNOI;
drop table TOURNOI;
drop table EVENT_ADV;
drop table EVENT;
drop table JOUEUR_ADV;
drop table POINTS;
drop table TYPE_PARTICIPATION;
drop table POSTE;
drop table APPARTENIR_EQUIPE;
drop table PHOTO_MATCH;
drop table MATCH;
drop table TEAM_ADV;
drop table INSCRIT;
drop table CATEGORIE;
drop table UTILISATEUR;
drop table TYPE_USER;
drop table PHOTO;




--1
create table PHOTO(
       Id number(10) primary key,
       Nom Varchar2(20),
       Fichier VarChar2(20) unique,
       Commentaires VarChar2(50)
);

--2
create table TYPE_USER(
       Id number(10) primary key,
       Nom Varchar2(10) unique,
       Description Varchar2(50)
);

--3
create table UTILISATEUR(
       Id number(10) primary key,
       Pseudo Varchar2(10) unique not null,
       Mdp VarChar2(10) not null,
       IdPhoto number(10) references PHOTO(Id),
       IdTypeUser number(10) not null references TYPE_USER(Id)
);

--4
create table CATEGORIE(
       Id number(10) primary key,
       Nom Varchar2(10) unique,
       Description Varchar2(50)
);

--5
create table INSCRIT(
       Id number(10) primary key,
       Nom Varchar2(20) not null,
       Prenom VarChar2(20),
       Taille number(10),
       Poids number(10),
       Position Varchar2(15),
       IdPhoto number(10) references PHOTO(Id),
       IdCategorie number(10) references CATEGORIE(Id)
);

--6
create table TEAM_ADV(
       Id number(10) primary key,
       Nom Varchar2(20) not null unique,
       IdCategorie number(10) references CATEGORIE(Id),
       Description Varchar2(50)     
);

--7
create table MATCH(
       Id number(10) primary key,
       IdCategorie number(10) references CATEGORIE(Id),
       IdTeamAdv number(10) references TEAM_ADV(Id) not null,
       DateMatch Date not null,
       Heure number(4,2) ,
       Lieu Varchar2(15),
       Commentaires Varchar2(100)
);

--8
create table PHOTO_MATCH(
       IdMatch number(10),
       IdPhoto number(10),
       primary key(IdMatch,IdPhoto)
);

--9
create table APPARTENIR_EQUIPE(
       Id number(10) primary key,
       IdInscrit number(10) not null references INSCRIT(Id),
       IdMatch number(10) not null references MATCH(Id)
);

--10
create table POSTE(
       Id number(10) primary key,
       Nom Varchar2(10),
       Description Varchar2(50)
);

--11
create table TYPE_PARTICIPATION(
       IdAppartenance number(10) references APPARTENIR_EQUIPE(Id),
       HeureDebut number(4,2) not null,
       IdPoste number(10) references POSTE(Id),
       HeureFin number(4,2) not null,
       primary key(IdAppartenance,HeureDebut)
);

--12
create table POINTS(
       Id number(10) primary key,
       Nom Varchar2(10) not null,
       NbPoints number(2) not null,
       Description Varchar2(50)
);

--13
create table JOUEUR_ADV(
       Id number(10) primary key,
       IdTeamAdv number(10) references TEAM_ADV(Id),
       Nom Varchar2(15) not null,
       Prenom Varchar2(15),
       IdPoste number(10) references POSTE(Id)
);

--14
create table EVENT(
       Id number(10) primary key,
       IdMatch number(10) references MATCH(Id) not null,
       IdInscrit number(10) references INSCRIT(Id) not null,
       IdPoints number(10) references POINTS(Id) not null,
       Nom Varchar2(10),
       Moment Date not null,
       Commentaires Varchar2(50)
);

--15
create table EVENT_ADV(
       Id number(10) primary key,
       IdMatch number(10) references MATCH(Id) not null,
       IdJoueurAv number(10) references JOUEUR_ADV(Id) not null,
       IdPoints number(10) references POINTS(Id) not null,
       Nom Varchar2(10),
       Moment Date not null,
       Commentaires Varchar2(50)
);

--16
create table TOURNOI(
       Id number(10) primary key,
       Nom Varchar2(15) not null,
       Description Varchar2(50),
       DateDebut Date not null,
       DateFin Date not null
);

--17
create table APPARTENIR_TOURNOI(
       IdTournoi number(10) references TOURNOI(Id),
       IdMatch number(10) references MATCH(Id),
       primary key(IdTournoi,IdMatch)
);

--18
create table SITE(
       Nom Varchar2(25) primary key       
);

insert into SITE values ("SuperSite De sport");
insert into PHOTO values (1,"","Photo admin","");
insert into TYPE_USER values (1,"Administrateur","Grand maitre du site");
insert into UTILISATEUR values (1,"Admin","admin",1,1);