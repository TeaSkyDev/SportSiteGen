<?php

  /*
   ========================================
   Classe qui gere les differents menus
   ========================================
   */


class Header {

    private $_bdd; /* base de donnees rattache */
    private $_smarty; /* objet smarty (moteur de template) */
    private $_log; /* Fichier de log */

    /** 
     \brief simple constructeur
     \param bdd la base de donnees
     \param template représente le template utilisé
    */
    public function __construct($bdd, $smarty) {
	    $this->_bdd      = $bdd;
        $this->_smarty   = $smarty;
    }
    
    /**
     \brief renvoi les elements du menu
     \param void 
     \return tableau d'element de menu
     */
    public function get_content() {

        $data_menu = array(); //va contenir les éléments du menu
        $data_connect = array(); //va contenir les éléments du second menu (connexion..)
        $list_css_files = array();

        //cherche tout les Menu Elem
        $query = $this->_bdd->prepare("select * from MENU_ELEM");
        $query->execute();

        if($query->rowCount() > 0) {
            $i = 0;
            while ($data = $query->fetch()) {
                $data_menu[$i]['title'] = $data['Nom'];
                $data_menu[$i]['url']   = $data['url'];
                $i++;
            }
        }

        //suivant l'état de connection de l'utilisateur, on créé le menu de connexion/deco
        if(isset($_SESSION['user_connected']) && $_SESSION['user_connected'] == true) {
            $data_connect[0]['title'] = $_SESSION['user']['Pseudo'];
            $data_connect[0]['url']   = "index.php?page=profil";
            $data_connect[1]['title'] = "Deconnexion";
            $data_connect[1]['url']   = "index.php?page=deconnexion";
        } else {
            $data_connect[0]['title'] = "Connexion";
            $data_connect[0]['url']   = "index.php?page=connexion";
            $data_connect[1]['title'] = "Inscription";
            $data_connect[1]['url']   = "index.php?page=inscription";
        }

        //en fonction du template utilisé, on récupère la liste des fichiers css à utiliser
        $path_template = TEMPLATE."/css/";

        $dir_css = @opendir($path_template);
        if(!$dir_css) {
            $this->_log->add_err_log("Erreur lors de l'ouverture du dossier css.");
            $this->_log->write_log();
        } else {
            while($css_file = readdir($dir_css)) {
                if($css_file != "." && $css_file != "..") {
                    $list_css_files[] = $path_template.$css_file;
                }
            }
        }

        $this->_smarty->assign("Name", SITE_NAME);
        $this->_smarty->assign("Menu", $data_menu);
        $this->_smarty->assign("Menu_connect", $data_connect);
        $this->_smarty->assign("CssFiles", $list_css_files);

        return $this->_smarty->fetch(TEMPLATE."/html/header.html");
    }

}

?>