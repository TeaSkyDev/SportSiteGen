<?php

require_once("News.php");

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
        }

        return "none";
    }
}

?>