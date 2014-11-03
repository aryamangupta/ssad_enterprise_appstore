<?php
class ChangePasswordFormController extends Controller{
	public function actionChangePassword($id)
	{
		$model = new ChangePasswordForm;
                $this->performAjaxValidation($model);
                if(isset($_POST['ajax']) && $_POST['ajax']==='ChangePasswordForm')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			$temp = Users::model()->findByPk($id);
			$user =	Users::model()->findByPk(Yii::app()->user->id);
			if($user->role_id == 1)
			{	
				$model->currentPassword = $temp->password; 
			}
			if($model->currentPassword === $temp->password )
			{
				if($model->newPassword == $model->newPassword_repeat){
					$temp->password = $model->newPassword;
					$temp->reset_password_date =   date_create()->format('Y-m-d H:i:s');
					$temp->update();
                                        $this->redirect( Yii::app()->user->returnUrl );
//$this->redirect('changePassword',array('model'=>$model,'id'=>$id));
                                            }
			//	else{?>
					<br><h1>
                                            <?php //echo 'New  do not match'; 
                                            ?></h1>
                                                <?php
				//	$this->render('changePassword',array('model'=>$model,'id'=>$id));		
			//	}
			}
			else{?><br><h1><?php 
				echo 'Wrong Password'; ?></h1><?php
				$this->render('changePassword',array('model'=>$model,'id'=>$id));		
			}
		}
        }
        public function loadModel($id)
	{
		$model=Checklists::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Checklists $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='checklists-form')
		{
			echo CFormModel::validate($model);
			Yii::app()->end();
		}
	}
        public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}
?>

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
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
					'roles'=>array('@'),
				     ),
			    );
	}
	public function actionChangePassword()
	{
		$model = new ChangePasswordForm;
                $this->performAjaxValidation($model);   
		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			$temp = Users::model()->findByPk(Yii::app()->user->id);
			if($model->currentPassword === $temp->password)
			{
				if($model->newPassword == $model->newPassword_repeat){
					$temp->password = $model->newPassword;
					$temp->reset_password_date =   date_create()->format('Y-m-d H:i:s');
					$temp->update();
					$this->redirect( Yii::app()->user->returnUrl );
				}
				else{
					$this->render('changePassword',array('model'=>$model));
					echo 'Passwords do not match';
				}
			}
                        if($model->validate() && $model->changePassword())
			{
				$this->redirect(Yii::app()->user->returnUrl);	
			}
			else{
				$this->render('changePassword',array('model'=>$model));
				echo 'wrong password';
			}
		}
		$this->render('changePassword',array('model'=>$model));
		
	}
         public function loadModel($id)
	{
		$model=Checklists::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Checklists $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='checklists-form')
		{
			echo CFormModel::validate($model);
			Yii::app()->end();
		}
	}
        public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}

?>
