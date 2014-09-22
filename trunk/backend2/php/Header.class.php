<?php

/**
 * Classe Header, récupère les données relatives au header du backend
 */

class Header {

    private $_bdd;
    private $_smarty;
    private $_page;

    public function __construct($bdd, $smarty, $page) {
        $this->_bdd    = $bdd;
        $this->_smarty = $smarty;
        $this->_page   = $page;
    }

    public function get_content() {

        //nom du site
        $query_site_name = $this->_bdd->query("SELECT Nom FROM site");
        $name = $query_site_name->fetch()['Nom'];

        //on génère les liens du menu
        $menu[0]['title']    = "Accueil";
        $menu[0]['url']      = "index.php?page=home";
        $menu[0]['selected'] = $this->_page == "home";

        $menu[1]['title']    = "News";
        $menu[1]['url']      = "index.php?page=news";
        $menu[1]['selected'] = $this->_page == "news";

        $menu[2]['title']    = "Calendrier";
        $menu[2]['url']      = "index.php?page=calendar";
        $menu[2]['selected'] = $this->_page == "calendar";

        $menu[3]['title']    = "Joueurs";
        $menu[3]['url']      = "index.php?page=players";
        $menu[3]['selected'] = $this->_page == "players";

        $menu[4]['title']    = "Equipes";
        $menu[4]['url']      = "index.php?page=teams";
        $menu[4]['selected'] = $this->_page == "teams";

        $menu[5]['title']    = "Matchs";
        $menu[5]['url']      = "index.php?page=matchs";
        $menu[5]['selected'] = $this->_page == "matchs";

        $menu[6]['title']    = "Tournois";
        $menu[6]['url']      = "index.php?page=tournaments";
        $menu[6]['selected'] = $this->_page == "tournaments";

        $menu[7]['title']    = "Championnats";
        $menu[7]['url']      = "index.php?page=championships";
        $menu[7]['selected'] = $this->_page == "championships";

        $menu[8]['title']    = "Utilisateurs";
        $menu[8]['url']      = "index.php?page=users";
        $menu[8]['selected'] = $this->_page == "users";

        $menu[9]['title']    = "Options";
        $menu[9]['url']      = "index.php?page=settings";
        $menu[9]['selected'] = $this->_page == "settings";

        $this->_smarty->assign("Admin_name", $_SESSION['admin']['Pseudo']);
        $this->_smarty->assign("Name", $name);
        $this->_smarty->assign("Menu", $menu);

        return $this->_smarty->fetch("html/header.html");
    }

}

?>