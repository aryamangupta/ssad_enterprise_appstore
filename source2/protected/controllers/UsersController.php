<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{

	        return array(
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
                                'actions'=>array('view','admin','delete','index','create','update'),
                                'roles'=>array('admin'),
                        ),
			 array('allow', // allow admin user to perform 'admin' and 'delete' actions
                                'actions'=>array('update','view'),
                                'roles'=>array('developer'),
                        ),
                        
                  array('allow', // allow admin user to perform 'admin' and 'delete' actions
                                'actions'=>array('update','view'),
                                'roles'=>array('qa analyst'),
                        ),
                      array('deny',  // deny all users
                                'users'=>array('*'),
                        ),
                );
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		try{	
			$model=new Users;

			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);

			if(isset($_POST['Users']))
			{
				$model->attributes=$_POST['Users'];
				$model->create_date = date_create()->format('Y-m-d H:i:s');
				$model->modified_date= date_create()->format('Y-m-d H:i:s');
				$model->modified_date= date_create()->format('Y-m-d H:i:s');
				$model->reset_password_date =	date_create()->format('Y-m-d H:i:s');
				$temp = array();
				$count = 0;
				if( $model->role_id == 3 ){

					if( !empty($model->activation_key ))
					{	//	/*	{
						//		echo "Categories not Assigned"; $this->render('create',array('model'=>$model,));}	
						//		else
							 	foreach ($model->activation_key as $y):
						$temp[$count] = $y;
						$count += 1;
						endforeach;
						echo "HELL";
					}
				}
				$model->activation_key = 0;
				if($model->save()){
					$auth = Yii::app()->authManager;
					$auth->assign(Roles::model()->findByPk($model->role_id)->role,$model->id);
					if( empty($temp) )
					{
						echo "Categories not Assigned";
						$model->delete();
						$this->render('create',array(
									'model'=>$model,
									));
					}
					else{	
						foreach( $temp as $t ):
							$revCat = new CategoryReviewerMapping;
							$revCat->user_id = $model->id;
							$revCat->category_id = $t;
							$revCat->save();

						endforeach;
						$this->redirect(array('admin','id'=>$model->id));
					}
				}				
			}
			else
				$this->render('create',array(
							'model'=>$model,
							));
		}
		catch(Exception $e){
			echo $e->getMessage();
			?><br><h1><?php	echo "Email already registered!" ; ?> </h1><?php
				$this->render('create',array(
							'model'=>$model,
							));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->modified_date= date_create()->format('Y-m-d H:i:s');

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

   public function actionDelete($id)
        {
                $app = $this->loadModel($id);
                $app->status=2;
                $app->update();
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser 
//              if(!isset($_GET['ajax'])) 
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }



/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
