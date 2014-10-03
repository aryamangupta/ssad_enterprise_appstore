<?php
class ChangePasswordForm extends CFormModel
{
    /**
     * @var string
     */
    public $currentPassword;

    /**
     * @var string
     */
    public $newPassword;

    /**
     * @var string
     */
    public $newPasswordRepeat;

    /**
     * Validation rules for this form.
     *
     * @return array
 */
    public function rules()
    {
        return array(
            array('currentPassword, newPassword, newPasswordRepeat', 'required'),
            array('currentPassword', 'validateCurrentPassword', 'message'=>'This is not your password.'),
            array('newPassword', 'compare', 'compareAttribute'=>'validateNewPassword'),
            array('newPassword', 'match', 'pattern'=>'/^[a-z0-9_\-]{5,}/i', 'message'=>'Your password does not meet our password complexity policy.'),
        );
    }

    protected function getUserPassword()
    {
        return Yii::app()->user->password;
    }

    /**
     * Saves the new password.
     */
    public function saveNewPassword()
    {
        $user = Users::model()->findByPk(Yii::app()->user->id);
        $user->password = $this->newPassword;
        $user->update();
    }

    public function validateCurrentPassword()
    {
        return $this->currentPassword == $this->getUserPassword();
    }
}
