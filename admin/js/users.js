function deleteUser (user_id) {

conf = confirm('Wollen Sie den Benutzer wirklich löschen?');

if(conf) {
	$.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=deleteUser&user_id='+encodeURIComponent(user_id),
    success: function(result) {
      
      if(result=='1') 
      {
      	msg = "Benutzer wurde erfolgreich gelöscht";
      }
      else
      {
      	msg = "Benutzer konnte nicht gelöscht werden";
      }
      $('#js-message-success').html(msg);
      $('#js-message-success').show();
      return true;
    }
  });
  }
}

$(document).ready(function()
{
	var error = "bums";
	
   $('#newuser').validate({
         errorClass: "errormessage",
         onkeyup: true,
         errorClass: 'error',
         validClass: 'valid',
         rules: {
            user_name: { required: true, minlength: 3 },
            user_mail: { required: true, email: true },
            user_password: { required: true, minlength: 6 },
            user_password_wh: { required: true },
            user_level: { required: true }
            
         },
         messages: {
         		user_name: {
         								required: "Bitte geben Sie einen Benutzernamen an",
         								minlength: "Der Benutzername muss mindestens {0} Zeichen lang sein"
         							 },
         		user_password: {
         								required: "Bitte geben Sie ein Passwort an",
         								minlength: "Das Passwort muss mindestens {0} Zeichen lang sein"
         							 },
         		user_mail: {
         								email: "Bitte geben Sie korrekte E-Mail-Adresse ein",
         								required: "Bitte geben Sie eine E-Mail-Adresse ein"
         							 },
         		user_password_wh: 
         							 {
         								equalTo: "Bitte wiederholen Sie das Passwort"
         							 },
         		user_level: { required: "Bitte wählen sie einen Benutzerlevel aus" }
         },
         errorPlacement: function(error, element)
         {
            // Set positioning based on the elements position in the form
            var elem = $(element),
               corners = ['right center', 'left center'],
               flipIt = elem.parents('span.right').length > 0;
 
            // Check we have a valid error message
            if(!error.is(':empty')) {
               // Apply the tooltip only if it isn't valid
               elem.filter(':not(.valid)').qtip({
                  overwrite: false,
                  content: error,
                  position: {
                     my: corners[ flipIt ? 0 : 1 ],
                     at: corners[ flipIt ? 1 : 0 ],
                     viewport: $(window)
                  },
                  show: {
                     event: false,
                     ready: true
                  },
                  hide: false,
                  style: {
                     classes: 'ui-tooltip-red' // Make it red... the classic error colour!
                  }
               })
 
               // If we have a tooltip on this element already, just update its content
               .qtip('option', 'content.text', error);
            }
 
            // If the error is empty, remove the qTip
            else { elem.qtip('destroy'); }
         },
         success: $.noop, // Odd workaround for errorPlacement not firing!
   })
   
   $('#edituser').validate({
         errorClass: "errormessage",
         onkeyup: true,
         errorClass: 'error',
         validClass: 'valid',
         rules: {
            user_name: { required: true, minlength: 3 },
            user_mail: { required: true, email: true },
            user_level: { required: true }
            
         },
         messages: {
         		user_name: {
         								required: "Bitte geben Sie einen Benutzernamen an",
         								minlength: "Der Benutzername muss mindestens {0} Zeichen lang sein"
         							 },
         		user_mail: {
         								email: "Bitte geben Sie korrekte E-Mail-Adresse ein",
         								required: "Bitte geben Sie eine E-Mail-Adresse ein"
         							 },
         		user_level: { required: "Bitte wählen sie einen Benutzerlevel aus" }
         },
         errorPlacement: function(error, element)
         {
            // Set positioning based on the elements position in the form
            var elem = $(element),
               corners = ['right center', 'left center'],
               flipIt = elem.parents('span.right').length > 0;
 
            // Check we have a valid error message
            if(!error.is(':empty')) {
               // Apply the tooltip only if it isn't valid
               elem.filter(':not(.valid)').qtip({
                  overwrite: false,
                  content: error,
                  position: {
                     my: corners[ flipIt ? 0 : 1 ],
                     at: corners[ flipIt ? 1 : 0 ],
                     viewport: $(window)
                  },
                  show: {
                     event: false,
                     ready: true
                  },
                  hide: false,
                  style: {
                     classes: 'ui-tooltip-red' // Make it red... the classic error colour!
                  }
               })
 
               // If we have a tooltip on this element already, just update its content
               .qtip('option', 'content.text', error);
            }
 
            // If the error is empty, remove the qTip
            else { elem.qtip('destroy'); }
         },
         success: $.noop, // Odd workaround for errorPlacement not firing!
   })
});