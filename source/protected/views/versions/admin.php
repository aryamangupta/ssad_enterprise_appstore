<?php
/* @var $this VersionsController */
/* @var $model Versions */

$this->breadcrumbs=array(
	'Versions'=>array('index'),
	'Manage',
);

$this->menu=array(

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#versions-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Versions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'versions-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'appName',
		'appStatus',
		'reviewerName',
		'reviewerEmail',
		'versionStatus',
	/*		array(
                    //    'name'=>'status',
                        'header'=>'Status',
                        'value' => '($data->application->status==1 ? "Activated" : "Deactivated")',
                    //    'filter'=>CHtml::activeTextField($model,'versions_search'),
                     ),*/
		'version',
		'comment',
	  
			'create_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
                        'buttons'=>array(
                                'update'=>array(
                                        'label'=>'Update details',
                                        'url'=>'Yii::app()->createUrl("/applications/updateApp", array("id"=>$data->id))',
                                                        'visible'=>"Yii::app()->user->checkAccess('createApp')",
                                        ),
                                'delete' => array(
                                        'label'=>'Delete',
                                                'visible'=>"Yii::app()->user->checkAccess('Create')",
                                                ),
                                        ),


                                //              'updateButtonUrl'=>'Yii::app()->createUrl("/applications/updateApp", array("id" => $data->id))',
                                



		),
	),
)); ?>
<?php //$this->renderPartial('_form', array('model'=>$model)); ?>
