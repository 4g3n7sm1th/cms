	$().ready(function() {
	
	
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : 'js/tiny_mce/tiny_mce.js',

			// General options
			theme : "advanced",
			plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

			// Theme options
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,|,pagebreak,|,link,unlink,image,code,",
			theme_advanced_buttons2 : "bullist,numlist,|,blockquote,|,forecolor,backcolor,|,tablecontrols,|,hr,removeformat,|,sub,sup,|,media",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,

			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",

			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",

		});
	});

		$(document).ready(function() {
			$('input.tip').formtips({
        tippedClass: 'formtip'
    });				  
							  
			$(".miniprofile[title]").qtip({ 
								position: {
											my: 'bottom center',
											at: 'top center'
								}, 
								
								style: {
      										classes: 'ui-tooltip-dark ui-tooltip-shadow '
   								}
							  });
							  
			$("[title]").filter(':not(input)').qtip({ 
								position: {
											my: 'left center',
											at: 'right center'
								}, 
								
								style: {
      										classes: 'ui-tooltip-dark ui-tooltip-shadow '
   								}
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
		
		});
		
		function loadTitle()
		{
		$("[title]").qtip({ 
								position: {
											my: 'left center',
											at: 'right center'
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
  if(!delay) { delay = '2500'; }
  if(!type) 
  { msgclass = ' class="message-message"'; }
  else if(type == 'error') 
  { msgclass = ' class="message-error"'; }
  else if(type == 'success') 
  { msgclass = ' class="message-success"'; }
  else if(type == 'message') 
  { msgclass = ' class="message-message"'; }

  $('#message_div').html('<span'+msgclass+'">'+msg+'</span>');
  $('#message_div').show();
  $('#message_div').delay(delay).slideUp();
}