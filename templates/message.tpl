{if $position_actual == $position_message}
<br />
<div style="margin:auto">
  {if $mode == 'error'}<div class="message-error">{$message}</div>{/if}
  {if $mode == 'success'}<div class="message-success">{$message}</div>{/if}
  {if $mode == 'message'}<div class="message">{$message}</div>{/if}
</div>
{/if}