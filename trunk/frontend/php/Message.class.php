<?php

/**
 * Fonction statique permettant d'envoyer un message (en réalité une popup)
 */

class Message {
    public static function msg($message, $redirection, $smarty) {
        $smarty->assign("Message", $message);
        $smarty->assign("Redirection", $redirection);
        return $smarty->fetch(TEMPLATE."/html/message.html");
    }

    public static function bbcode($text) {
        $text = preg_replace('!\[quote\](.+)\[/quote\]!isU', '<div class="citationforum">$1</div>', $text);

        $text = preg_replace('!\[b\](.+)\[/b\]!isU', '<strong>$1</strong>', $text);
        $text = preg_replace('!\[i\](.+)\[/i\]!isU', '<em>$1</em>', $text);
        $text = preg_replace('!\[u\](.+)\[/u\]!isU', '<span style="text-decoration:underline;">$1</span>', $text);
        $text = preg_replace('!\[center\](.+)\[/center\]!isU', '<p tyle="text-align:center;margin:0px;padding:0px;">$1</p>', $text);
        $text = preg_replace('!\[right\](.+)\[/right\]!isU', '<p style="text-align:right;margin:0px;padding:0px;">$1</p>', $text);
        $text = preg_replace('!\[left\](.+)\[/left\]!isU', '<p style="text-align:left;margin:0px;padding:0px;">$1</p>', $text);

        $text = preg_replace('!\[titre\](.+)\[/titre\]!isU', '<h3>$1</h3>',$text);

        $text = preg_replace('!\[email\](.+)\[/email\]!isU', '<a href="mailto:$1">$1</a>',$text);

        $text = preg_replace('!\[img\](.+)\[/img\]!isU', '<img src="$1" border="0">',$text);

        $text = preg_replace('!\[url\](.+)\[/url\]!isU', '<a href="$1" target="_blank">$1</a>',$text);

        return($text);
    }

    public static function resume_text($txt, $limit) {
        $length = strlen($txt);
        $res    = $txt;
        if(is_numeric($limit)) {
            if($length > $limit) {
                /* On coupe à limit, on évite de couper un mot avec strpos */
                $res = substr($res, 0, strpos($res, ' ', $limit));
                $res .= "...";
            }
        }
        return $res;
    }
}

?>