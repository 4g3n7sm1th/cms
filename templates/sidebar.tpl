{include file="message.tpl" position_actual=2}
Herzlich Wilkommen, 
{if $loggedin == true}{$username}.{else}Gast{/if}<br />
{menue id=2}
{if $loggedin == true}<ul><li><a href="?action=logout&p={$smarty.get.p}">Logout</a></li></ul><br />{else}
{include file="login.tpl"}
{/if}
<br />
