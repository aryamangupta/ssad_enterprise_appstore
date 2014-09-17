<?php
/* @var $this ProfilerefController */
/* @var $model Profileref */

$this->breadcrumbs=array(
	'Profilerefs'=>array('index'),
	$model->key,
);

$this->menu=array(
	array('label'=>'List Profileref', 'url'=>array('index')),
	array('label'=>'Create Profileref', 'url'=>array('create')),
	array('label'=>'Update Profileref', 'url'=>array('update', 'id'=>$model->key)),
	array('label'=>'Delete Profileref', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->key),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profileref', 'url'=>array('admin')),
);
?>

<h1>View Profileref #<?php echo $model->key; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'key',
		'profile',
	),
)); ?>
