<?php

class Home {

    private $_bdd;
    private $_smarty;

    public function __construct($bdd, $smarty) {
        $this->_bdd    = $bdd;
        $this->_smarty = $smarty;
    }

    public function get_content() {
        $this->get_news();
        $this->get_events();
        return $this->_smarty->fetch(TEMPLATE."/html/home.html");
    }

    private function get_news() {
        $news = new News($this->_bdd, $this->_smarty);
        $data_news = $news->get_data_news();

        $res_news = array();
        $i = $j = 0;
        while(isset($data_news[$i])) {
            $res_news[$j++] = $data_news[$i++];
        }

        $this->_smarty->assign("News", $res_news);
    }

    private function get_events() {
        $events = new Calendar($this->_bdd, $this->_smarty);
        $data_events = $events->get_data_events();

        $res_events = array();
        $i = $j = 0;
        while(isset($data_events[$i])) {
            $res_events[$j++] = $data_events[$i++];
        }

        $this->_smarty->assign("Events", $res_events);
    }

}

?>