$(document).ready(function() {

});

function changePluginStatus (status,plugin_id) {
	$.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=changePluginStatus&plugin_id='+encodeURIComponent(plugin_id)+'&status='+encodeURIComponent(status),
    success: function(result) {
      
      if(result=='1') 
      {
      	location.href='index.php?action=plugins';
      	return true;
      }
      
    }
  });
}