<?php

function plugin_installed($identifier)
{
  $plugin = $db->get_results('SELECT plugin_id FRPM plugins WHERE plugin_identify = "'.$identifier.'";');
  
  if(!$plugin)
  { return false; }
  else
  { return true; }
}

class pluginClass
{
  var $db;
  var $plugin_id;
  var $plugin_identifier;
  var $plugin_data;
  
  function pluginClass($plugin_identifier)
  {
    global $db;
    $this->db = &$db;
    
    $this->plugin_data = $db->get_results("SELECT * FROM plugins WHERE plugin_identifier = '".$plugin_identifier."';");
  }
}
?>