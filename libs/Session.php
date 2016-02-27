<?php

class Session
{
	
	public static function init()
	 {	///session_cache_limiter('private, must-revalidate');
	// 	session_cache_expire(60);
		@session_start();
	}
	
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	
	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	
	public static function destroy()
	{
		//unset($_SESSION);
		session_destroy();
	}
	
}