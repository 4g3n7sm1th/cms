$(document).ready(function() {
    $("#users tbody.content").sortable({ 
      opacity: 0.6, 
      cursor: 'move',
      items: 'tr',
      placeholder: '.placeholder',
      update: function() {
        var order = $(this).sortable("serialize")+'&req=updateMenuItemOrder&menu_id='+$('#menu_id').val();
			  $.post("ajax.php", order, function(response) {
            message(response);
          });
			}, 
			handle: '.handle',
			forcePlaceholderSize: true
		});
    $("#users tbody.content").disableSelection();
    
    $(function() {
		var words = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

    $('.tags_pages').tagBox();

        

        // I've hacked the jQuery UI autocomplete render function
        // to highlight part of the matched string
        $.ui.autocomplete.prototype._renderItem = function( ul, item) {
            var re = new RegExp("^" + this.term, "i") ;
            var t = item.label.replace(re,"<strong>" + this.term + "</strong>");
            return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append( "<a>" + t + "</a>" )
                .appendTo( ul );
        };

        // Some sample WORDS for autocomplete to use
                                
         $.ajax({
                  type: "POST",
                  url: 'ajax.php',
                  async:true,
                  data: 'req=searchPages',
                  dataType: 'json',
                  success: function(result) { 
                  
                  // The autocomplete for the last tagbox
        $(".tagbox .input input").autocomplete({
            source: function(req, responseFn) {
                var re = $.ui.autocomplete.escapeRegex(req.term);
                var matcher = new RegExp( "^" + re, "i" );
                var a = $.grep( result.page_title, function(item,index){
                    return matcher.test(item);
                });
                responseFn( a );
            },
            minLength: 0,
            select: function(e, ui) {
                e.preventDefault();
                if(e.keyCode != 13) {
                    $(this).val(ui.item.value);
                    $(this).trigger("selectTag");
                }
            }
        });
                  
                  },
              });
		
		/*$(".tagbox .input input")
			// don't navigate away from the field on tab when selecting an item
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
						$( this ).data( "autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				minLength: 0,
				source: availableTags,
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});*/
		
			
	});
    
});

