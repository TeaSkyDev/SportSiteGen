<?php

require_once("News.php");
require_once("Calendrier.php");

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
            $news = $news_obj->get_content();
            $this->_smarty->assign("News", $news);
            return $this->_smarty->fetch("templates/".$this->_template."/news.html");
        } else if($page == "calendrier") {
            $events_obj = new Calendrier($this->_bdd);
            $events = $events_obj->get_content();
            $this->_smarty->assign("Events", $events);
            return $this->_smarty->fetch("templates/".$this->_template."/calendrier.html");
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