<?php
$tpl_plugin_news_start = '<div id="meldung">';

$tpl_plugin_news = '
          <h3><a href="?p='.$_GET['p'].'&news_id='.$news->plugin_news_id.'">'.utf8_encode($news->plugin_news_title).'</a></h3>
          <h6>geschrieben von <a href="#">'.$author.'</a> '.$created.' - Kategorie: <a href="#">Il Divo</a></h6>
          <!--<img src="images/test.png" class="newsimage">-->
          '.utf8_encode($news_content_new).'
          <br />';
          
$tpl_plugin_news_readmore = '<span class="readmore"><a href="?p='.$_GET['p'].'&news_id='.$news->plugin_news_id.'">weiter lesen...</a></span>';
        
$tpl_plugin_news_end = '</div>';

$tpl_plugin_news_commentcount = '<br /><span class="commentcount">'.$commentcount.' Kommentar'.(($commentcount == 1)?"":"e").' vorhanden.</span>';

$tpl_plugin_news_overview_link = '<br /><a href="?p='.$_GET['p'].'">&laquo; zurück zur News-Übersicht</a>';

?>