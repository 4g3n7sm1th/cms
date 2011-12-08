<?php
/**
 * PHP Class to user access (login, register, logout, etc)
 * 
 * 
 * For support issues please refer to the webdigity forums :
 *				http://www.webdigity.com/index.php/board,91.0.html
 * or the official web site:
 *				http://phpUserClass.com/
 * ==============================================================================
 * 
 * @version $Id: access.class.php,v 0.93 2008/05/02 10:54:32 $
 * @copyright Copyright (c) 2007 Nick Papanotas (http://www.webdigity.com)
 * @author Nick Papanotas <nikolas@webdigity.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL)
 * 
 * ==============================================================================

 */

class flexibleAccess{
  /*Settings*/
  var $db;
  var $usrtimeout;
  var $sessionVariable = 'userSessionValue';
  
  var $remTime = 2592000;//One month

  var $remCookieName = 'MCMSSavePass';
 
  var $remCookieDomain = '';
 
  var $passMethod = 'md5';
 
  var $displayErrors = true;
  /*Do not edit after this line*/
  var $userID;
  var $userData=array();
  var $usertable = 'users';
  
  var $user_id = 'user_id';
  var $user_name = 'user_name';
  var $user_pass = 'user_pass';
  var $user_session = 'user_session';
  var $user_mail = 'user_mail';
  var $user_active = 'user_active';
  /**
   * Class Constructure
   * 
   * @param string $dbConn
   * @param array $settings
   * @return void
   */
  function flexibleAccess($dbConn = '', $settings = '')
  {
  global $db;
  global $usrtimeout;
  $this->db = &$db;
  $this->usrtimeout = &$usrtimeout;
	    if ( is_array($settings) ){
		    foreach ( $settings as $k => $v ){
				    if ( !isset( $this->{$k} ) ) die('Property '.$k.' does not exists. Check your settings.');
				    $this->{$k} = $v;
			}
	    }
	    $this->remCookieDomain = $this->remCookieDomain == '' ? $_SERVER['HTTP_HOST'] : $this->remCookieDomain;

	    if( !isset( $_SESSION ) ) session_start();
	    if ( !empty($_SESSION[$this->sessionVariable]) )
	    {
		    $this->loadUser( $_SESSION[$this->sessionVariable] );
	    }
	    //Maybe there is a cookie?
	    if ( isset($_COOKIE[$this->remCookieName]) && !$this->is_loaded()){
	      //echo 'I know you<br />';
	      $u = unserialize(base64_decode($_COOKIE[$this->remCookieName]));
	      $this->login($u['uname'], $u['password'], true);
	    }
  }
  
  /**
  	* Login function
  	* @param string $uname
  	* @param string $password
  	* @param bool $loadUser
  	* @return bool
  */
  function login($uname, $password, $remember = false, $loadUser = true)
  {
    	$uname    = $this->escape($uname);
    	$password = $originalPassword = $this->escape($password);
		switch(strtolower($this->passMethod)){
		  case 'sha1':
		  	$password = "SHA1('$password')"; break;
		  case 'md5' :
		  	$password = "MD5('$password')";break;
		  case 'nothing':
		  	$password = "'$password'";
		}
		$sql = "SELECT * FROM ".$this->usertable." 
		WHERE ".$this->user_name." = '$uname' AND ".$this->user_pass." = $password LIMIT 1";
		$this->userData = $this->db->get_results($sql);
        session_start();
        session_regenerate_id();
		if ( @count($this->userData) == 0)
			return false;
		if ( $loadUser )
		{
			$this->userID = $this->userData[0]->user_id;
			$_SESSION['user_id'] = $this->userData[0]->user_id;
			$_SESSION['user_name'] = $this->userData[0]->user_name;
			$_SESSION['sid'] = session_id();
			$_SESSION['lastaction'] = time();
			$sql = "UPDATE ".$this->usertable." SET user_session = '".$_SESSION['sid']."' WHERE ".$this->user_id." = ".$_SESSION['user_id'].";";
			$this->db->query($sql);
			writelog('login', 'Session: '.$_SESSION['sid'], $_SESSION['user_id']);
			if ( $remember == true ){
			  $cookie = base64_encode(serialize(array('uname'=>$uname,'password'=>$originalPassword)));
			  $a = setcookie($this->remCookieName, 
			  $cookie,time()+$this->remTime, '/', $this->remCookieDomain);
			}
		}
		return $_SESSION['sid'];
  }
  
  /**
  	* Logout function
  	* param string $redirectTo
  	* @return bool
  */
  function logout($redirectTo = '')
  {
    $sql = "UPDATE ".$this->usertable." SET user_session = NULL WHERE ".$this->user_id." = ".$_SESSION['user_id'].";";
    $logout = $this->db->query($sql);
    if(!$logout) return false;
    
  	writelog('logout', 'Session: '.$_SESSION['sid'], $_SESSION['user_id']);
    setcookie($this->remCookieName, '', time()-3600);
    $_SESSION[$this->sessionVariable] = '';
    $this->userData = '';
    session_destroy();
    if ( $redirectTo != '' && !headers_sent()){
	   header('Location: '.$redirectTo );
	   exit;//To ensure security
	}
	return true;
  }
  /**
  	* Function to determine if a property is true or false
  	* param string $prop
  	* @return bool
  */
  function is($prop){
  	return $this->get_property($prop)==1?true:false;
  }
  
