<?php
class ChangePasswordFormController extends Controller{

	public function actionChangePassword()
	{
		$model=new ChangePasswordForm();
		if (isset($_POST['ChangePasswordForm'])) {
			$model->setAttributes($_POST['ChangePasswordForm']);
			if ($model->validate()) {
		//		$model->saveNewPassword();
				$model->save();
				// you can redirect here
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}

		$this->render('changePassword', array('model'=>$model));
	}
}
?>
