<?php

/**
 * Class Log, Permet de gérer facilement un fichier de log
 */

class Log {

    private $_log;       //Contient le message de log à écrire
    private $_err;       //Contient le message d'erreur à garder (ajouté par l'utilisateur de la classe)
    private $_info;      //Contient le message d'information à garder (ajouté par l'utilisateur de la classe)
    private $_show_err;  //Indique si les messages d'erreurs doivent être affichés
    private $_show_info; //Indique si les messages d'info doivent être affichés
    private $_path_log;  //Contient le chemin ainsi que le nom du fichier de log

    /**
     * @brief Lance si besoin les session, initialise les variables, vérifie si le fichier de log n'existe pas déjà ($_SESSION['log_started'])
     * @param $p_path Représente l'emplacement et le nom du fichier de log
     */
    public function __construct($p_path) {

        if(session_id() == "") {
            session_start();
            $this->add_info_log("Activation des sessions");
        }

        $this->_path_log = $p_path;
        $this->_log  = "";
        $this->_err  = "";
        $this->_info = "";
        $this->_show_err  = false;
        $this->_show_info = false;

        if(isset($_SESSION['log_started'])) {
            if(!$_SESSION['log_started']) {
                $this->add_info_log("Initialisation fichier de log");
                $this->write_log();
                $_SESSION['log_started'] = true;
            }
        } else {
            $this->add_info_log("Initialisation fichier de log");
            $this->write_log();
            $_SESSION['log_started'] = true;
        }

    }

    /**
     * Désactive l'utilisation du fichier de log
     */
    public function close() {
        $_SESSION['log_started'] = false;
        unset($_SESSION['log_started']);
    }

    /**
     * Supprime le fichier de log
     */
    public function delete_file() {
        @unlink($this->_path_log);
    }

    /**
     * @brief Ajout le message d'erreur aux variables concernées (err et log)
     * @param $err Représente le message d'erreur
     */
    public function add_err_log($err) {
        $this->_err .= "[!] ".$err."<br>";
        $this->_log .= "[!] ".date("[j/m/y H:i:s]")." - ".$err."\r\n";

        if($this->_show_err) {
            $this->show_err();
        }
    }

    /**
     * @brief Ecrit le message d'erreur aux variables concernées (err et log)
     * @param $err Représente le message d'erreur
     */
    public function write_err_log($err) {
        $this->_err .= "[!] ".$err."<br>";
        $this->_log .= "[!] ".date("[j/m/y H:i:s]")." - ".$err."\r\n";

        $this->write_log();
    }

    /**
     * @brief Ajout le message d'info aux variables concernées (info et log)
     * @param $err Représente le message d'info
     */
    public function add_info_log($info) {
        $this->_info .= $info."<br>";
        $this->_log .= date("[j/m/y H:i:s]")." - ".$info."\r\n";

        if($this->_show_info) {
            $this->show_info();
        }
    }

    /**
     * @brief Ecrit le message d'info aux variables concernées (info et log)
     * @param $err Représente le message d'info
     */
    public function write_info_log($info) {
        $this->_info .= $info."<br>";
        $this->_log .= date("[j/m/y H:i:s]")." - ".$info."\r\n";

        $this->write_log();
    }

    /**
     * @brief Permet d'activer l'affichage des erreurs
     * @param $val (activer = true, désactiver = false)
     */
    public function set_show_err($val) {
        $this->_show_err = $val;
    }

    /**
     * @brief Permet d'activer l'affichage des infos
     * @param $val (activer = true, désactiver = false)
     */
    public function set_show_info($val) {
        $this->_show_info = $val;
    }

    /**
     * @brief Renvoie les erreurs survenues
     * @return string
     */
    public function get_err() {
        return $this->_err;
    }

    /**
     * @brief Renvoie les infos survenues
     * @return string
     */
    public function get_infos() {
        return $this->_info;
    }

    /**
     * @brief Affiche les erreurs survenues
     */
    public function show_err() {
        echo $this->_err;
        $this->clean_err();
    }

    /**
     * @brief Affiche les infos survenues
     */
    public function show_info() {
        echo $this->_info;
        $this->clean_info();
    }

    /**
     * Supprime les info
     */
    public function clean_info() {
        $this->_info = "";
    }

    /**
     * Supprime les erreurs
     */
    public function clean_err() {
        $this->_err = "";
    }

    /**
     * Supprime toutes les donnees enregistrées
     */
    public function clean_all() {
        $this->_info = "";
        $this->_err  = "";
        $this->_log  = "";
    }

    /**
     * @brief Ecrit dans le fichier de log
     */
    public function write_log() {
        file_put_contents($this->_path_log, $this->_log, FILE_APPEND);
        $this->_log = "";
    }
}

?>