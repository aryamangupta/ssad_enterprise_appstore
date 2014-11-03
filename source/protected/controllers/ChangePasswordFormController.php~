
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
		if(isset($_POST['ChangePasswordForm'])){
			$model->attributes=$_POST['ChangePasswordForm'];
			$temp = Users::model()->findByPk(Yii::app()->user->id);
                        // password check using model and temp
                        // validating the inputs  and checking if the change password fuction in $model returns true 
                        if($model->validate() && $model->changePassword() && ($model->currentPassword === $temp->password)){
                            	if($model->newPassword == $model->newPassword_repeat){
				$temp->password = $model->newPassword;
				$temp->reset_password_date =   date_create()->format('Y-m-d H:i:s');
				$temp->update();
				$this->redirect( Yii::app()->user->returnUrl );
                                    echo "here";
			}
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='ChangePasswordForm-form')
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
