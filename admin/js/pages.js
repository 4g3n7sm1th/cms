function deletePage (page_id) {

conf = confirm('Wollen Sie die Seite wirklich löschen?');

if(conf) {
	$.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=deletePage&page_id='+encodeURIComponent(page_id),
    success: function(result) {
      
      if(result.ERROR==null) 
      {
      	msg = "Seite wurde erfolgreich gelöscht";
      }
      else
      {
      	msg = "Seite konnte nicht gelöscht werden";
      }
      $('#js-message-success').html(msg);
      $('#js-message-success').show();
      return true;
    }
  });
  }
}