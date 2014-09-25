<?php date_default_timezone_set('UTC'); ?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/dist/css/layouts/bootstrap.min.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/index')),
			//	array('label'=>'Profile', 'url'=>array('/site/index')),
			array('label'=>'Manage Developer','url'=>array('/site/developer'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'Manage Reviewer','url'=>array('/site/reviewer'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'Manage Team','url'=>array('/site/teams'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'ManageApplication','url'=>array('/site/application'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'Categories','url'=>array('/site/category'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'Checklist','url'=>array('/site/checklist'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'Devices','url'=>array('/site/device'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'OS','url'=>array('/site/os'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'AppStatus','url'=>array('/site/applicationStatus'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'Profile','url'=>array('/site/editProfile'),'visible'=>(Yii::app()->user->Name=="admin")),
			array('label'=>'Password','url'=>array('/site/changePassword'),'visible'=>(Yii::app()->user->Name=="admin")),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
