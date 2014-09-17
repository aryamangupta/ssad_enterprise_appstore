<?php
/* @var $this ProfilerefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Profilerefs',
);

$this->menu=array(
	array('label'=>'Create Profileref', 'url'=>array('create')),
	array('label'=>'Manage Profileref', 'url'=>array('admin')),
);
?>

<h1>Profilerefs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
