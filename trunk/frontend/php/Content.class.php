<?php

require_once("News.php");
require_once("Calendrier.php");
require_once("Equipe.php");
require_once("Profil.php");
require_once("Connexion.php");
require_once("Inscription.php");
require_once("Match.php");
require_once("Tournoi.php");


/*
 ==============================================
 Classe qui gere le parsing de toute les pages
 ==============================================
*/


class Content {

    private $_bdd; /* base de donnees rattache */
    private $_template; /* le nom du dossier de template courant */
    private $_smarty; /* systeme de parsing */

    /*
     \brief construit l'objet
     \param bdd la base de donne 
     \param template le nom du template a parse
     \param smarty le systeme de parsing 
     */
    public function __construct($bdd, $template, $smarty) {
        $this->_bdd      = $bdd;
        $this->_template = $template;
        $this->_smarty   = $smarty;
    }

    /*
     \brief genere le code html en fonction des pages demande
     \param page la page demande
     \param param les parametre optionnel de chargement
     \return page parser avec smarty
     */
    public function get_html($page, $param = null) {
        if($page == "news") {

            $news_obj = new News($this->_bdd, $param);
            $news     = $news_obj->get_content();
            $com      = $news_obj->get_content_com();
            $simple = array();
            $simple['one'] = isset($param['v1']);
            if( $simple['one'] ) {
                $simple['connected'] = isset($_SESSION['connected']);
                $simple['Id'] = $news[0]['Id'];
            }
            $this->_smarty->assign("News", $news);
            $this->_smarty->assign("Com", $com);
            $this->_smarty->assign("NSimple", $simple);
            return $this->_smarty->fetch("templates/".$this->_template."/html/news.html");

        } else if($page == "calendrier") {
            $events_obj = new Calendrier($this->_bdd, $param);
            $events     = $events_obj->get_content();
            $com        = $events_obj->get_content_com();
            $simple = array();
            $simple['one'] = isset($param['v1']);
            if ( $simple['one'] ) {
                if( $simple['one'] ) {
                    $simple['connected'] = isset($_SESSION['connected']);
                    $simple['Id'] = $events[0]['Id'];
                }
            }
            $this->_smarty->assign("Events", $events);
            $this->_smarty->assign("Com", $com);
            $this->_smarty->assign("NSimple", $simple);

            return $this->_smarty->fetch("templates/".$this->_template."/html/calendrier.html");

        } else if($page == "equipes") {

            $teams_obj = new Equipe($this->_bdd);
            $teams     = $teams_obj->get_content();
            $this->_smarty->assign("Teams", $teams);

            return $this->_smarty->fetch("templates/".$this->_template."/html/equipes.html");

        } else if ($page == "match") {
            $match_obj = new Match($this->_bdd);
            $equ_obj = new Equipe($this->_bdd);
            $match = $match_obj->get_content();
            $data = array();
            $i = 0;
            while(isset($match[$i])) {
                $data[$i]['name1'] = $equ_obj->search_byId($match[$i]['IdTeam1'])['Nom'];
                $data[$i]['name2'] = $equ_obj->search_byId($match[$i]['IdTeam2'])['Nom'];
                $data[$i]['point1'] = $match[$i]['nbPoint1'];
                $data[$i]['point2'] = $match[$i]['nbPoint2'];
                $data[$i]['date'] = $match[$i]['DateMATCHS'];
                $data[$i]['comm'] = $match[$i]['Commentaires'];
                $i++;
            }
            $this->_smarty->assign("Match", $data);

            return $this->_smarty->fetch("templates/".$this->_template."/html/match.html");

        } else if ( $page == "tournoi" ) {
            $tournoi_obj = new Tournoi($this->_bdd, $param);
            $equ_obj = new Equipe($this->_bdd);
            $tournoi = $tournoi_obj->get_content();
            $match      = $tournoi_obj->get_content_match();
            $data = array();
            $i = 0;
            while ( isset($match[$i]) ) {
                $data[$i]['name1'] = $equ_obj->search_byId($match[$i]['IdTeam1'])['Nom'];
                $data[$i]['name2'] = $equ_obj->search_byId($match[$i]['IdTeam2'])['Nom'];
                $data[$i]['point1'] = $match[$i]['nbPoint1'];
                $data[$i]['point2'] = $match[$i]['nbPoint2'];
                $data[$i]['date'] = $match[$i]['DateMATCHS'];
                $data[$i]['comm'] = $match[$i]['Commentaires'];
                $i++;
            }
            $simple['one'] = isset($param['v1']);
            $tree_tab = array();
            if ( $simple['one'] ) {
                $tree_tab = $tournoi_obj->get_treeTab_byId($param['v2']);
            }
            echo "<script>";
            echo "var tab ="; echo json_encode($tree_tab); echo ";";
            echo "</script>";
            $this->_smarty->assign("NSimple", $simple);
            $this->_smarty->assign("Match", $data);
            $this->_smarty->assign("Tournoi", $tournoi);
            return $this->_smarty->fetch("templates/".$this->_template."/html/tournoi.html");

        } else if($page == "profil" && isset($_SESSION)) {
            if(isset($_SESSION['connected'])) {
                if(!isset($param)) {
                    $profil_obj = new Profil($this->_bdd);
                    $profil     = $profil_obj->search_byId($_SESSION['user']['Id']);
                    $this->_smarty->assign("Profil", $profil);

                    return $this->_smarty->fetch("templates/".$this->_template."/html/profil.html");
                } else if(isset($param['v1'])) {
                    $err = false;
                    switch($param['v1']) {
                        case "modif_pseudo":
                            if(isset($param['v2']) && $param['v2'] == "true" && isset($param['pseudo'])) {
                                if(Profil::s_set_profilById($this->_bdd, "pseudo", $param['pseudo'], $_SESSION['user']['Id'])) {
                                    header("Location: index.php?page=profil");
                                } else {
                                    $err = true;
                                }
                            } else {
                                $Modif = "pseudo";
                            }
                            break;
                        case "modif_password":
                            if(isset($param['v2']) && $param['v2'] == "true" && isset($param['password'])) {
                                if(Profil::s_set_profilById($this->_bdd, "password", $param['password'], $_SESSION['user']['Id'])) {
                                    header("Location: index.php?page=profil");
                                } else {
                                    $err = true;
                                }
                            } else {
                                $Modif = "password";
                            }
                            break;
                        case "modif_mail":
                            if(isset($param['v2']) && $param['v2'] == "true" && isset($param['mail'])) {
                                if(Profil::s_set_profilById($this->_bdd, "mail", $param['mail'], $_SESSION['user']['Id'])) {
                                    header("Location: index.php?page=profil");
                                } else {
                                    $err = true;
                                }
                            } else {
                                $Modif = "mail";
                            }
                            break;
                        case "modif_photo":
                            $Modif = "photo";
                            break;
                        default:
                            $Modif = "pseudo";
                    }

                    if($err) {
                        $this->_smarty->assign("Err", "Erreur lors de la modification de votre profil !");
                        return $this->_smarty->fetch("templates/".$this->_template."/html/err.html");
                    } else {
                        $this->_smarty->assign("Modif", $Modif);
                        return $this->_smarty->fetch("templates/".$this->_template."/html/profil_modif.html");
                    }
                }
            } else {
                return "C'est pas bien de bidouiller l'url !!<br>";
            }
        } else if($page == "connexion") {
            if(isset($_GET['action']) && $_GET['action'] == "verif") {
                if(Connexion::connect($this->_bdd)) {
                    header("Location: index.php");
                } else {
                    $this->_smarty->assign("Err", "Erreur lors de la connexion !");
                    return $this->_smarty->fetch("templates/".$this->_template."/html/err.html");
                }
            } else {
                return $this->_smarty->fetch("templates/".$this->_template."/html/connexion.html");
            }
        } else if($page == "inscription") {
            if(isset($_GET['action']) && $_GET['action'] == "insert") {
                if(Inscription::insert($this->_bdd)) {
                    header("Location: index.php");
                } else {
                    $this->_smarty->assign("Err", "Erreur lors de l'inscription !");
                    return $this->_smarty->fetch("templates/".$this->_template."/html/err.html");
                }
            } else {
                return $this->_smarty->fetch("templates/".$this->_template."/html/inscription.html");
            }
        } else {
            $news_obj = new News($this->_bdd);
            $news = $news_obj->get_content();
            $events_obj = new Calendrier($this->_bdd);
            $events = $events_obj->get_content();

            $this->_smarty->assign("News", $news);
            $this->_smarty->assign("Events", $events);

            return $this->_smarty->fetch("templates/".$this->_template."/html/accueil.html");
        }
    }
}

?>