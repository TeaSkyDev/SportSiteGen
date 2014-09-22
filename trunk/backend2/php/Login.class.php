<?php
/* class Login
 * créé par Guillaume Gas
 * le 18/06/2010
 *
 *
 * info :
 * utilisation de la session : $_SESSION["admin"][" ici le nom du champ : ex : pseudo "]
 * 
 *
 * IMPORTANT : cette classe Login a été modifiée spécialement pour la partie BACKEND (variable de session "admin_connected" et non "user_connected")
 *
 */


class Login {
    private $bdd; //stocke un objet PDO
    private $table;
	
	private $fichier_action; //nécessaire pour l'attribu action du tag form
	
	private $liste_champs_value; //tableau contenant les champs (un pour contenant les values, 
	private $liste_champs_name;  //un pour les noms
	private $liste_champs_type;  //et un pour les types de champs (text, password...)
    private $liste_champs_cryptes;
	
	private $connec_ok; //boolean pour savoir si la connexion a été faite
    private $log;
    private $utiliser_log;

	public function __construct($p_fichier_action, $p_table, $p_bdd = null, $p_log = false, $p_path_log = "login.log") {
        $this->log = new Log($p_path_log);
        $this->utiliser_log = $p_log;

		$this->bdd = $p_bdd;
        $this->table = $p_table;
		
		$this->fichier_action = $p_fichier_action;
	
		$this->liste_champs_value = array();
		$this->liste_champs_name = array();
		$this->liste_champs_type = array();
		
		$this->connec_ok = false;

        if(session_id() == "") {
            session_start();
            $this->log->add_info_log("Activation des sessions");
        }

        if(isset($_SESSION['admin_connected'])) {
            if($_SESSION['admin_connected']) {
                $this->connec_ok = true;
            }
        }

        $this->log->write_log();
	}

    public function __destruct() {
        if($this->utiliser_log == false) {
            $this->log->close();
            $this->log->delete_file();
        }
    }

    /**
     * @brief Permet d'activer ou non l'utilisation du fichier de log (false par défaut)
     * @param $val (true pour activier sinon false)
     */
    public function set_log($val) {
        $this->utiliser_log = $val;
        $this->log->write_info_log("Activation du fichier de log");
    }

    public function show_log_messages($val) {
        $this->log->set_show_err($val);
        $this->log->set_show_info($val);
    }

	public function logout() {
		unset($_SESSION['admin']);
        unset($_SESSION['admin_connected']);
        $this->log->write_info_log("Deconnexion de l'utilisateur. (".$_SERVER['REMOTE_ADDR'].")");
	}

    public function connect_db($p_host, $p_login, $p_mdp, $p_base) {
        try {
            $this->bdd = new PDO('mysql:host='.$p_host.';dbname='.$p_base, $p_login, $p_mdp);
            $this->log->add_info_log("Connexion à la base de donnees effectuee.");
        } catch(PDOException $e) {
            $this->log->add_err_log("Erreur lors de la connexion à la base de données.");
        }

        $this->log->write_log();
    }

	//fonction permettant de rajouter des champs (param : value, le nom du champs et son type (text, password...)
	public function addChamp($p_value, $p_name, $p_type, $p_md5 = false) {
		$this->liste_champs_value[] = $p_value;
		$this->liste_champs_name[]  = $p_name;
		$this->liste_champs_type[]  = $p_type;
        if($p_md5) {
            $this->liste_champs_cryptes[] = $p_name;
        }
	}

	public function login() {
        if(!$this->connec_ok && $this->bdd != null) {
            //on vérifi ici si des données ont été envoyées
            $this->champs_ok = true; //on suppose que les champs ont été remplis
            $liste_valeurs = array();
            for($i = 0; $i < count($this->liste_champs_name); $i++) { //on prend chaque nom de champs
                if(!isset($_POST[$this->liste_champs_name[$i]])) {    //et on vérifi si des données ont été envoyés
                    $this->champs_ok = false;
                } else {
                    if(in_array($this->liste_champs_name[$i], $this->liste_champs_cryptes)) {
                        $liste_valeurs[':'.$i] = md5($_POST[$this->liste_champs_name[$i]]);
                    } else {
                        $liste_valeurs[':'.$i] = $_POST[$this->liste_champs_name[$i]];
                    }
                }
            }

            //si les données ont été envoyées
            if($this->champs_ok) {
                //on génére la requéte
                $debut_requete = "SELECT * FROM ".$this->table." WHERE ";

                //dans cette partie de la requéte, on doit ajouter chaque nom de champs, ceux ci étant stocké dans un tableau (liste_champs_name)
                $fin_requete = "";
                for($i = 0; $i < count($this->liste_champs_name); $i++) {
                    if($i == 0) { //si c'est le premier paramétre, pas besoin de le faire précéder d'un AND
                        $fin_requete = $this->liste_champs_name[$i]." = :".$i;
                    } else { //sinon on le sépar des précédent par un AND
                        $fin_requete .= " AND ".$this->liste_champs_name[$i]." = :".$i;
                    }
                }

                //concaténation de chaque partie de la requéte, utilisation de prepare pour plus de sécurité
                $requete = $this->bdd->prepare($debut_requete.$fin_requete);

                if($requete->execute($liste_valeurs)) {
                    if($requete->rowCount() > 0) {
                        $_SESSION['admin'] = $requete->fetch(); //on stock tout dans une variable de session
                        $_SESSION['admin_connected'] = true;
                        $this->connec_ok = true; //on indique que la connexion est établie

                        $this->log->write_info_log("Connexion de l'utilisateur effectuee. (".$_SERVER['REMOTE_ADDR'] .")");

                        return true;
                    } else {
                        $this->log->add_err_log("Erreur lors de la connexion ! (".$_SERVER['REMOTE_ADDR'] .")");
                    }
                } else {
                    $this->log->add_err_log("Erreur dans la requete ! (".$_SERVER['REMOTE_ADDR'] .")");
                }
            }
            $this->log->write_log();
            return false;
        } else if($this->bdd == null) {
            $this->log->add_err_log("Erreur, base de données non connectée.");
            $this->log->write_log();
            return false;
        } else {
            $this->log->write_log();
            return true;
        }
        $this->log->write_log();
	}

    public function donnees_envoyees() {
        $champs_ok = true; //on suppose que les champs ont été remplis
        for($i = 0; $i < count($this->liste_champs_name); $i++) { //on prend chaque nom de champs
            if(!isset($_POST[$this->liste_champs_name[$i]])) {    //et on vérifi si des données ont été envoyés
                $champs_ok = false;
            }
        }
        return $champs_ok;
    }

    public function generer_formulaire() {
        $this->log->add_info_log("Génération du formulaire de connexion.");
        //affichage du formulaire
        echo '<form action="'.$this->fichier_action.'", method="POST">';
        echo '<table>';
        for($i = 0; $i < count($this->liste_champs_name); $i++) {
            echo ('<tr><td>'.$this->liste_champs_value[$i].' : <input type="'.$this->liste_champs_type[$i].'" name="'.$this->liste_champs_name[$i].'" id="'.$this->liste_champs_name[$i].'"></td></tr>');
        }
        echo '<tr><td><center><input type="submit" value="ok"></center></td></tr>';
        echo '</form>';
        echo '</form>';

        $this->log->write_log();
    }

	//fonction permettant de vérifier si la connexion a été établie
	public function connexion_ok() {
		if($this->connec_ok) {
			return true;
		} else {
			return false;
		}
	}
	
}
?>
