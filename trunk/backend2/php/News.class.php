<?php

/**
 ====================================================================
 Classe qui gere les News dans la base de donnees et les commentaires
 ====================================================================
 */

class News {

    private $_smarty; /* moteur de template */
    private $_bdd; /* la base de donnees */

    /**
    \brief construit l'objet
    \param bdd la base de donnees
     */
    public function __construct($bdd, $smarty) {
        $this->_bdd = $bdd;
        $this->_smarty = $smarty;
    }

    /**
     * \brief retourne la page relative aux news en fonction de l'action demandée ou non (ajout, suppression, ...)
     */
    public function get_content() {
        //on vérifie si on demande une action particulière (lire une news, ajouter un commentaire...)
        if(!isset($_GET['action'])) {
            return $this->get_all_news();
        } else {
            if($_GET['action'] == "read_news" && isset($_GET['id_news'])) {
                if(isset($_GET['add_news_com']) && $_GET['add_news_com'] = "true") {
                    if(!$this->add_com_news()) {
                        return Message::msg("Erreur lors de l'ajout du commentaire.", "news", $this->_smarty);
                    }
                }
                return $this->get_news($_GET['id_news']);
            } else if($_GET['action'] == "research_news" && isset($_POST['text'])) {
                return $this->get_news_like($_POST['text']);
            } else if($_GET['action'] == "add_news") {
                return $this->add_news();
            } else if($_GET['action'] == "delete_news") {
                if(isset($_GET['id_news'])) {
                    return $this->delete_news_by_id($_GET['id_news']);
                } else if(isset($_POST['id_news'])) {
                    return $this->delete_news();
                } else {
                    return Message::msg("Erreur, id de news inconnu.", "news", $this->_smarty);
                }
            } else {
                return Message::msg("Erreur dans les arguments.", "news", $this->_smarty);
            }
        }
    }


    /**
    \brief charge toute les news de la base et renvoie le code à afficher page news
    \param void
     */
    private function get_all_news() {
        $query = $this->_bdd->prepare("select * from NEWS ORDER BY Id desc");
        $query->execute();

        if($query->rowCount() != 0) {
            $data = array(); //va contenir les news
            $i = 0;
            while($d = $query->fetch()) {
                $photo = Photo::s_search_byId($this->_bdd, $d['IdPhoto']);
                $data[$i] = $d;
                $data[$i]['contenu'] = Message::resume_text(Message::bbcode($data[$i]['contenu']), 300);
                $data[$i]['img'] = $photo['Fichier'];
                $i++;
            }
        }
        $this->_smarty->assign("News", $data);

        return $this->_smarty->fetch("html/news.html");
    }


    /**
     * @brief récupère une news et renvoie le code à afficher
     * @param $id_news id de la news à afficher
     * @return mixed code à afficher
     */
    private function get_news($id_news) {
        $query = $this->_bdd->prepare("SELECT * FROM NEWS WHERE Id = :id");
        $query->execute(array(":id" => $id_news));

        if($query->rowCount() != 0) {
            //on récupère la news avec l'image associée
            $res_news = $query->fetch();
            $photo = Photo::s_search_byId($this->_bdd, $res_news['IdPhoto']);
            $news = $res_news;
            $news['contenu'] = Message::bbcode($news['contenu']);

            //on récupère les commentaires associés
            $coms = $this->get_data_coms($id_news);

            //on vérifie si l'utilisateur est connecté pour afficher ou non le formulaire d'ajout de commentaires
            $user_connected = "false";
            if(isset($_SESSION['user_connected']) && $_SESSION['user_connected']) {
                $user_connected = "true";
            }

            $this->_smarty->assign("News", $news);
            $this->_smarty->assign("Coms", $coms);
            $this->_smarty->assign("Photo", $photo['Fichier']);
            $this->_smarty->assign("User_connected", $user_connected);

            return $this->_smarty->fetch("html/news_simple.html");
        } else {
            return Message::msg("News inconnue !", "home", $this->_smarty);
        }
    }

    /**
     * @brief Va chercher les commentaires associés à une news
     * @param $id_news id de la news
     * @return array|bool tableau de coms
     */
    private function get_data_coms($id_news) {
        $query = $this->_bdd->prepare("select * from NEWS_COM where idNews = :id");
        $query->bindParam(":id", $id_news);
        $query->execute();
        if ($query->rowCount() > 0 ) {
            $data = array();
            $i = 0;
            $profil = new Profil($this->_bdd);
            while ( $rep = $query->fetch() ) {
                $data[$i] = $rep;
                $data[$i]['contenu'] = Message::bbcode($data[$i]['contenu']);
                $data[$i]['utilisateur'] = $profil->search_byId($rep['idUtilisateur'])['Pseudo'];
                $i++;
            }
            return $data;
        } else {
            return false;
        }
    }

