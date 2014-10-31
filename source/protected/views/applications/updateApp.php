<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
	'Applications'=>array('admin'),
);

$this->menu=array(
	array('label'=>'Add new Version', 'url'=>array('create')),
	array('label'=>'Manage Applications', 'url'=>array('admin')),
);
?>

<h1>Add new Version</h1>

<?php $this->renderPartial('_updateForm', array('id'=>$id,'model'=>$model,'entry'=>$entry)); ?>
