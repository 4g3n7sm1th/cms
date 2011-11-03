<body>

  <div id="container">
    <header>
    </header>
      
    <div id="main" role="main" class="clearfix">
      <div id="topmenu">
        {menue id=1}
      </div>
      <div id="navigation">
        <a href="http://www.twitter.com/ildivofanclub" target="_blank"><img src="{$img_dir}/twitter.png"></a>&nbsp;
        <a href="http://www.facebook.com/pages/1-Deutscher-Il-DIvo-Fanclub/213869231395" target="_blank"><img src="{$img_dir}/facebook.png"></a>
        {menue id=2}
        <div id="page_menu">
        {menue page=true nocache}
        </div>
        {menue id=3}
        <!--<ul>
          <a href="#"><li class="menu-a">Team</li></a>
          <a href="#"><li class="menu-b">Disclaimer</li></a>
          <a href="#"><li class="menu-a">Impressum</li></a>
          <a href="#"><li class="menu-b">Datenschutz</li></a>
        </ul>-->
        {include file="message.tpl" position_actual=2}
      </div>