    /**
     * @brief va chercher toutes les news et renvoie un tableau php avec le resultat
     * @return array
     */
    public function get_data_news() {
        $query = $this->_bdd->prepare("select * from NEWS ORDER BY Id desc");
        $query->execute();

        if($query->rowCount() != 0) {
            $data = array(); //va contenir les news
            $i = 0;
            while($d = $query->fetch()) {
                $photo = Photo::s_search_byId($this->_bdd, $d['IdPhoto']);
                $data[$i] = $d;
                $data[$i]['img'] = $photo['Fichier'];
                $i++;
            }
        }
        return $data;
    }

    private function add_news() {
        if(isset($_POST['title']) && isset($_POST['content'])) {
            $date     = date("Y-m-d H:i:s");
            $id_photo = 1;
            $content  = htmlentities($_POST['content']);
            $title    = htmlentities($_POST['title']);
            $autor    = $_SESSION['admin']['Pseudo'];

            $query_add_news = $this->_bdd->prepare("INSERT INTO news VALUES(NULL, :title, :date, :content, :id_photo, :autor)");
            if($query_add_news->execute(array(":title" => $title, ":date" => $date, ":content" => $content, ":id_photo" => $id_photo, ":autor" => $autor))) {
                //enregistrement de l'image
                return Message::msg("News ajoutée avec succès !", "news", $this->_smarty);
            } else {
                echo "INSERT INTO news VALUES(NULL, ".$title.", ".$date.", ".$content.", ".$id_photo.", ".$autor.")";
                //return Message::msg("Erreur lors de l'ajout de la news.", "news", $this->_smarty);
            }
        } else {
            return $this->_smarty->fetch("html/add_news.html");
        }
    }

    /**
     * @brief ajouter le commentaire envoyé en post dans la bdd
     * @return bool
     */
    private function add_com_news() {
        if(isset($_POST['message']) && isset($_POST['id_news'])) {
            $date = date("Y-m-d H:i:s");
            $text = htmlentities($_POST['message']);

            $user = $_SESSION['user']['Id'];
            $query = $this->_bdd->prepare("insert into NEWS_COM values(null, :text, :date, :idnews, :iduser)");
            $query->bindParam(":text", $text);
            $query->bindParam(":date", $date);
            $query->bindParam(":idnews", $_POST['id_news']);
            $query->bindParam(":iduser", $user);
            $query->execute();
            return $query->rowCount() == 1;
        } else {
            return false;
        }
    }

    /**
    \brief charge toute le news qui commencent par $val
    \param val représente les premiers caractères du titre de la news
     */
    private function get_news_like($val) {
        $val = $val."%";
        $query = $this->_bdd->prepare("select * from NEWS where titre like :val ORDER BY Id desc");
        $query->execute(array(":val" => $val));

        $news = array();
        if($query->rowCount() != 0) {
            $i = 0;
            while($d = $query->fetch()) {
                $photo = Photo::s_search_byId($this->_bdd, $d['IdPhoto']);
                $news[$i] = $d;
                $news[$i]['img'] = $photo['Fichier'];
                $i++;
            }
        }

        $this->_smarty->assign("News", $news);
        return $this->_smarty->fetch("html/news.html");
    }

    /**
     * @brief supprime une ou plusieurs news suivant la sélection
     */
    private function delete_news() {
        $nb_errors = 0;
        foreach($_POST['id_news'] as $id_news) {
            $query_delete = $this->_bdd->prepare("DELETE FROM news WHERE Id = :id_news");
            if(!$query_delete->execute(array(":id_news" => $id_news))) {
                $nb_errors++;
            }
        }
        if($nb_errors > 0) {
            return Message::msg("Il s'est produit ".$nb_errors." erreurs.", "news", $this->_smarty);
        } else {
            return Message::msg(count($_POST['id_news'])." news supprimée(s).", "news", $this->_smarty);
        }
    }

    /**
     * @brief supprime la news
     * @param id_news l'id de la news à supprimer
     */
    private function delete_news_by_id($id_news) {
        $query_delete = $this->_bdd->prepare("DELETE FROM news WHERE Id = :id_news");
        if(!$query_delete->execute(array(":id_news" => $id_news))) {
            return Message::msg("Erreur lors de la suppression de la news.", "news", $this->_smarty);
        } else {
            return Message::msg("News supprimée avec succès !", "news", $this->_smarty);
        }
    }
}


?>
