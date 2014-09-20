INSERT INTO fonctionnalites VALUES('Accueil', 'index.php?page=home');
INSERT INTO fonctionnalites VALUES('News', 'index.php?page=news');
INSERT INTO fonctionnalites VALUES('Calendrier', 'index.php?page=calendar');
INSERT INTO fonctionnalites VALUES('Matchs', 'index.php?page=matchs');
INSERT INTO fonctionnalites VALUES('Equipes', 'index.php?page=equipes');
INSERT INTO fonctionnalites VALUES('Tournois', 'index.php?page=tournois');

INSERT INTO menu_elem VALUES(NULL, 'Accueil');
INSERT INTO menu_elem VALUES(NULL, 'News');
INSERT INTO menu_elem VALUES(NULL, 'Calendrier');
INSERT INTO menu_elem VALUES(NULL, 'Matchs');
INSERT INTO menu_elem VALUES(NULL, 'Equipes');
INSERT INTO menu_elem VALUES(NULL, 'Tournois');

INSERT INTO type_utilisateur VALUES(NULL,'Administrateur','Grand maitre du site');
INSERT INTO type_utilisateur VALUES(NULL, 'Utilisateur', 'Utilisateur classique');

INSERT INTO utilisateur VALUES(NULL, 'Pantoufle', 'pantoufle@hotmail.fr', 'd324c7a8e87b8a2585bf12b61d0824a3', 1, 1);

INSERT INTO categorie VALUES(NULL,'Poussin','Equipe de moins de 8 ans');
INSERT INTO categorie VALUES(NULL,'Junior','Equipe de 8-16 ans');
INSERT INTO categorie VALUES(NULL,'Cadet','Equipe de 16-20 ans');
INSERT INTO categorie VALUES(NULL,'Senior','Equipe de plus de 20 ans');

INSERT INTO photo VALUES (1,'avatar_admin','../photos/defaut.png','');

INSERT INTO news VALUES(NULL, 'Nouveau site en ligne !', '2014-02-03 00:00:00', 'Que dites vous de ce nouveau super site ??', 1, 'admin');
INSERT INTO news VALUES(NULL, 'Nouveau test', '2014-02-04 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at mi consectetur, commodo arcu eu, luctus augue. Vivamus tincidunt neque ipsum, eget eleifend ipsum sagittis ut. Sed ullamcorper egestas erat nec elementum. Nulla accumsan rutrum molestie. Aliquam ut magna egestas, accumsan velit ut, gravida dolor. Sed feugiat lectus et dolor venenatis posuere. Aenean vehicula vel neque vel varius. Integer imperdiet laoreet dolor, eget semper felis tincidunt vitae. Praesent id fringilla lectus. Sed sed enim venenatis, scelerisque ligula a, facilisis mi. Donec venenatis eros ac ultrices tincidunt. Maecenas mollis magna est, vitae elementum urna sagittis nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 1, 'Pantoufle');

INSERT INTO evenement VALUES(1, 'Rencontre contre Paris','2014-20-03 13:00:00','Match contre Paris','Paris');
INSERT INTO evenement VALUES(NULL, 'Réunion', '2014-01-04 13:00:00', 'Ptite réunion bientot!', 'IUT Orléans');

INSERT INTO evenement_com VALUES(NULL,'Très belle rencontre !', '2014-02-04 13:00:00',1,1);
INSERT INTO news_com VALUES(NULL, 'Pas mal pas mal !', '2014-02-03 12:12:00', 1, 1);

INSERT INTO poste VALUES(1,'Goal','');
INSERT INTO poste VALUES(2,'Milieu','');
INSERT INTO poste VALUES(3,'Attaquant','');

INSERT INTO equipe VALUES(1,'Tigres',1,1,'');
INSERT INTO equipe VALUES(2,'Panthères',1,1,'');

INSERT INTO joueur VALUES(1,1,'Dupond',1,'René',1,'Très abile');
INSERT INTO joueur VALUES(2,1,'Durant',1,'Jean',2,'Cours vite');

INSERT INTO joueur VALUES(3,1,'Martin',1,'Martin',3,'Rapide');

INSERT INTO saison VALUES(1, 2014);

INSERT INTO `match` VALUES(1,1,1,2,3,2,'2014-20-03 13:00:00','Paris','Belle rencontre', 1);
INSERT INTO `match` VALUES(2,1,2,1,11,10,'2014-20-04 13:00:00','Paris','Super Belle rencontre', 1);
INSERT INTO `match` VALUES(3,1,2,1,11,10,'2014-20-04 13:00:00','Chartres','Match de championnat', 1);


INSERT INTO tournoi VALUES(1,'Tournoi des 6 terrains','','2014-01-02 00:00:00','2014-01-04 00:00:00',2);

INSERT INTO appartenir_tournoi VALUES(1, 1, 1);
INSERT INTO appartenir_tournoi VALUES(1, 2, 1);

INSERT INTO championnat VALUES(1, "CLRH", "Super championnat");

INSERT INTO appartenir_championnat VALUES(1, 3, 1);