    /**
  	* Get a property of a user. You should give here the name of the field that you seek from the user table
  	* @param string $property
  	* @return string
  */
  
  function prop($prop)
  {
  	return $this->get_property($prop);
  }
  
  function get_property($property)
  {
    if (empty($_SESSION['user_id'])) 
    { 
        $this->error('No user is loaded', __LINE__); 
        return false;
    }
    $sql = "SELECT ".$property." FROM ".$this->usertable." WHERE ".$this->user_session." = '".$_SESSION['sid']."';";
    //echo $sql;
    $res = $this->db->get_var($sql);
    if (count($res)==0) 
    { 
    $this->error('Unknown property <b>'.$property.'</b>', __LINE__); 
    } else {
    return $res; 
    }
  }
  /**
  	* Is the user an active user?
  	* @return bool
  */
  function is_active()
  {
    return $this->userData[$this->user_active];
  }
  
  /**
   * Is the user loaded?
   * @ return bool
   */
  function is_loaded()
  {
    return empty($this->userID) ? false : true;
  }
  /**
  	* Activates the user account
  	* @return bool
  */
  function activate()
  {
    if (empty($this->userID)) $this->error('No user is loaded', __LINE__);
    if ( $this->is_active()) $this->error('Allready active account', __LINE__);
    $res = $this->db->query("UPDATE ".$this->usertable." SET ".$this->user_active." = 1 
	WHERE ".$this->user_id." = '".$this->escape($this->userID)."' LIMIT 1");
    if (@count($res) == 1)
	{
		$this->userData[$this->user_active] = true;
		return true;
	}
	return false;
  }
  /*
   * Creates a user account. The array should have the form 'database field' => 'value'
   * @param array $data
   * return int
   */  
  function insertUser($data){
    if (!is_array($data)) $this->error('Data is not an array', __LINE__);
    switch(strtolower($this->passMethod)){
	  case 'sha1':
	  	$password = "SHA1('".$data[$this->user_pass]."')"; break;
	  case 'md5' :
	  	$password = "MD5('".$data[$this->user_pass]."')";break;
	  case 'nothing':
	  	$password = $data[$this->user_pass];
	}
    foreach ($data as $k => $v ) $data[$k] = "'".$this->escape($v)."'";
    $data[$this->user_pass] = $password;
    $this->db->query("INSERT INTO ".$this->usertable." (`".implode('`, `', array_keys($data))."`) VALUES (".implode(", ", $data).")");
    return (int)mysql_insert_id($this->dbConn);
  }
  /*
   * Creates a random password. You can use it to create a password or a hash for user activation
   * param int $length
   * param string $chrs
   * return string
   */
  function randomPass($length=10, $chrs = '1234567890qwertyuiopasdfghjklzxcvbnm'){
    for($i = 0; $i < $length; $i++) {
        $pwd .= $chrs{mt_rand(0, strlen($chrs)-1)};
    }
    return $pwd;
  }
  ////////////////////////////////////////////
  // PRIVATE FUNCTIONS
  ////////////////////////////////////////////
  
  /**
  	* A function that is used to load one user's data
  	* @access private
  	* @param string $userID
  	* @return bool
  */
  function loadUser($userID)
  {
	$this->userData = $this->db->get_results("SELECT * FROM ".$this->usertable." WHERE ".$this->user_id." = '".$this->escape($userID)."' LIMIT 1");
    if ( count($res) == 0 )
    	return false;
    $this->user_id = $userID;
    $_SESSION[$this->sessionVariable] = $this->userID;
    return true;
  }

  /**
  	* Produces the result of addslashes() with more safety
  	* @access private
  	* @param string $str
  	* @return string
  */  
  function escape($str) {
    $str = get_magic_quotes_gpc()?stripslashes($str):$str;
    $str = mysql_real_escape_string($str);
    return $str;
  }
  
  /**
  	* Error holder for the class
  	* @access private
  	* @param string $error
  	* @param int $line
  	* @param bool $die
  	* @return bool
  */  
  function error($error, $line = '', $die = false) {
    if ( $this->displayErrors )
    	//echo '<b>Error: </b>'.$error.'<br /><b>Line: </b>'.($line==''?'Unknown':$line).'<br />';
    if ($die) exit;
    return false;
  }
  
  function is_loggedin() {
  	if(isset($_SESSION)) { 
  		$now = time() - $_SESSION['lastaction'];
  		if($now < $this->usrtimeout) 
  			{
				$_SESSION['lastaction'] = time();
   				return true; 
   			}
   			else
   			{
   				$this->logout();
   				return false;
   			}
 	 } 
 	 else 
 	 { 
 	 	$this->logout();
 	 	return false;
 	 }
  }
  
  function right($right)
  {
  	if(!$_SESSION['user_id']) return false;
  	$user_id = $_SESSION['user_id'];
  	$user_level = $this->db->get_var('SELECT user_level
  																			FROM users
  											 							 WHERE user_id = '.$user_id.';');
  
  	if(!$user_level) { return false; }
  
  	$user_right = $this->db->get_var("SELECT user_right_value
  																			FROM user_rights
  											 							 WHERE user_level = '".$user_level."'
  											 							 	 AND user_right_name = '".$right."';");
  											 							 	 
  	if($user_right == '1')
  	{ return true; }
  	elseif($user_right == '0')
  	{ return false; }
  	elseif(!$user_right)
  	{ return false; }
  	else
  	{ return $user_right; }
  	
  
  }
}
?>