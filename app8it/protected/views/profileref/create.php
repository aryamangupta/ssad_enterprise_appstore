<?php
/* @var $this ProfilerefController */
/* @var $model Profileref */

$this->breadcrumbs=array(
	'Profilerefs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Profileref', 'url'=>array('index')),
	array('label'=>'Manage Profileref', 'url'=>array('admin')),
);
?>

<h1>Create Profileref</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>