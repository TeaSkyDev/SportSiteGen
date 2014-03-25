insert into APPARTENIR_TOURNOI values(1, 1, 1);
insert into APPARTENIR_TOURNOI values(1, 1, 1);
insert into APPARTENIR_TOURNOI values(1, 2, 1);
insert into APPARTENIR_TOURNOI values(1, 2, 1);
insert into APPARTENIR_TOURNOI values(1, 3, 1);
insert into APPARTENIR_TOURNOI values(1, 3, 1);
insert into APPARTENIR_TOURNOI values(2, 1, 1);
insert into APPARTENIR_TOURNOI values(2, 1, 1);

insert into CATEGORIE values(null,'Poussin','Equipe de moins de 8 ans');
insert into CATEGORIE values(null,'Junior','Equipe de 8-16 ans');
insert into CATEGORIE values(null,'Cadet','Equipe de 16-20 ans');
insert into CATEGORIE values(null,'Senior','Equipe de plus de 20 ans');

insert into EVENEMENT values(1, 'Rencontre contre Paris','2014-20-03 13:00:00','Match contre Paris','Paris');
insert into EVENEMENT values(null, 'Réunion', '2014-01-04 13:00:00', 'Ptite réunion bientot!', 'IUT Orléans');

insert into EVENEMENT_COM values(null,'Très belle rencontre !', '2014-02-04 13:00:00',1,1);

insert into JOUEUR values(1,1,'Dupond',1,'René',1,'Très abile');
insert into JOUEUR values(2,1,'Durant',1,'Jean',2,'Cours vite');
insert into JOUEUR values(3,1,'Martin',1,'Martin',3,'Rapide');

insert into MATCHS values(1,1,1,2,3,2,'2014-20-03 13:00:00','Paris','Belle rencontre');

insert into MENU_ELEM values(null, 'Accueil', 'index.php?page=accueil');
insert into MENU_ELEM values(null, 'News', 'index.php?page=news');
insert into MENU_ELEM values(null, 'Calendrier', 'index.php?page=calendrier');
insert into MENU_ELEM values(null, 'Matchs', 'index.php?page=match');
insert into MENU_ELEM values(null, 'Equipes', 'index.php?page=equipes');
insert into MENU_ELEM values(null, 'Tournois', 'index.php?page=tournois');

insert into NEWS values(null, 'Nouveau site en ligne !', '2014-02-03 00:00:00', 'Que dites vous de ce nouveau super site ??', 1, 'admin');
insert into NEWS values(null, 'Nouveau test', '2014-02-04 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at mi consectetur, commodo arcu eu, luctus augue. Vivamus tincidunt neque ipsum, eget eleifend ipsum sagittis ut. Sed ullamcorper egestas erat nec elementum. Nulla accumsan rutrum molestie. Aliquam ut magna egestas, accumsan velit ut, gravida dolor. Sed feugiat lectus et dolor venenatis posuere. Aenean vehicula vel neque vel varius. Integer imperdiet laoreet dolor, eget semper felis tincidunt vitae. Praesent id fringilla lectus. Sed sed enim venenatis, scelerisque ligula a, facilisis mi. Donec venenatis eros ac ultrices tincidunt. Maecenas mollis magna est, vitae elementum urna sagittis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 1, 'Pantoufle');

insert into PHOTO values (1,'avatar_admin','defaut.png','');

insert into POSTE values(1,'Goal','');
insert into POSTE values(2,'Milieu','');
insert into POSTE values(3,'Attaquant','');

insert into TEAM values(1,'Tigres',1,1,'');
insert into TEAM values(2,'Panthères',1,1,'');

insert into TOURNOI values(1,'Tournoi des 6 terrains','','2014-01-02 00:00:00'),'2014-01-04 00:00:00',6;

insert into TYPE_USER values(null, 'Utilisateur', 'Utilisateur classique');

insert into UTILISATEUR values(null, 'Pantoufle', 'pantoufle@hotmail.fr', 'd324c7a8e87b8a2585bf12b61d0824a3', 1, 1);




insert into NEWS_COM values(null, 'Pas mal pas mal !', '2014-02-03 12:12:00', 1, 1);


