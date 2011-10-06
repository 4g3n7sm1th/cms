<div id="mantel">
<div id="header">
{$app_title}
</div>
<div id="menu">
{adminmenue id=1}
</div>
<div id="content">
<div id="sidebar">
{include file="sidebar.tpl"}
</div>
<h1>{$pagetitle}</h1>
{include file="message.tpl" position_actual=1}
<!-- Message-Containers for JS -->
<div id="js-message-error" class="message-error" style="display:none"></div>
<div id="js-message-success" class="message-success" style="display:none"></div>
<div id="js-message" class="message" style="display:none"></div>