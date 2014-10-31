<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
		'Applications'=>array('admin'),
		$model->name,
		);

$this->menu=array(
		array('label'=>'Create Applications', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess('createApp')),
		array('label'=>'Update Applications', 'url'=>array('updateApp', 'id'=>$model->id), 'visible'=>Yii::app()->user->checkAccess('createApp')),
		array('label'=>'Manage Applications', 'url'=>array('admin')),
		);
?>

<h1>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->logo,
							"this is alt tag of image",
							array("width"=>"50px" ,"height"=>"50px"));

echo "   ".$model->name;				 ?>

</h1>
<?php  $x =  ChecklistCategoryMap::model()->findAll();
$count = 1;
$a = "<ul>";
$b = "";
foreach ($x as $y): 
if( $y->category_id==$model->category_id){
$z=Checklists::model()->findByPk($y->checklist_id);
 $a= $a."<li>" . ($z->title)."</li>" ;

} 

endforeach; 
$a = $a."</ul>";
$b=($a);
?>
<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
//				'name',
				'description',
//				'logo',
				array(
					'name'=>'category.title',
					'header'=> 'Category',
					'filter'=>CHtml::activeTextField($model,'category_search'),
				     ),
				array(
					'name'=>'status',
					'header'=>'Status',
					'value' => ($model->status==1  ? "Activated" : "Deactivated"),
				     ),
				array(
					'name'=>'platform.name',
					'header'=>'Platform',
					'filter'=>CHtml::activeTextField($model,'platform_search'),
				     ),
				array(
					'name'=>'device.type',
					'header'=>'Device type',
					'filter'=>CHtml::activeTextField($model,'device_search'),
				     ),
//				array(
//						'name'=>'logo',
//						'header'=>'Logo',
//						'type'=>'raw',
//
///						'value'=>CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->logo,
///							"this is alt tag of image",
//							array("width"=>"50px" ,"height"=>"50px")),
//				     ),

				'ndownloads',
				'disabled_comments',
				//		array('name'=>'Checklist', 'header'=>'Checklist',
		//			 'value'=>  $b),



			),
	)); ?>
	<br>
<h4> Checklists : </h4>
<?php echo $b;

?>
<?php
    $temp = Users::model()->findbyPk(Yii::app()->user->id);
	if ( $temp->role_id == 1 || $temp->role_id == 3 ){
echo CHtml::beginForm(Yii::app()->createUrl('applications/view&id='.$model->id),'post');
?>
        <div class="row buttons">
                <?php echo CHtml::submitButton('Approve',array('name'=>'button1')); ?>
               <?php echo CHtml::submitButton('Reject', array('name'=>'button2')); ?>

        </div>
<?php echo CHtml::endForm(); }?>
