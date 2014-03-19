insert into MENU_ELEM values(null, 'Accueil', 'index.php?page=accueil');
insert into MENU_ELEM values(null, 'News', 'index.php?page=news');
insert into MENU_ELEM values(null, 'Calendrier', 'index.php?page=calendrier');
insert into MENU_ELEM values(null, 'Matchs', 'index.php?page=match');
insert into MENU_ELEM values(null, 'Equipes', 'index.php?page=equipes');
insert into MENU_ELEM values(null, 'Tournois', 'index.php?page=tournois');

insert into UTILISATEUR values(null, 'Pantoufle', 'pantoufle@hotmail.fr', 'd324c7a8e87b8a2585bf12b61d0824a3', 1, 1);
insert into TYPE_USER values (1,'Administrateur','Grand maitre du site')
insert into TYPE_USER values(2, 'Utilisateur', 'Utilisateur classique');

insert into PHOTO values (1,'avatar_admin','defaut.png','');

insert into NEWS values(null, 'Nouveau site en ligne !', '2014-02-03 00:00:00', 'Que dites vous de ce nouveau super site ??', 1, 'admin');
insert into NEWS values(null, 'Nouveau test de pantoufle..', '2014-02-04 00:00:00', 'Test avec beaucoup beaucoup beaucoup beaucoupbeaucoup beaucoupbeaucoup beaucoupbeaucoup beaucoupbeaucoup beaucoupbeaucoup beaucoupbeaucoup beaucoup beaucoup beaucoup de texte.', 1, 'Pantoufle');

insert into NEWS_COM values(null, 'Pas mal pas mal !', '2014-02-03 12:12:00', 1, 1);

insert into EVENEMENT values(null, 'Réunion semaine pro', '2014-02-03 12:12:00', 'Ptite réunion la semaine pro !', 'IUT Orléans');