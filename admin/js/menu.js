function editMenuName(menu_id) 
{
	$('#menu_name'+menu_id+' span').fadeOut('fast');
	$('#menu_name'+menu_id+' span').html('Neuer Name: <input type="text" style="width:80px;" id="newMenuName'+menu_id+'"> <img class="ico" title="Speichern" src="ico/ico_download.png" onclick="saveMenuName('+menu_id+')">');
	$('#menu_name'+menu_id+' span').fadeIn('fast');
	loadTitle();
}

function saveMenuName(menu_id)
{
	var new_name = $('#newMenuName'+menu_id).val();

	$.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=saveMenuName&menu_name='+encodeURIComponent(new_name)+'&menu_id='+encodeURIComponent(menu_id),
    success: function(result) {
      
      if(result=='1') 
      {
      	$('#menu_name'+menu_id+' span').fadeOut('fast');
				$('#menu_name'+menu_id+' span').html("<img src='ico/color/reply.png' title='Namen &auml;ndern' onclick='editMenuName("+menu_id+")'>"+new_name).val();
				$('#menu_name'+menu_id+' span').fadeIn('fast');
				loadTitle();
      }
      else
      {
      	$('#menu_name'+menu_id+' span').fadeOut('fast');
				$('#menu_name'+menu_id+' span').html('<span class="ui-tooltip-red">Menü-Name konnte nicht gespeichert werden</span>').val();
				$('#menu_name'+menu_id+' span').fadeIn('fast');
				loadTitle();
      }
      return true;
    }
  });
  
}