<?php
/* @var $this ApprovalRefController */
/* @var $model ApprovalRef */

$this->breadcrumbs=array(
	'Approval Refs'=>array('index'),
	$model->key=>array('view','id'=>$model->key),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApprovalRef', 'url'=>array('index')),
	array('label'=>'Create ApprovalRef', 'url'=>array('create')),
	array('label'=>'View ApprovalRef', 'url'=>array('view', 'id'=>$model->key)),
	array('label'=>'Manage ApprovalRef', 'url'=>array('admin')),
);
?>

<h1>Update ApprovalRef <?php echo $model->key; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>