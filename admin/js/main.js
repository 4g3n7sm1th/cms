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
							  
			$(".miniprofile[title]").qtip({ 
								position: {
											my: 'bottom center',
											at: 'top center'
								}, 
								
								style: {
      										classes: 'ui-tooltip-tipped ui-tooltip-shadow '
   								}
							  });
							  
			$("[title]").filter(':not(.error)').qtip({ 
								position: {
											my: 'left center',
											at: 'right center'
								}, 
								
								style: {
      										classes: 'ui-tooltip-tipped ui-tooltip-shadow '
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
		$("[title]").filter(':not(.error)').qtip({ 
								position: {
											my: 'left center',
											at: 'right center'
								}, 
								
								style: {
      										classes: 'ui-tooltip-tipped ui-tooltip-shadow '
   								}
							  });
		}