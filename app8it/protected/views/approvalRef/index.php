<?php
/* @var $this ApprovalRefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Approval Refs',
);

$this->menu=array(
	array('label'=>'Create ApprovalRef', 'url'=>array('create')),
	array('label'=>'Manage ApprovalRef', 'url'=>array('admin')),
);
?>

<h1>Approval Refs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
