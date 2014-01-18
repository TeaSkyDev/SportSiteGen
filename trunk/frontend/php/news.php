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

	/* Ajout d'un commentaire */
} else if(isset($_GET['new_com']) && isset($_SESSION['connected']) && $_SESSION['connected']) {

	if(isset($_POST['message'])) {
		$date = date("Y-m-d H:i:s");
		$query = add_NEWS_COM($bdd, $_POST['message'], $date, $_POST['id_news'], $_SESSION['user']['Id']);
		if($query) {
			header("Location: index.php?page=news&id_news=".$_POST['id_news']."&details=true");
		} else {
			header("Location: index.php?page=erreur&msg=Erreur lors de l'ajout de la news !");
		}
	} else {
		header("Location: index.php?page=erreur&msg=Message vide !");
	}

} else {
	$page = 1;

	if(isset($_GET['page_news'])){
	  $page = $_GET['page_news'];
	}

	$nb_page = $bdd->query("select count(*) from NEWS")->fetch()['count(*)']/5;
	$reponse = $bdd->query("select * from NEWS order by id DESC");

	$news = array();
	$i = 0;

	for(; $i < 5*($page-1) ; $i++){
	  $reponse->fetch();
	}
	 
	$i = 0;
	while($data = $reponse->fetch()){
        if($i < 5) {
            $news[$i] = $data;
            $news[$i]['img'] = get_PHOTO_byId($bdd, $data['IdPhoto'])['Fichier'];
        }
        $i++;
	}

    $pages = array();
    for($i = 1; $i < $nb_page+1; $i++) {
        $pages[$i] = $i;
    }

	$smarty->assign("News", $news);
    $smarty->assign("Pages", $pages);
	$smarty->display("html/news.html");
}
?>