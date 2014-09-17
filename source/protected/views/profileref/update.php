<?php
/* @var $this ProfilerefController */
/* @var $model Profileref */

$this->breadcrumbs=array(
	'Profilerefs'=>array('index'),
	$model->key=>array('view','id'=>$model->key),
	'Update',
);

$this->menu=array(
	array('label'=>'List Profileref', 'url'=>array('index')),
	array('label'=>'Create Profileref', 'url'=>array('create')),
	array('label'=>'View Profileref', 'url'=>array('view', 'id'=>$model->key)),
	array('label'=>'Manage Profileref', 'url'=>array('admin')),
);
?>

<h1>Update Profileref <?php echo $model->key; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>