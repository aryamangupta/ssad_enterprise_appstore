<?php
/* @var $this ApprovalRefController */
/* @var $model ApprovalRef */

$this->breadcrumbs=array(
	'Approval Refs'=>array('index'),
	$model->key,
);

$this->menu=array(
	array('label'=>'List ApprovalRef', 'url'=>array('index')),
	array('label'=>'Create ApprovalRef', 'url'=>array('create')),
	array('label'=>'Update ApprovalRef', 'url'=>array('update', 'id'=>$model->key)),
	array('label'=>'Delete ApprovalRef', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->key),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApprovalRef', 'url'=>array('admin')),
);
?>

<h1>View ApprovalRef #<?php echo $model->key; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'key',
		'status',
	),
)); ?>