function addMenuItem(i)
{
  
  var new_html = "<tr id='id_"+i+"'>"+
			"<td style='width:50px'>"+
			  "<img src='ico/color/arrow_updown.png' class='handle' style='cursor:move' title='Sortierung &auml;ndern'>"+
				"&nbsp;<img src='"+icon('delete')+"' title='L&ouml;schen erst nach neuladen möglich'>"+
			"</td>"+
			"<td>"+i+"</td>"+
			"<td id='menu_name"+i+"'>"+
			  "<span id='extend_option_"+i+"' style='height:20px;float:left'>"+
			    ""+
			  "</span>"+
			  "&nbsp;<img src='"+icon('check')+"' id='success_ico_"+i+"' style='float:left;display:none'>"+
			  "<div id='extended_option_"+i+"' style='height:175px;float:left;display:none'>"+
			    "<table id='extended_option' style='width:350px'>"+
			    "<tr>"+
			      "<td>Link-Name:</td><td><input type='text' style='width:200px' class='tip' title='Link-Name' value='' id='link_name_"+i+"'></td>"+
			    "</tr>"+
			    "<tr>"+
			      "<td>Link-Typ:</td>"+
			      "<td>  "+
			        "<select style='width:200px' id='change_type_"+i+"' name='change_type_"+i+"' onchange='changeMenuType("+i+")'>"+
			          "<option value='0'>Link-Typ w&auml;hlen...</option>"+
			          "<option value='page'>Seiten-Verlinkung</option>"+
			          "<option value='extern'>Externer Link</option>"+
			        "</select>"+
			      "</td>"+
			    "</tr>"+
			    "<tr id='page_link_"+i+"' style='display:none'>"+
			        "<td>Seiten-ID:</td><td><input style='width:200px' type='text' id='page_id_"+i+"' class='tip' title='Page-ID' value=''></td>"+
			    "</tr>"+
			    "<tr id='extern_link_"+i+"' style='display:none'>"+
			        "<td>Link-URL:</td><td><input style='width:200px' type='text' class='tip' title='Link-URL' id='extern_link_loc_"+i+"' value=''></td>"+
			    "</tr>"+
			    "<tr id='dummy_link_"+i+"'>"+
			      "<td colspan='3'>&nbsp;</td>"+
			    "</tr>"+
			    "<tr>"+
			      "<td>Sichtbar:</td>"+
			      "<td>"+
			        "<select name='isvisible' id='isvisible_"+i+"'>"+
			          "<option value='0'>Versteckt</option>"+
			          "<option value='1' selected>Sichtbar</option>"+
			        "</select>"+
			      "</td>"+
			    "</tr>"+
			    "<tr>"+
			      "<td>Link-Ziel:</td>"+
			      "<td>"+
			        "<select name='link_target' id='link_target_"+i+"' title='&Ouml;ffnen in neuem Fenster?'>"+
			          "<option value='0'>gleiches Fenster</option>"+
			          "<option value='1'>neues Fenster</option>"+
			        "</select>"+
			      "</td>"+
			    "</tr>"+
			  "</table>"+
			  "</div>"+
			  "<img src='"+icon('edit')+"' title='Link bearbeiten' id='maximize"+i+"' style='float:right;margin-top:3px;' onclick='extendMenuOptions("+i+")'>"+
			  "<img src='"+icon('save')+"' title='Link speichern' id='save"+i+"' style='float:right;margin-top:3px;display:none' onclick='saveMenuOptions("+i+", 1)'>"+
			  "<img src='"+icon('minus')+"' title='Editor einklappen' id='minimize"+i+"' style='float:right;margin-right:3px;margin-top:3px;display:none' onclick='hideMenuOptions("+i+")'>"+
			"</td>"+
			"<td>"+
			  "<img src='"+icon('info')+"' title='<b>Erstellt:</b> <br />noch nicht gespeichert '>"+
			"</td>"+
		"</tr>";
		
		var html_old = $('table#users').html();
		$(new_html).appendTo('table#users tbody.content');
		extendMenuOptions(i);
		$('#newlink').hide();
		$('#newlink_disabled').show();
		
		
    loadTitle();
}

function saveMenuOptions(i, new_menu)
{
  if(!new_menu) new_menu = 0;
  hideMenuOptions(i);
  var link_name = $('#link_name_'+i).val();
  var change_type = $('#change_type_'+i).val();
  var isvisible = $('#isvisible_'+i).val();
  var link_target = $('#link_target_'+i).val();
  var menu_id = $('#menu_id').val();
  
  if($('#extern_link_loc_'+i).val() == $('#extern_link_loc_'+i).attr('title') || $('#change_type_'+i).val() == 'page')
  { var extern_link = '0'; } else
  { var extern_link = $('#extern_link_loc_'+i).val(); }
  
  if($('#page_id_'+i).val() == $('#page_id_'+i).attr('title') || $('#change_type_'+i).val() == 'extern')
  { var page_id = '0'; } else
  { var page_id = $('#page_id_'+i).val(); }
  
  $.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=saveMenuOptions'+
            '&link_name='+encodeURIComponent(link_name)+
            '&change_type='+encodeURIComponent(change_type)+
            '&page_id='+encodeURIComponent(page_id)+
            '&extern_link='+encodeURIComponent(extern_link)+
            '&isvisible='+encodeURIComponent(isvisible)+
            '&item_id='+encodeURIComponent(i)+
            '&new_menu='+encodeURIComponent(new_menu)+
            '&menu_id='+encodeURIComponent(menu_id)+
            '&link_target='+encodeURIComponent(link_target),
    success: function(result) {
      
      if(result!='0') 
      {
      	$('#menu_name'+i).delay('400').animate({backgroundColor:'lightgreen'}, 'fast');
      	$('#success_ico_'+i).delay('400').fadeIn();
				$('#menu_name'+i+' span').delay('400').html(result);
				$('#success_ico_'+i).delay('1000').fadeOut('2000');
				$('#menu_name'+i).animate({backgroundColor:'#F7F8FF'}, '2000');
				loadTitle();
      }
      else
      {
      	$('#menu_name'+i+' span').fadeOut('fast');
				$('#menu_name'+i+' span').html('<span class="ui-tooltip-red">Menü-Link konnte nicht gespeichert werden</span>');
				$('#menu_name'+i+' span').fadeIn('fast');
				loadTitle();
      }
      return true;
      $('#newlink').show();
		  $('#newlink_disabled').hide();
    }
  });

  
  /*alert(
        'link_name: '+link_name+'\n'+
        'change_type: '+change_type+'\n'+
        'page_id: '+page_id+'\n'+
        'extern_link: '+extern_link+'\n'+
        'isvisible: '+isvisible+'\n'+
        'link_target: '+link_target+'\n'
        );*/
}

