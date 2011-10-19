function deletePage (page_id) {

conf = confirm('Wollen Sie die Seite wirklich löschen?');

if(conf) {
	$.ajax({
    type: "POST",
    url: 'ajax.php',
    async:true,
    data: 'req=deletePage&page_id='+encodeURIComponent(page_id),
    success: function(result) {
      
      if(result=='1') 
      {
      	msg = "Seite wurde erfolgreich gelöscht";
      	type= 'success';
      }
      else
      {
      	msg = "Seite konnte nicht gelöscht werden";
      	type= 'error';
      }
      message(msg, type);
      return true;
    }
  });
  }
}