<?php
require('libs/globals.inc.php');

function var2table($vars)
	{	
	  echo serialize($vars);
		/*foreach($vars as $var)
		{
			$variable ='<br>';
			//$var = print_r($var);
			ob_start();
			$var = (string)print_r($var, true);
			ob_end_clean();
			$stdclass = strpos($var, 'stdClass');
			if($stdclass !== false)
			{
			  $var = unserialize($var); 
				echo var_dump($var);
				$var = str_replace('stdClass', '',$var);
				$var = str_replace('Object', '',$var);
				//$var = str_replace($var[0], '',$var);
				$var = trim($var);
				//echo $var;
				//preg_match('/[(<var_name>)] => (?P<var_val>\d+)/', $var, $treffer);
				$var = unserialize($var); 
				echo var_dump($var);
				//$variable.= print_r($treffer, true);
			
			}
			echo '<br><br>';
		}*/
		return $var;
	}	
	//$payments = $db->get_results('SELECT * FROM menu_items LIMIT 1');
	//echo var2table($payments);
	//$html = file_get_contents('http://localhost:8080/cms/?p=1');
	//phpinfo();
	echo $html;
	
function color_deg($color1, $step) 
{ 
  $steps=5; 
  $color2 = '#ffffff';
  $r1=hexdec(substr($color1,1,2)); 
  $g1=hexdec(substr($color1,3,2)); 
  $b1=hexdec(substr($color1,5,2)); 

  $r2=hexdec(substr($color2,1,2)); 
  $g2=hexdec(substr($color2,3,2)); 
  $b2=hexdec(substr($color2,5,2)); 

  $diff_r=$r2-$r1; 
  $diff_g=$g2-$g1; 
  $diff_b=$b2-$b1; 

  for ($i=0; $i<$steps; $i++) 
    { 
      $factor=$i / $steps; 

      $r=round($r1 + $diff_r * $factor); 
      $g=round($g1 + $diff_g * $factor); 
      $b=round($b1 + $diff_b * $factor); 

      $color[$i]="#" . sprintf("%02X",$r) . sprintf("%02X",$g) . sprintf("%02X",$b); 
    } 
  return $color[$step];
}

//echo '<span style="padding:100px;height:100px;background-color:'.color_deg('#000000', '6').'">&nbsp;</Span>';


function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


echo getRealIpAddr();

	
	?>