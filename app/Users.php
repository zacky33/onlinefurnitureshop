<?php

	/**
	 * @author: Florian Ephraim Kipeta
	 * @package: Shop Management for Miss Luciana Entertainment v 1.0
	 */
	
class Users
{
	/**
	 * This is the User class that store all functions 
	 * for users of this script.
	 */
	
	protected $username;
	private $password;

	public function login()
	{
		$this->username = $this->secureinput($_POST['username']);
		$this->password = $this->secureinput($_POST['password']);
		if (empty($this->username) && empty($this->password)) {
			echo "All field are required";
		}
		elseif (empty($this->username) && !empty($this->password)) {
			echo "Username are required";
		}
		elseif (empty($this->password) && !empty($this->username)) {
			echo "Password are required";
		}
		else
		{
			require 'Connect.php';
			
		}

	}

	public function secureinput($data)
	{
		$data = trim($data);
   		$data = stripslashes($data);
   		$data = htmlspecialchars($data);
   		return $data;
	}
	
}
$user = new Users;