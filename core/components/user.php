<?php

class User {

	public $dbh;

	public $username;
	public $password;
	public $name;
	
	public function __construct(){

		session_start();

		$this->dbh = new Database();

	}

	public function authenticate($dest = 'wire', $rank = 0){
		if (!$this->loggedIn() || $this->get_rank() < $rank){
			header('Location: http://localhost:8888/CopperResistance/login?dest=' . $dest);
			exit;
		}
	}

	public function loggedIn(){
		if(!isset($_SESSION['user_id'])) {	
		    return false;
		}
		else {
	        $stmt = $this->dbh->prepare("SELECT username FROM users
	        WHERE id = ?");

	        $stmt->bind_param('i', $_SESSION['user_id']);
	        $stmt->execute();

	        $stmt->bind_result($user_id);

    		$stmt->fetch();

	        /*** if we have no something is wrong ***/
	        if($user_id){
	            return true;
	        }
	        else {
	            return false;
	        }
		}
	}

	public function login(){

		$success = false;
		$message = '';

		if(isset( $_SESSION['user_id'] ))
		{
		    $message = 'Users is already logged in';
		}
		/*** check that both the username, password have been submitted ***/
		if(!isset( $_POST['username'], $_POST['password']))
		{
		    $message = 'Please enter a valid username and password';
		}
		/*** check the username is the correct length ***/
		elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
		{
		    $message = 'Incorrect Length for Username';
		}
		/*** check the password is the correct length ***/
		elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
		{
		    $message = 'Incorrect Length for Password';
		}
		/*** check the username has only alpha numeric characters ***/
		elseif (ctype_alnum($_POST['username']) != true)
		{
		    /*** if there is no match ***/
		    $message = "Username must be alpha numeric";
		}
		/*** check the password has only alpha numeric characters ***/
		elseif (ctype_alnum($_POST['password']) != true)
		{
		        /*** if there is no match ***/
		        $message = "Password must be alpha numeric";
		}
		else
		{
		    /*** if we are here the data is valid and we can insert it into database ***/
		    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

		    /*** now we can encrypt the password ***/
		    //$password = sha1( $password );

		    try
		    {
		     
		        /*** prepare the select statement ***/
		        $stmt = $this->dbh->prepare("SELECT id, username, password, rank FROM users 
		                    WHERE username = ? AND password = ?");

		        /*** bind the parameters ***/
		        $stmt->bind_param('ss', $username, $password);

		        /*** execute the prepared statement ***/
		        $stmt->execute();

		        $stmt->bind_result($user_id, $user_username, $user_password, $user_rank);

    			/* fetch value */
    			$stmt->fetch();

		        /*** if we have no result then fail boat ***/
		        if($user_id == false)
		        {
		                $message = 'Login failed.';
		        }
		        /*** if we do have a result, all is well ***/
		        else
		        {
		                /*** set the session user_id variable ***/
		                $_SESSION['user_id'] = $user_id;
		                $_SESSION['user_rank'] = $user_rank;

		                $success = true;
		                $message = 'You have been logged in successfully.';
		        }

		    }
		    catch(Exception $e)
		    {
		        /*** if we are here, something has gone wrong with the database ***/
		        $message = 'We are unable to process your request. Please try again later"';
		    }
		}

		return array('success' => $success, 'message' => $message);
	}

	public function logout(){
		session_destroy(); 
		echo "You have been logged out!";
	}

	public function get_rank(){
		return isset($_SESSION['user_rank']) ? $_SESSION['user_rank'] : 0;
	}
}