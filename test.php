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
	$payments = $db->get_results('SELECT * FROM menu_items LIMIT 1');
	//echo var2table($payments);
	$html = file_get_contents('http://localhost:8080/cms/?p=1');
	//phpinfo();
	
	echo $html;
	
	?>