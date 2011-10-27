<?php

$tpl_plugin_news = '<div id="meldung">
          <h3><a href="#">'.$news->plugin_news_title.'</a></h3>
          <h6>geschrieben von <a href="#">'.$author.'</a> '.$created.' - Kategorie: <a href="#">Il Divo</a></h6>
          <!--<img src="images/test.png" class="newsimage">-->
          '.$news->plugin_news_content.'
          <br />
          <span class="readmore"><a href="#">weiter lesen...</a></span>
        </div>';


?>