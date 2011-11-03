$(document).ready(function() {
    
    var selected = '<div class="menu-a" id="selected"></div>';
    var split = $('title').html().split(' - ');
    
    $('#navigation #link_'+split[1]+' a').after(selected);
    $('#navigation #link_'+split[1]+' #selected').attr('class', $('#link_'+split[1]).attr('class'));
    
    getFeeds();
    
    var refreshId = setInterval(function() {
      loadFeeds();
      var t=setTimeout(function() { getFeeds(); }, 3000);
   }, 20000);
    
    $('input.tip').formtips({
        tippedClass: 'formtip'
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

function loadFeeds()
{
  $.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=loadTwitterFeed',
    success: function(result) {
      
      if(result=='error') 
      {
      	msg = "Twitter-Feed konnte nicht geladen werden";
      	message(msg, 'error');
      }
      
      return true;
    }
  });
  
  $.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=loadFacebookFeed',
    success: function(result) {
      
      if(result=='error') 
      {
      	msg = "Facebook-Feed konnte nicht geladen werden";
      	message(msg, 'error');
      }
      
      return true;
    }
  });
}

function getFeeds()
{
  $.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=getFeeds',
    success: function(result) {
      
      $('#allfeeds').hide();
      $('#allfeeds').html(result);
      $('#allfeeds').fadeIn('300');
      }
  });
}