<body>

  <div id="container">
    <header>
      <div id="socialbuttons">
        <a href="http://www.youtube.com/user/GermanIldivofanclub" target="_blank">
          <img class="feedtitle" title="Der Fanclub bei Youtube" src="admin/ico/social_big/youtube.png"></a>
        <br />
        <a href="http://www.twitter.com/ildivofanclub" target="_blank">
          <img class="feedtitle" title="Der Fanclub bei Twitter" src="admin/ico/social_big/twitter.png"></a>
        <br />
        <a href="http://www.facebook.com/pages/1-Deutscher-Il-DIvo-Fanclub/213869231395" target="_blank">
          <img class="feedtitle" title="Der Fanclub bei Facebook" src="admin/ico/social_big/facebook.png"></a>
      </div>
    </header>
      
    <div id="main" role="main" class="clearfix">
      <div id="topmenu">
        {menue id=1}
      </div>
      <div id="navigation">
        &nbsp;
        <!--{menue id=2}-->
        <ul>
          <li class="menu-a" id="link_Home"><a href="?p=1">Home</a></li>
          <li class="menu-b" id="link_Forum"><a href="./../forum" target="_blank">Forum</a></li>
          <li class="menu-a" id="link_Admin"><a href="admin" target="_blank">Admin</a></li>
        </ul>
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