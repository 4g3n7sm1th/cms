{if $position == $pos_menu}
<ul>
{foreach item=menu from=$menus}
<li><a href="{$menu.link}"{$menu.target}>{$menu.title}</a></li>
{/foreach}
</ul>
{/if}
