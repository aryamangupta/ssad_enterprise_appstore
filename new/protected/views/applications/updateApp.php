<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
	'Applications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Applications', 'url'=>array('index')),
	array('label'=>'Manage Applications', 'url'=>array('admin')),
);
?>

<h1>Update Application</h1>

<?php $this->renderPartial('_updateForm', array('model'=>$model,'entry'=>$entry)); ?>
