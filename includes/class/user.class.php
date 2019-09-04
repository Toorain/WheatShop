<?php 
/**
 * 
 */
class user
{
	private $_login;
	private $_mdp;
	private $_auth;
	private $_name;
	private $_oldPass;

	function __construct($auth, $mail, $pass)
	{
		$this->_auth = $auth;
		$this->_login = $mail;
		$this->_mdp = $pass;
	}

	function __get($name){
		return $this->$name;
	}

	function __set($name, $value){
		$this->$name = $value;
	}

	function verifAutorisation($mail, $pass){
		foreach ($this->_auth as $user) {
			if($user['login'] == $this->_login && $user['pass'] == $this->_mdp){
				$this->_name = $user['firstname'];
				return true;
			}
		}
		return false;
	}

	function changePassword($conn, $login, $oldPass, $newPass){
		foreach ($this->_auth as $user) {
			/**
			 * If login and pass are found in the DB
			 */
			if ($user['login'] == $login && $user['pass'] == $oldPass) {
				/**
				 * We prepare the update of table Auth
				 */
				$sql = "UPDATE Auth SET pass=? WHERE login=?";
				$req = $conn->prepare($sql);
				$req->execute([$newPass, $login]);
				/**
				 * And we reset $_SESSION pass to the newPass value
				 */
				$_SESSION['User']['pass'] = $newPass;
				header("Location: index.php?p=account&pass=updated");
			}
		}
	}
}