function deleteMenuItem(item_id) {

conf = confirm('Wollen Sie den Link wirklich löschen?');

if(conf) {
	$.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=deleteMenuItem&menu_item_id='+encodeURIComponent(item_id),
    success: function(result) {

      if(result=='1') 
      {
      	msg = "Link wurde erfolgreich gelöscht - Bitte laden Sie die Seite neu";
      	type= 'success';
      	$('#id_'+item_id).slideUp('slow');
      }
      else
      {
      	msg = "Link konnte nicht gelöscht werden";
      	type= 'error';
      }
      message(msg, type);
      return true;
    }
  });
  }
}

function deleteMenu(menu_id) {

conf = confirm('Wollen Sie das Menü wirklich löschen?');

if(conf) {
	$.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=deleteMenu&menu_id='+encodeURIComponent(menu_id),
    success: function(result) {

      if(result=='1') 
      {
      	msg = "Menü wurde erfolgreich gelöscht - Bitte laden Sie die Seite neu";
      	type= 'success';
      }
      else
      {
      	msg = "Menü konnte nicht gelöscht werden";
      	type= 'error';
      }
      message(msg, type);
      return true;
    }
  });
  }
}

function changeMenuType(i)
{
  var change_type = $('#change_type_'+i).val();
  
  if(change_type == 'page')
  { 
  $('#page_link_'+i).show();
  $('#extern_link_'+i).hide(); 
  $('#dummy_link_'+i).hide();
  }
  
  if(change_type == 'extern')
  { 
  $('#page_link_'+i).hide();
  $('#extern_link_'+i).show();
  $('#dummy_link_'+i).hide(); 
  }
  
  if(change_type == '0')
  { 
  $('#page_link_'+i).hide();
  $('#extern_link_'+i).hide(); 
  $('#dummy_link_'+i).show();
  }
}

function extendMenuOptions(i)
{
  $('#extend_option_'+i).hide();
  $('#extended_option_'+i).slideDown();
  $('#maximize'+i).hide();
  $('#minimize'+i).show();
  $('#save'+i).show();
  changeMenuType(i);
}

function hideMenuOptions(i)
{
  $('#extended_option_'+i).slideUp();
  $('#extend_option_'+i).delay('400').show();
  $('#maximize'+i).show();
  $('#minimize'+i).hide();
  $('#save'+i).hide();
}

function editMenuName(menu_id) 
{
	$('#menu_name'+menu_id+' span').fadeOut('fast');
	$('#menu_name'+menu_id+' span').html('Neuer Name: <input type="text" style="width:80px;" id="newMenuName'+menu_id+'"> <img class="ico" title="Speichern" src="'+icon('save')+'" onclick="saveMenuName('+menu_id+')">');
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
				$('#menu_name'+menu_id+' span').html("<img src='"+icon('write')+"' title='Namen &auml;ndern' onclick='editMenuName("+menu_id+")'>"+new_name).val();
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