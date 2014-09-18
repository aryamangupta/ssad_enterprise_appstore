<?php


/*doubt : model hamesha plural me likhte h""""  so user ka users nahi kiya h r kahi code copy kiya hoga toh user ka user ya fir user ka users/*



/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=User::model()->findByAttributes(array('username'=>$this->username));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password!==crypt($this->password,'salt'))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->user_id;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}
