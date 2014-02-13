<?php

require_once("News.php");
require_once("Calendrier.php");
require_once("Equipe.php");
require_once("Profil.php");
require_once("Connexion.php");
require_once("Inscription.php");

class Content {

    private $_bdd;
    private $_template;
    private $_smarty;

    public function __construct($bdd, $template, $smarty) {
        $this->_bdd      = $bdd;
        $this->_template = $template;
        $this->_smarty   = $smarty;
    }

    public function get_html($page) {
        if($page == "news") {
            
            $news_obj = new News($this->_bdd);
            $news     = $news_obj->get_content();
            $this->_smarty->assign("News", $news);

            return $this->_smarty->fetch("templates/".$this->_template."/news.html");

        } else if($page == "calendrier") {

            $events_obj = new Calendrier($this->_bdd);
            $events     = $events_obj->get_content();
            $this->_smarty->assign("Events", $events);

            return $this->_smarty->fetch("templates/".$this->_template."/calendrier.html");

        } else if($page == "equipes") {

            $teams_obj = new Equipe($this->_bdd);
            $teams     = $teams_obj->get_content();
            $this->_smarty->assign("Teams", $teams);

            return $this->_smarty->fetch("templates/".$this->_template."/equipes.html");

        } else if($page == "profil" && isset($_SESSION)) {
            if(isset($_SESSION['connected'])) {
                $profil_obj = new Profil($this->_bdd);
                $profil     = $profil_obj->search_byId($_SESSION['user']['Id']);
                $this->_smarty->assign("Profil", $profil);

                return $this->_smarty->fetch("templates/".$this->_template."/profil.html");
            } else {
                return "C'est pas bien de bidouiller l'url !!<br>";
            }
        } else if($page == "connexion") {
            if(isset($_GET['action']) && $_GET['action'] == "verif") {
                if(Connexion::connect($this->_bdd)) {
                    header("Location: index.php");
                } else {
                    $this->_smarty->assign("Err", "Erreur lors de la connexion !");
                    return $this->_smarty->fetch("templates/".$this->_template."/err.html");
                }
            } else {
                return $this->_smarty->fetch("templates/".$this->_template."/connexion.html");
            }
        } else if($page == "inscription") {
            if(isset($_GET['action']) && $_GET['action'] == "insert") {
                if(Inscription::insert($this->_bdd)) {
                    header("Location: index.php?page=connexion");
                } else {
                    $this->_smarty->assign("Err", "Erreur lors de l'inscription !");
                    return $this->_smarty->fetch("templates/".$this->_template."/err.html");
                }
            } else {
                return $this->_smarty->fetch("templates/".$this->_template."/inscription.html");
            }
        } else {
            $news_obj = new News($this->_bdd);
            $news = $news_obj->get_content();
            $events_obj = new Calendrier($this->_bdd);
            $events = $events_obj->get_content();

            $this->_smarty->assign("News", $news);
            $this->_smarty->assign("Events", $events);

            return $this->_smarty->fetch("templates/".$this->_template."/accueil.html");
        }
    }
}

?>