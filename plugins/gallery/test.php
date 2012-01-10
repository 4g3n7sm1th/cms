<?

include('plugin.gallery.upload.php');

$img = new Zubrag_image;

// initialize
$img->max_x        = 150;

// generate thumbnail
$img->GenerateThumbFile('./../../media/images/testbild.jpg', './../../media/images/thumb_testbild.jpg');

?>
