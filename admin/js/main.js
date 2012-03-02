$(document).ready(function() {
	
    $('textarea#texteditor').markItUp(mySettings)
		
		$('input.tip').formtips({
      tippedClass: 'formtip'
    });	
			
			
			var textvalue = $('#titletext').val();
				$('#titletext').focus(function() {
					if($('#titletext').val() == "Geben Sie hier den Titel an") {
						$('#titletext').val('');
						$('#titletext').css('color', 'black');
						}
				});
			
			
				$('#titletext').blur(function() {
					if($('#titletext').val().length < 1) {
						$('#titletext').val('Geben Sie hier den Titel an');
						$('#titletext').css('color', 'lightgray');
					}
				});
		
		    loadGallerys();
		    loadTitle();
		
}); // Page-Load end
		
function getLineSeparator() {
  var html = "<textarea id='linesep' style='display:none'></textarea>"; 
  $('html').append(html);
  $('#linesep').val('\n');
  seperator = $('#linesep').val();
  $('#linesep').remove();
  return seperator;
}		

function timestamp()
{
  return Math.round(new Date().getTime() / 1000);
}

function loadGallerys()
{

  /*$('.gallery-thumbnails').yoxview({
		      lang: 'de',
		      titleAttribute: 'alt',
		      renderInfo: false,
		      renderButtons:true,
		      buttonsFadeTime: 20
		    });*/
	
	$(".gallery .gallerylink").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	500, 
		'speedOut'		:	400, 
		'overlayShow'	:	true
	});
		    
	$('.gallery').each(function() {
		      var id = $(this).attr('ref');
		      $(this).hover(function() {
		        $('.gallery-edit-'+id).fadeToggle('100');
		      });
	});

}		


function loadTitle()
{
  $("[title]").qtip({ 
								position: {
											my: 'left center',
											at: 'right center',
											viewport: $(window)
								}, 
								
								
								style: {
      										classes: 'ui-tooltip-dark ui-tooltip-shadow '
   								}
  });
							  
  $(".miniprofile").each(function() { 
			$(this).qtip({ 
			  content: {
          text: '<img src="./ico/loader_gray.gif">', // Make sure we declare some basic loading content
          ajax: {
              url: 'ajax.php', // Grab user data from serverside PHP script...
              type: 'POST',
              once: false,
              data: { 
                userid: $(this).attr('rel'),  // ...providing a 'userid' which is stored in the avatars REL attribute
                req: 'miniprofile'
              } 
          }
        },
				position: {
							my: 'left center',
							at: 'right center',
							viewport: $(window)
				}, 
				
				style: {
								classes: 'ui-tooltip-dark ui-tooltip-shadow '
					}
			  });
  });
			
  $(".gallery").qtip({ 
				
				position: {
							my: 'bottom center',
							at: 'top center',
							viewport: $(window)
				}, 
				
				style: {
								classes: 'ui-tooltip-dark ui-tooltip-shadow '
					}
  });
			
  $("[title]").filter(':not(input)').not('.gallery').qtip({ 
  				
				position: {
							my: 'left center',
							at: 'right center',
							viewport: $(window)
				}, 
				
				style: {
								classes: 'ui-tooltip-dark ui-tooltip-shadow '
					}
  });
}
		
function dump(arr,level) {
	var dumped_text = "";
	if(!level) level = 0;
	
	//The padding given at the beginning of the line.
	var level_padding = "";
	for(var j=0;j<level+1;j++) level_padding += "    ";
	
	if(typeof(arr) == 'object') { //Array/Hashes/Objects 
		for(var item in arr) {
			var value = arr[item];
			
			if(typeof(value) == 'object') { //If it is an array,
				dumped_text += level_padding + "'" + item + "' ...\n";
				dumped_text += dump(value,level+1);
			} else {
				dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
			}
		}
	} else { //Stings/Chars/Numbers etc.
		dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
	}
	return dumped_text;
}

function message(msg, type, delay) {
  if(!delay) { delay = '5000'; }
  if(!type) { msgclass = ''; }
  else if(type == 'error') 
  { msgclass = ' class="message-error"'; }
  else if(type == 'success') 
  { msgclass = ' class="message-success"'; }
  else if(type == 'message') 
  { msgclass = ' class="message-message"'; }
  else { msgclass = ''; }

  $('#message_div').html('<span'+msgclass+'">'+msg+'</span>');
  $('#message_div').show();
  $('#message_div').delay(delay).slideUp();
}

function l(str)
{
  $.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=lng&str='+encodeURIComponent(str),
    success: function(result) {

      if(result=='0') 
      {
      	msg = "Sprachvariable '"+str+"' konnte nicht geladen werden.";
      	type= 'error';
      	message(msg, type);
      }
      else
      {
      	return result;
      }
    }
  });
}

function updateData(type, field, data, id, reload)
{
  
  if(!reload) reload = 'true';
  
	  $.ajax({
      type: "POST",
      url: 'ajax.php',
      async:true,
      data: 'req=updateData&type='+encodeURIComponent(type)+'&field='+encodeURIComponent(field)+'&id='+encodeURIComponent(id)+'&data='+encodeURIComponent(data),
      success: function(result) {
        if(result=='1') 
        {
      	  msg = "Erfolgreich geändert";
      	  type= 'success';
        }
        else
        {
      	  msg = "Ändern fehlgeschlagen";
      	  type= 'error';
        }
        message(msg, type);
        
        if(reload == 'true') setTimeout(function(){window.location.reload();}, 2000);
        
        return true;
      }
    });
}

function deleteData(type, id, reload)
{
  
  if(!reload) reload = 'true';
  
  conf = confirm('Wollen Sie den Datensatz wirklich löschen?');

  if(conf) {
	  $.ajax({
      type: "POST",
      url: 'ajax.php',
      async:true,
      data: 'req=deleteData&type='+encodeURIComponent(type)+'&id='+encodeURIComponent(id),
      success: function(result) {
        if(result=='1') 
        {
      	  msg = "Erfolgreich gelöscht";
      	  type= 'success';
        }
        else
        {
      	  msg = "Löschen fehlgeschlagen";
      	  type= 'error';
        }
        message(msg, type);
        
        if(reload == 'true') setTimeout(function(){window.location.reload();}, 2000);
        
        return true;
      }
    });
  }
  else
  {
    return false;
  }

}

function icon(icon, ext, icon_folder)
{
	if(!ext) ext='png';
	if(!icon_folder) icon_folder='ico/new';
	
	switch(icon)
	{
		case 'edit':
			icon_file = 'Wrench';
		break;
		case 'info':
			icon_file = 'Light-Off';
		break;
		case 'save':
			icon_file = 'Computer-Hard-Drive';
		break;
		case 'minus':
			icon_file = 'minus';
		break;
		case 'plus':
			icon_file = 'plus';
		break;
		case 'login':
			icon_file = 'Lock';
		break;
		case 'delete':
			icon_file = 'Remove';
		break;
		case 'comment':
			icon_file = 'Chat';
		break;
		case 'preview':
			icon_file = 'Desktop';
		break;
		case 'check':
			icon_file = 'Checkmark';
		break;
		case 'write':
			icon_file = 'Pencil';
		break;
		case 'settings':
			icon_file = 'Gear';
		break;
		case 'move':
			icon_file = 'Arrow-Move';
		break;
		case 'upload':
			icon_file = 'Upload';
		break;
		default:
			icon_file = icon;
		break;
	}
	
	return icon_folder+'/'+icon_file+'.'+ext;
}