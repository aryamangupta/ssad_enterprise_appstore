<?php
/* @var $this ApprovalRefController */
/* @var $model ApprovalRef */

$this->breadcrumbs=array(
	'Approval Refs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApprovalRef', 'url'=>array('index')),
	array('label'=>'Manage ApprovalRef', 'url'=>array('admin')),
);
?>

<h1>Create ApprovalRef</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>