<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

		private $ id;
		public function authenticate()
		{
			$username=strtolower($this->username);
			$user=User::model()->find(’LOWER(username)=?’,array($username));
			if($user===null)
				$this->errorCode=self::ERROR USERNAME INVALID;
			else if(!$user->validatePassword($this->password))
				$this->errorCode=self::ERROR PASSWORD INVALID;
			else
			{
				$this-> id=$user->id;
				$this->username=$user->username;
				$this->errorCode=self::ERROR NONE;
			}
			return $this->errorCode==self::ERROR NONE;
		}
		public function getId()
		{
			return $this-> id;
		}
	}	

}
