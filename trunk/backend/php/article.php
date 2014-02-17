<?php

include("News.php");
$news = new News($bdd);

$data = $news->get_content();

for($i = 0 ; $i < $news->get_size() ; $i++) {
    $data[$i]['contenu'] = resume_text($data[$i]['contenu'],100);
}

$smarty->assign("Article", $data);
$smarty->display("html/article.html");

?>