<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
	'Applications'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Create Applications', 'url'=>array('create')),
	array('label'=>'Update Applications', 'url'=>array('updateApp', 'id'=>$model->id)),
	array('label'=>'Manage Applications', 'url'=>array('admin')),
);
?>

<h1>View Applications #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'category_id',
		'description',
		'status',
		'logo',
		'platform_id',
		'device_id',
		'ndownloads',
		'disabled_comments',
	),
)); ?>
