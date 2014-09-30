<?php

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
                $user=Users::model()->findByAttributes(array('email'=>$this->username));
                if($user===null)
                        $this->errorCode=self::ERROR_USERNAME_INVALID;
                else if($user->password!==$this->password)
                        $this->errorCode=self::ERROR_PASSWORD_INVALID;
                else
                {
                        $this->_id=$user->id;
                        $this->username=$user->email;
                        $this->errorCode=self::ERROR_NONE;


                        $this->setState('role', $user->role_id);
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
