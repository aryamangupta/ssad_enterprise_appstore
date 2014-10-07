<?php
class ChangePasswordFormController extends Controller{

	public function filters()
	{
		return array(
				'accessControl',
			    );
	}

	public function accessRules()
	{
		return array(
				array(
					'allow',
					'actions'=>array('ChangePassword'),
					'roles'=>array('developer'),
				     ),
			    );
	}

	public function actionChangePassword()
	{
		$model = new ChangePasswordForm;

		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			$temp = Users::model()->findByPk(Yii::app()->user->id);
			if($model->currentPassword === Users::model()->findByPk(Yii::app()->user->id)->password)
			{
				$temp->password = $model->newPassword;
				$temp->update();
				$this->redirect( Yii::app()->user->returnUrl );
			}
			else{
				echo 'wrong password';
			}
		}
		else{
			$this->render('changePassword',array('model'=>$model));
		}
	}
}

