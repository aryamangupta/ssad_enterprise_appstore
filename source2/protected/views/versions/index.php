<?php
/* @var $this VersionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Versions',
);

$this->menu=array(
	array('label'=>'Create Versions', 'url'=>array('create')),
	array('label'=>'Manage Versions', 'url'=>array('admin')),
);
?>

<h1>Versions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
