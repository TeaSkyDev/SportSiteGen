<?php

/* Si on demande le détail d'une news, on affiche son détail sinon toutes les news */
if(isset($_GET['details']) && isset($_GET['id_news'])) {
	$query = $bdd->query("select * from NEWS where id = ".$_GET['id_news']);

	$news = array();
	$news = $query->fetch();
	$news['img'] = get_PHOTO_byId($bdd, $news['id'])['Fichier'];

	if(isset($_SESSION['connected']) && $_SESSION['connected']) {
		$news['connected'] = 'true';
	} else {
		$news['connected'] = 'false';
	}

	/* On récupère les commentaires.. */
	$query = $bdd->query("select * from NEWS_COM");
	$coms = array();

	$i = 0;
	while($data = $query->fetch()) {
		$coms[$i] = $data;
		$coms[$i]['auteur'] = get_UTILISATEUR_byId($bdd, $data['idUtilisateur'])['Pseudo'];
		$i++;
	}

	$smarty->assign("News", $news);
	$smarty->assign("Coms", $coms);
	$smarty->display("html/news_simple.html");
} else {
	$page = 0;

	if(isset($_GET['page_news'])){
	  $page = $_GET['page_news'];
	}

	$nb_page = $bdd->query("select count(*) from NEWS")->fetch()['count(*)']/10;
	$reponse = $bdd->query("select * from NEWS order by id DESC");

	$news = array();
	$i = 0;

	for(; $i < 10*($page-1) ; $i++){
	  $data = $reponse->fetch();
	}
	 
	$i = 0;

	while($data = $reponse->fetch()){
	  $news[$i]['id'] = $data['id'];
	  $news[$i]['titre'] = $data['titre'];
	  $news[$i]['date'] = $data['date'];
	  $news[$i]['contenu'] = $data['contenu'];
	  $news[$i]['img'] = get_PHOTO_byId($bdd, $data['IdPhoto'])['Fichier']; 
	  $i++;
	}

	$smarty->assign("News", $news);
	$smarty->display("html/news.html");
}
?>